<?php
add_filter( 'usces_action_dl_list_table', 'custom_action_dl_list_table' );
function custom_action_dl_list_table() {
	$html = '';
	?>
	<input type="button" id="tracking_num" class="button" value="<?php _e( '送り状番号一括登録', 'usces' ); ?>" />
	<?php
}

add_action( 'usces_action_order_list_footer', 'custom_action_order_list_footer' );
function custom_action_order_list_footer() {
	?>
			<div id="tracking_num_dialog">
				<form action="<?php echo USCES_ADMIN_URL; ?>" method="post" enctype="multipart/form-data" name="b2upform" id="b2upform">
				<input type="radio" name="upload_mode" id="sagawa_upload" value="sagawa" checked="checked" /><label for="sagawa_upload">佐川急便</label>
				<input type="radio" name="upload_mode" id="yamato_upload" value="yamato" /><label for="yamato_upload">ヤマト運輸</label>
					<p><input name="tracking_file_csv" type="file" id="tracking_file_csv" style="width:100%" /></p>
					<p><input name="tracking_upcsv" class="button" type="submit" id="tracking_upcsv" value="取込開始" /></p>
					<input name="page" type="hidden" value="tracking_page" />
					<input name="action" type="hidden" value="tracking_upload" />
					<?php wp_nonce_field( 'admin_system', 'wc_nonce' ); ?>
				</form>
			</div>
	<?php
}

add_filter( 'usces_filter_order_list_page_js', 'custom_filter_order_list_page_js' );
function custom_filter_order_list_page_js() {
	?>
	$( "#tracking_num_dialog" ).dialog({
		bgiframe: true,
		autoOpen: false,
		title: "送り状番号一括登録",
		height: 360,
		width: 600,
		modal: true,
		buttons: {
			"<?php _e( 'close', 'usces' ); ?>": function() {
				$( this ).dialog( "close" );
			}
		},
		close: function() {}
	});
	$( "#tracking_num" ).click( function() {
		$("#tracking_num_dialog" ).dialog( "open" );
	});
	<?php
}

function custom_upload_tracking_number() {
	global $wpdb, $usces;

	check_admin_referer( 'admin_system', 'wc_nonce' );

	// Upload
	$path = WP_CONTENT_DIR . '/uploads/';
	$res  = array();
	if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'tracking_upload' ) {
		$workfile = $_FILES['tracking_file_csv']['tmp_name'];
		if ( ! is_uploaded_file( $workfile ) ) {
			$res['status']  = 'error';
			$res['message'] = __( 'The file was not uploaded.', 'usces' );
			$url            = USCES_ADMIN_URL . '?page=usces_orderlist&usces_status=' . $res['status'] . '&usces_message=' . urlencode( $res['message'] );
			wp_redirect( $url );
			exit;
		}

		list( $fname, $fext ) = explode( '.', $_FILES['tracking_file_csv']['name'], 2 );
		if ( $fext != 'csv' ) {
			$res['status']  = 'error';
			$res['message'] = __( 'The file is not supported.', 'usces' ) . '(' . $_FILES['tracking_file_csv']['name'] . ')';
			$url            = USCES_ADMIN_URL . '?page=usces_orderlist&usces_status=' . $res['status'] . '&usces_message=' . urlencode( $res['message'] );
			wp_redirect( $url );
			exit;
		}

		$new_filename = $fname . '_' . time() . '.' . $fext;
		$upload_file  = $path . mb_convert_encoding( $new_filename, 'SJIS', 'UTF-8' );
		if ( ! move_uploaded_file( $workfile, $upload_file ) ) {
			$res['status']  = 'error';
			$res['message'] = __( 'The file was not stored.', 'usces' ) . '(' . $_FILES['tracking_file_csv']['name'] . ')';
			$url            = USCES_ADMIN_URL . '?page=usces_orderlist&usces_status=' . $res['status'] . '&usces_message=' . urlencode( $res['message'] );
			wp_redirect( $url );
			exit;
		}
		$res['upload_mode']  = $_REQUEST['upload_mode'];
		$res['new_filename'] = $new_filename;
		return $res;
	}
}

add_action( 'usces_after_cart_instant', 'custom_after_cart_instant' );
function custom_after_cart_instant() {
	if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] == 'tracking_page' && isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'tracking_upload' ) {
		check_admin_referer( 'admin_system', 'wc_nonce' );
		$filename = custom_upload_tracking_number();
		$url      = USCES_ADMIN_URL . '?page=usces_orderlist&usces_status=none&usces_message=&order_action=tracking_register&tracking_regfile=' . $filename['new_filename'] . '&upload_mode=' . $filename['upload_mode'];
		wp_redirect( $url );
		exit;
	}
}

add_action( 'usces_action_order_list_page', 'custom_action_order_list_page' );
function custom_action_order_list_page( $order_action ) {

	if ( $order_action == 'tracking_register' ) {
		if ( isset( $_GET['tracking_regfile'] ) && ! WCUtils::is_blank( $_GET['tracking_regfile'] ) ) {

			$res                   = custom_register_tracking_number();
			$_GET['usces_status']  = ( isset( $res['status'] ) ) ? $res['status'] : '';
			$_GET['usces_message'] = ( isset( $res['message'] ) ) ? $res['message'] : '';
		}
	}
}

function custom_register_tracking_number() {
	global $wpdb, $usces;

	// check_admin_referer( 'admin_system', 'wc_nonce' );
	// b2_register
	$path      = WP_CONTENT_DIR . '/uploads/';
	$file_name = '';
	$reg_file  = '';
	$res       = array();
	if ( isset( $_REQUEST['tracking_regfile'] ) && ! WCUtils::is_blank( $_REQUEST['tracking_regfile'] ) && isset( $_REQUEST['order_action'] ) && $_REQUEST['order_action'] == 'tracking_register' ) {
		$file_name = $_REQUEST['tracking_regfile'];
		$reg_file  = $path . mb_convert_encoding( $file_name, 'SJIS', 'UTF-8' );
		if ( ! file_exists( $reg_file ) ) {
			$res['status']  = 'error';
			$res['message'] = __( 'CSV file does not exist.', 'usces' ) . esc_html( $file_name );
			return( $res );
		}
	}

	$wpdb->query( 'SET SQL_BIG_SELECTS=1' );
	set_time_limit( 3600 );

	define( 'B2_tracking_number', 3 );// 荷物配送番号
	define( 'B2_tracking_DATE', 4 );// 出荷日付
	define( 'B2_ORDER_ID', 0 );// Welcart受注番号

	$orglines  = array();
	$sp        = ',';
	$total_num = 0;
	$comp_num  = 0;
	$err_num   = 0;

	if ( ! ( $fpo = fopen( $reg_file, 'r' ) ) ) {
		$res['status']  = 'error';
		$res['message'] = __( 'A file does not open.', 'usces' ) . esc_html( $file_name );
		return $res;
	}

	$fname_parts = explode( '.', $reg_file );
	if ( 'csv' !== end( $fname_parts ) ) {
		$res['status']  = 'error';
		$res['message'] = __( 'This file is not in the CSV file.', 'usces' ) . esc_html( $file_name );
		return $res;

	} else {
		$buf = '';
		while ( ! feof( $fpo ) ) {
			$temp = fgets( $fpo, 10240 );
			if ( 0 == strlen( $temp ) ) {
				continue;
			}
			$search = ["\r\n", "\r", "\n"];
			$b = str_replace($search, '', $temp);
			$orglines[] = str_replace( '"', '', $b );
			// $orglines[] = str_replace( '"', '', $temp );
		}
	}
	fclose( $fpo );

	$pre_id = 0;
	if ( $_REQUEST['upload_mode'] === 'sagawa' ) {
		$delivery_company = '佐川急便';
	}
	if ( $_REQUEST['upload_mode'] === 'yamato' ) {
		$delivery_company = 'ヤマト運輸';
	}
	foreach ( $orglines as $line ) {
		$data     = explode( $sp, $line );
		$order_id = mb_convert_encoding( $data[0], 'UTF-8', 'SJIS' );
		if ( $order_id === '注文番号' ) {
			continue;
		}
		$shift_data = array_shift( $data );
		$data = array_filter( $data, 'arraycut' );
		$tracking_number = implode( ',', (array) $data );
		$total_num++;
		$order_data = $usces->get_order_data( $order_id );
		if ( $order_data ) {
			$usces->set_order_meta_value( 'tracking_number', $tracking_number, $order_id );
			$usces->set_order_meta_value( 'delivery_company', $delivery_company, $order_id );
			$comp_num++;
		} else {
			$err_num++;
		}
	}

	$res['status']  = 'success';
	$res['message'] = sprintf( __( '%2$s of %1$s lines registration completion, error on %3$s lines.', 'usces' ), $total_num, $comp_num, $err_num );
	unlink( $reg_file );

	return $res;
}

add_filter( 'usces_order_list_action_status', 'custom_order_list_action_status' );
function custom_order_list_action_status( $status ) {
	if ( isset( $_GET['usces_status'] ) && ! empty( $_GET['usces_status'] ) ) {
		$status = $_GET['usces_status'];
	}
	return $status;
}

add_filter( 'usces_order_list_action_message', 'custom_order_list_action_message' );
function custom_order_list_action_message( $message ) {
	if ( isset( $_GET['usces_message'] ) && ! empty( $_GET['usces_message'] ) ) {
		$message = $_GET['usces_message'];
	}
	return $message;
}

function arraycut( $element ) {
	return preg_match( '/^[0-9\-]+$/', $element );
}
