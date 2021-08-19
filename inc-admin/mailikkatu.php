<?php
add_filter( 'usces_action_dl_list_table', 'my_action_dl_list_table' );
function my_action_dl_list_table() {
	$html = '';
	?>
	<input type="button" id="mailikkatu" class="button" value="<?php _e( '発送完了メール一括送信', 'usces' ); ?>" />
	<?php
}

add_filter( 'usces_filter_order_list_page_js', 'my_filter_order_list_page_js' );
function my_filter_order_list_page_js() {
	$changePage = ( isset( $_GET['changePage'] ) ) ? '+"&changePage=' . $_GET['changePage'] . '"' : '';
	$html       = '
	$("#mailikkatu").click(function() {
		if( $("input[name*=\'listcheck\']:checked").length == 0 ) {
			alert("' . __( 'Choose the data.', 'usces' ) . '");
			$("#orderlistaction").val("");
			return false;
		}
		if( !confirm("発送完了メールを送信します。よろしいですか？") ) return;
		var listcheck = "";
		$( "input[name*=\'listcheck\']" ).each( function( i ) {
			if( $( this ).prop( "checked" ) ) {
				listcheck += "&listcheck["+i+"]="+$( this ).val();
				$( "#completionmail"+$( this ).val() ).html( "済" );
			}
		});
		location.href = "' . USCES_ADMIN_URL . '?page=usces_orderlist&order_action=batch_completionmail"+listcheck' . $changePage . ';
	});';
	return $html;
}

function my_batch_completionmail() {
	global $usces, $wpdb;

	$_POST['mode'] = 'completionMail';
	$subject   = $usces->options['mail_data']['title']['completionmail'];
	$tableName = $wpdb->prefix . "usces_order";
	$ids = isset( $_REQUEST['listcheck'] ) ? $_REQUEST['listcheck'] : array();
	foreach( (array)$ids as $order_id ) {
		$message = usces_order_confirm_message( $order_id );
		$order_data = $usces->get_order_data( $order_id, 'direct' );
		$cart = unserialize( $order_data['order_cart'] );
		$name = usces_localized_name( trim($order_data['order_name1']), trim($order_data['order_name2']), 'return' );
		$order_email = trim( $order_data['order_email'] );

		$order_para = array(
			'to_name' => sprintf(__('Mr/Mrs %s', 'usces'), $name),
			'to_address' => $order_email,
			'from_name' => get_option('blogname'),
			'from_address' => $usces->options['sender_mail'],
			'return_path' => $usces->options['sender_mail'],
			'subject' => $subject,
			'message' => $message
		);
		$res = usces_send_mail( $order_para );

		if( $res ) {
			$order_modified = substr(get_date_from_gmt(gmdate('Y-m-d H:i:s', time())), 0, 10);
			$order_status = $order_data['order_status'];
			if( false === strpos($order_status, 'completion') ) {
				if( ',' != substr($order_status, -1) ) $order_status .= ',';
				$order_status .= 'completion,';
			}
			$checkfield = unserialize( $order_data['order_check'] );
			if( !isset($checkfield['completionmail']) ) $checkfield['completionmail'] = 'completionmail';
			$query = $wpdb->prepare( "UPDATE $tableName SET order_modified = %s, order_status = %s, order_check = %s WHERE ID = %d", $order_modified, $order_status, serialize($checkfield), $order_id );
			//$query = $wpdb->prepare( "UPDATE $tableName SET order_check = %s WHERE ID = %d", serialize($checkfield), $order_id );
			$wpdb->query( $query );

			$admin_para = array(
				'to_name' => 'Shop Admin',
				'to_address' => $usces->options['order_mail'],
				'from_name' => 'Welcart Auto BCC',
				'from_address' => $usces->options['sender_mail'],
				'return_path' => $usces->options['sender_mail'],
				'subject' => $subject.' to '.sprintf(__('Mr/Mrs %s', 'usces'), $name),
				'message' => $message
			);
			usces_send_mail( $admin_para );
		}
	}
}

add_action( 'usces_action_order_list_page', 'my_action_order_list_page' );
function my_action_order_list_page( $order_action ) {
	switch( $order_action ) {
	case 'batch_completionmail':
		my_batch_completionmail();
		break;
	}
}

//add_filter( 'usces_filter_orderlist_sql_select', 'collne_filter_orderlist_sql_select', 10, 4 );
function collne_filter_orderlist_sql_select( $query, $cscs, $csod, $orderlist ) {
	global $wpdb;

	$qstr = "SELECT \n";
	if ( $orderlist->view_column['admin_memo'] ) {
		$qstr .= "memo.meta_value AS admin_memo, \n";
	}
	$qstr .= "ord.ID AS ID, \n";
	if ( $orderlist->view_column['deco_id'] ) {
		$qstr .= "deco.meta_value AS deco_id, \n";
	}
	$qstr .= "DATE_FORMAT(ord.order_date, %s) AS order_date, \n";
	$qstr .= "ord.order_modified AS order_modified, \n";
	$qstr .= "ord.order_status AS estimate_status, \n";
	$qstr .= "ord.order_status AS process_status, \n";
	if ( $orderlist->view_column['tracking_number'] ) {
		$qstr .= "trac.meta_value AS tracking_number, \n";
	}
	$qstr .= "ord.order_payment_name AS payment_name, \n";
	if ( $orderlist->view_column['wc_trans_id'] ) {
		$qstr .= "trans.meta_value AS wc_trans_id, \n";
	}
	$qstr .= "ord.order_status AS receipt_status, \n";
	$qstr .= "ord.order_item_total_price AS item_total_price, \n";
	$qstr .= "ord.order_getpoint AS getpoint \n,";
	$qstr .= "ord.order_usedpoint AS usedpoint, \n";
	$qstr .= "ord.order_discount AS discount, \n";
	$qstr .= "ord.order_shipping_charge AS shipping_charge, \n";
	$qstr .= "ord.order_cod_fee AS cod_fee, \n";
	$qstr .= "ord.order_tax AS tax, \n";
	$qstr .= "(ord.order_item_total_price - ord.order_usedpoint + ord.order_discount + ord.order_shipping_charge + ord.order_cod_fee + ord.order_tax) AS total_price, \n";
	$qstr .= "ord.order_delivery_method AS deli_method, \n";
	$qstr .= "ord.order_delivery AS deli_name, \n";
	$qstr .= "ord.order_delivery_time AS deli_time, \n";
	$qstr .= "ord.order_delivery_date AS deli_date, \n";
	$qstr .= "ord.order_delidue_date AS delidue_date, \n";
	$qstr .= "ord.mem_id AS mem_id, \n";
	$qstr .= "ord.order_name1 AS name1, \n";
	$qstr .= "ord.order_name2 AS name2, \n";
	$qstr .= "ord.order_name3 AS name3, \n";
	$qstr .= "ord.order_name4 AS name4, \n";
	$qstr .= "ord.order_zip AS zipcode, \n";
	if ( $orderlist->view_column['country'] ) {
		$qstr .= "country.meta_value AS country, \n";
	}
	$qstr .= "ord.order_pref AS pref, \n";
	$qstr .= "ord.order_address1 AS address1, \n";
	$qstr .= "ord.order_address2 AS address2, \n";
	$qstr .= "ord.order_address3 AS address3, \n";
	$qstr .= "ord.order_tel AS tel, \n";
	$qstr .= "ord.order_fax AS fax, \n";
	$qstr .= "ord.order_email AS email, \n";
	$qstr .= "ord.order_check AS completionmail, \n";
	$qstr .= "ord.order_note AS note \n";
	$qstr .= "{$cscs}";
	$qstr .= "{$csod}";
	$qstr .= "FROM {$orderlist->table} AS ord \n";
	$query = $wpdb->prepare( $qstr, '%Y-%m-%d %H:%i' );
	return $query;
}
