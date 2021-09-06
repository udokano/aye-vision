<?php


/*
不要な項目を削除
====================================*/

/*
管理画面
---------------------- */
/** WordPressへようこそ!を削除 */
remove_action( 'welcome_panel', 'wp_welcome_panel' );

/** ウィジェットを削除 */
add_action( 'wp_dashboard_setup', 'remove_dashboard_widget' );

/** アクティビティ、クイックドラフト、WordPressニュースの削除 */
function remove_dashboard_widget() {
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
}

/** コメント機能 */
add_filter( 'comments_open', '__return_false' );


/*
フロント,headタグ内
--------------------------- */

/** Emoji系 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/** OEmbed系 */
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/** Wp-json系 */
remove_action( 'wp_head', 'rest_output_link_wp_head' );

/** EditURI */
remove_action( 'wp_head', 'rsd_link' );

/** Wlwmanifest */
remove_action( 'wp_head', 'wlwmanifest_link' );

remove_action( 'wp_head', 'wp_resource_hints', 2 );

remove_action( 'wp_head', 'wlwmanifest_link' );

/** WordPressバージョン出力metaタグ非表示 */
remove_action( 'wp_head', 'wp_generator' );

/* パラメーターも */
function vc_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

/** Rel linkの削除 */
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/** DNSプリフェッチコード挿入を削除 */
// add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

/** Gutenbergの読み込みスタイルを削除 */
add_action( 'wp_enqueue_scripts', 'remove_block_library_style' );

/** Remove_block_library_style */
function remove_block_library_style() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
}

/* 不要なtype属性削除 */
function html5_validation( $buffer ) {
	$buffer = preg_replace( '/\s?type=(\'|")text\/(javascript|css)(\'|")/is', '', $buffer );
	return $buffer;
}
function buf_start() {
	ob_start( 'html5_validation' ); }
function buf_end() {
	ob_end_flush(); }
add_action( 'after_setup_theme', 'buf_start' );
add_action( 'shutdown', 'buf_end' );

/* サムネイルとエディターないのimgのクラスを削除 */

function custom_attribute( $html ) {
	// class を削除する
	$html = preg_replace( '/class=".*\w+"\s/', '', $html );
	return $html;
}
add_filter( 'image_send_to_editor', 'custom_attribute' );
add_filter( 'post_thumbnail_html', 'custom_attribute', 10 );

/* 画像の遅延読み込みの処理 */

/*
 function customize_img_lazy($content) {
  //classにlazyを付与
  $re_content = preg_replace('/(<img.*class=")/', '$1lazy ', $content);

  //classがないimgタグにもclass="lazy"を付与
  $re_content = preg_replace('/(<img*(?!.*class)[^>]*)/', '$1 class="lazy"', $re_content);

  //srcを入れ替え
  $re_content = preg_replace('/(<img[^>]*)\s+src=/', '$1 src="/img/dummy.jpg" data-src=', $re_content);

  //srcsetを入れ替え
  $re_content = str_replace('srcset','srcset="/img/dummy.jpg" data-srcset',$re_content);

  //置換したcontentsを返す
  return $re_content;
}
add_filter('the_content','customize_img_lazy'); */



remove_filter( 'acf_the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/*
CSSとJSの読み込み
---------------------------------------*/

function prefix_add_footer_styles() {
	if ( is_home() || is_front_page() ) {
		wp_enqueue_style( 'main-css', get_template_directory_uri() . '/dist/css/style.css', '', mt_rand() );
	}
};
	add_action( 'wp_footer', 'prefix_add_footer_styles' );


function load_files() {

	/*
	CSS
	------------- */
	if ( ! is_home() || ! is_front_page() ) {
		wp_enqueue_style( 'main-css', get_template_directory_uri() . '/dist/css/style.css', '', mt_rand() );
	}

	if ( is_single() && ! in_category( 'item' ) ) {
		  wp_enqueue_style( 'editor-style', get_template_directory_uri() . '/admin/css/editor-style.css', '', mt_rand() );
	}

	/*
	JS
	------------- */

	// WordPress本体のjquery.jsを読み込まない

	if ( is_single() && in_category( 'item' ) || is_page( 'usces-cart' ) ) {
		  wp_enqueue_script( 'jquery' );
		wp_enqueue_script(
			'jquery.validationEngine.js',
			get_template_directory_uri() . '/assets/lib/jquery.validationEngine.min.js',
			array( 'jquery' ),
			'2.6.2',
			true
		);
		wp_enqueue_script(
			'jquery.validationEngine-ja.js',
			get_template_directory_uri() . '/assets/lib/jquery.validationEngine-ja.js',
			array( 'jquery' ),
			'2.0',
			true
		);
	} else {
		wp_deregister_script( 'jquery' );
		// jQueryの読み込み
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', '', '', true );
	}

	// サイト共通JS
	wp_enqueue_script(
		'common-script',
		get_template_directory_uri() . '/dist/scripts/main.js',
		'',
		mt_rand(),
		true
	);

	// 遅延読み込みのライブラリー
	// wp_enqueue_script( 'intersection-observer', get_template_directory_uri() . '/assets/lib/intersection-observer.js', '', '', false );
}
add_action( 'wp_enqueue_scripts', 'load_files' );

// home の場合はCSSを非同期で読み込む
function load_css_async_top( $html, $handle, $href, $media ) {
	// ホームの場合のみカスタマイズ
	if ( is_home() ) {
		// 元の link 要素の HTML（改行が含まれているようなので前後の空白文字を削除）
		$default_html = trim( $html );
		// HTML を変更
		$html = <<<EOT
<link rel="stylesheet" id="{$handle}-css" href="$href" media="print" onload="this.media='all'">
<noscript>{$default_html}</noscript>\n
EOT;
	}
	return $html;
}
add_filter( 'style_loader_tag', 'load_css_async_top', 10, 4 );


/**
 * JS遅延読み込み、プラグインの処理に影響出る可能性があるからとりあえずTOPページのみに作動
 */



/**
 * scriptLoader
 * javascriptの遅延defer属性を追加
 */
function scriptLoader( $script, $handle, $src ) {
	if ( is_admin() || ! is_home() || ! is_front_page() ) {
		$script = sprintf( '<script src="%s"></script>' . "\n", $src );
		return $script;
	}

	if ( is_home() || is_front_page() ) {
		$script = sprintf( '<script src="%s" type="text/javascript" defer=""></script>' . "\n", $src );
		return $script;
	}
}
add_filter( 'script_loader_tag', 'scriptLoader', 10, 5 );

/**
 *
 * エディタースタイル読み込み
 */

 add_editor_style( get_template_directory_uri() . '/admin/css/editor-style.css?' . mt_rand() );

function extend_tiny_mce_before_init( $mce_init ) {

	$mce_init['cache_suffix'] = 'v=' . time();

	return $mce_init;
}
add_filter( 'tiny_mce_before_init', 'extend_tiny_mce_before_init' );

add_filter( 'tiny_mce_before_init', 'custom_tiny_mce_body_class' );
function custom_tiny_mce_body_class( $settings ) {
	$settings['body_class'] = 'c-cms';
	return $settings;
}

function my_tiny_mce_before_init( $ar ) {
	$ar['block_formats'] = '段落=p;見出し1=h2;見出し2=h3;見出し3=h4;';
	return $ar;
}
add_filter( 'tiny_mce_before_init', 'my_tiny_mce_before_init' );

function modify_formats( $settings ) {
	$formats             = array(
		'bold'   => array( 'inline' => 'b' ),
		'italic' => array( 'inline' => 'i' ),
	);
	$settings['formats'] = json_encode( $formats );
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'modify_formats' );



/**
 *
 * 不要なプラグインファイルを読み込まない
 */

function dp_deregister_styles() {

	if ( ! is_page( 'usces-cart' ) ) {
		wp_dequeue_style( 'usces_default_css' );
	}
}
// アクションフック
add_action( 'wp_print_styles', 'dp_deregister_styles', 100 );

function dashicons_dequeue_styles() {
	if ( current_user_can( 'update_core' ) ) {
		return;
	}
	wp_deregister_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'dashicons_dequeue_styles' );


function dp_display_pluginhandles() {
	$wp_styles  = wp_styles();
	$wp_scripts = wp_scripts();
	$handlename = '<dl><dt>Queuing scripts</dt><dd><ul>';
	foreach ( $wp_styles->queue as $handle ) :
		$handlename .= '<li>' . $handle . '</li>';
  endforeach;
	$handlename .= '</ul></dd>';
	$handlename .= '<dt>Queuing styles</dt><dd><ul>';
	foreach ( $wp_scripts->queue as $handle ) :
		$handlename .= '<li>' . $handle . '</li>';
  endforeach;
	$handlename .= '</ul></dd></dl>';
	return $handlename;
}
add_shortcode( 'pluginhandles', 'dp_display_pluginhandles' );

/* サムネイル有効化 */

add_theme_support( 'post-thumbnails', array( 'post', 'page', 'news', 'doctor', 'ope', 'case', 'faq', 'machine' ) );


/* タグをチェックボックスへ変更 */

/*
 * Meta Box Removal
 */
function rudr_post_tags_meta_box_remove() {
	$id        = 'tagsdiv-post_tag'; // you can find it in a page source code (Ctrl+U)
	$post_type = 'post'; // remove only from post edit screen
	$position  = 'side';
	remove_meta_box( $id, $post_type, $position );
}
add_action( 'admin_menu', 'rudr_post_tags_meta_box_remove' );

/*
 * Add
 */
function rudr_add_new_tags_metabox() {
	$id        = 'rudrtagsdiv-post_tag'; // it should be unique
	$heading   = 'タグ'; // meta box heading
	$callback  = 'rudr_metabox_content'; // the name of the callback function
	$post_type = 'post';
	$position  = 'side';
	$pri       = 'default'; // priority, 'default' is good for us
	add_meta_box( $id, $heading, $callback, $post_type, $position, $pri );
}
add_action( 'admin_menu', 'rudr_add_new_tags_metabox' );

/*
 * Fill
 */
function rudr_metabox_content( $post ) {

	// get all blog post tags as an array of objects
	$all_tags = get_terms(
		array(
			'taxonomy'   => 'post_tag',
			'hide_empty' => 0,
		)
	);

	// get all tags assigned to a post
	$all_tags_of_post = get_the_terms( $post->ID, 'post_tag' );

	// create an array of post tags ids
	$ids = array();
	if ( $all_tags_of_post ) {
		foreach ( $all_tags_of_post as $tag ) {
			$ids[] = $tag->term_id;
		}
	}

	// HTML
	echo '<div id="taxonomy-post_tag" class="categorydiv">';
	echo '<input type="hidden" name="tax_input[post_tag][]" value="0" />';
	echo '<ul>';
	foreach ( $all_tags as $tag ) {
		// unchecked by default
		$checked = '';
		// if an ID of a tag in the loop is in the array of assigned post tags - then check the checkbox
		if ( in_array( $tag->term_id, $ids ) ) {
			$checked = " checked='checked'";
		}
		$id = 'post_tag-' . $tag->term_id;
		echo "<li id='{$id}'>";
		echo "<label><input type='checkbox' name='tax_input[post_tag][]' id='in-$id'" . $checked . " value='$tag->slug' /> $tag->name</label><br />";
		echo '</li>';
	}
	echo '</ul></div>'; // end HTML
}



// 新たにカラムを追加
function add_cattag_columns( $columns ) {
	$index = 2; // 列を追加する位置
	return array_merge(
		array_slice( $columns, 0, $index ),
		array( 'id' => 'ID' ),
		array_slice( $columns, $index )
	);
}
add_filter( 'manage_edit-category_columns', 'add_cattag_columns' );
add_filter( 'manage_edit-post_tag_columns', 'add_cattag_columns' );

// 新カラムにIDを表示
function custom_term_columns( $string, $column_name, $cattag_id ) {
	if ( 'id' === $column_name ) {
		echo $cattag_id;
	}

}
add_action( 'manage_category_custom_column', 'custom_term_columns', 10, 3 );
add_action( 'manage_post_tag_custom_column', 'custom_term_columns', 10, 3 );

// 並び替えを可能にする
function sort_cattag_columns( $columns ) {
	$columns['id'] = 'ID';
	return $columns;
}
add_filter( 'manage_edit-category_sortable_columns', 'sort_cattag_columns' );
add_filter( 'manage_edit-post_tag_sortable_columns', 'sort_cattag_columns' );


/*
投稿一覧にタクソノミー表示からの絞り込み
----------------------------------------*/




function my_manage_posts_columns_faq_category( $columns ) {
	$columns['tax_news_kind'] = 'お知らせの種類';
	return $columns;
}
function my_add_column_faq_category( $column_name, $post_id ) {
	if ( $column_name == 'tax_news_kind' ) {
		$tax    = wp_get_object_terms( $post_id, 'tax_news_kind' );
		$stitle = $tax[0]->name;
	}

	if ( isset( $stitle ) && $stitle ) {
		echo esc_attr( $stitle );
	}
}
function my_add_post_taxonomy_restrict_filter() {
	global $post_type;
	if ( 'news' == $post_type ) {
		?>
	<select name="tax_news_kind">
	  <option value="">カテゴリー指定なし</option>
		<?php
		$terms = get_terms( 'tax_news_kind' );
		foreach ( $terms as $term ) {
			?>
		<option value="<?php echo $term->slug; ?>"
								  <?php
									if ( $_GET['tax_news_kind'] == $term->slug ) {
										print 'selected'; }
									?>
		><?php echo $term->name; ?></option>
			<?php
		}
		?>
	</select>
		<?php
	}
}
add_filter( 'manage_edit-news_columns', 'my_manage_posts_columns_faq_category' );
add_action( 'manage_news_posts_custom_column', 'my_add_column_faq_category', 10, 2 );
add_action( 'restrict_manage_posts', 'my_add_post_taxonomy_restrict_filter' );


/**
 *
 * 投稿一覧にサムネイル追加
 */


 // 投稿一覧画面でサムネイル表示
function add_posts_columns( $columns ) {
	$columns['thumbnail'] = 'アイキャッチ';
	return $columns;
}
function add_posts_columns_row( $column_name, $post_id ) {
	if ( 'thumbnail' == $column_name ) {
		$thumb = get_the_post_thumbnail( $post_id, array( 100, 100 ), 'thumbnail' );
		echo ( $thumb ) ? $thumb : '－';
	}
}
add_filter( 'manage_posts_columns', 'add_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_posts_columns_row', 10, 2 );


/*
get_terms 投稿タイプ縛り
---------------------------------*/

function hoge_terms_clauses( $clauses, $taxonomy, $args ) {
	if ( ! empty( $args['post_type'] ) ) {
		global $wpdb;
		$post_types = array();
		if ( $args['post_type'] ) {
			foreach ( $args['post_type'] as $cpt ) {
				$post_types[] = "'" . $cpt . "'";
			}
		}
		if ( ! empty( $post_types ) ) {
			$clauses['fields']  = 'DISTINCT ' . str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields'] ) . ', COUNT(t.term_id) AS count';
			$clauses['join']   .= ' INNER JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
			$clauses['where']  .= ' AND p.post_type IN (' . implode( ',', $post_types ) . ')';
			$clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];
		}
	}
	// print_r($clauses);exit;
	return $clauses;
}
add_filter( 'terms_clauses', 'hoge_terms_clauses', 10, 3 );



function query_at_home( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_category() ) {
		$query->set( 'post_status', 'publish' );
			$query->set( 'posts_per_page', -1 );
		return;
	}
}
add_action( 'pre_get_posts', 'query_at_home' );




function query_at_item_search( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_search() ) {
		$query->set( 'post_status', 'publish' );
		$query->set( 'category_name', 'item' );
		$query->set( 'posts_per_page', -1 );
		return;
	}
}
add_action( 'pre_get_posts', 'query_at_item_search' );


function query_at_category( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_category() ) {
		$query->set( 'post_status', 'publish' );
		$query->set( 'posts_per_page', -1 );
		return;
	}
}
add_action( 'pre_get_posts', 'query_at_category' );


/**
 * キーワード検索にカスタムフィールド追加
 */

function cf_search_join( $join ) {
	global $wpdb;
	if ( is_search() ) {
		$join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}
	return $join;
}
add_filter( 'posts_join', 'cf_search_join' );

function cf_search_where( $where ) {
	global $wpdb;
	if ( is_search() ) {
		$where = preg_replace(
			'/\(\s*' . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			'(' . $wpdb->posts . '.post_title LIKE $1) OR (' . $wpdb->postmeta . '.meta_value LIKE $1)',
			$where
		);

		// 特定のカスタムフィールドを検索対象から外す（※１）
		// $where .= " AND (" . $wpdb->postmeta . ".meta_key NOT LIKE 'number')";
		// $where .= " AND (" . $wpdb->postmeta . ".meta_key NOT LIKE 'zip')";
		// $where .= " AND (" . $wpdb->postmeta . ".meta_key NOT LIKE 'access')";
	}
	return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

function cf_search_distinct( $where ) {
	global $wpdb;
	if ( is_search() ) {
		return 'DISTINCT';
	}
	return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

// 検索対象を『タイトルのみ』にする
function __search_by_title_only( $search, &$wp_query ) {
	global $wpdb;
	if ( empty( $search ) ) {
		return $search; // skip processing - no search term in query
	}
	$q             = $wp_query->query_vars;
	$n             = ! empty( $q['exact'] ) ? '' : '%';
	$search        =
		$searchand = '';
	foreach ( (array) $q['search_terms'] as $term ) {
		$term      = esc_sql( like_escape( $term ) );
		$search   .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
		$searchand = ' AND ';
	}
	if ( ! empty( $search ) ) {
		$search = " AND ({$search}) ";
		if ( ! is_user_logged_in() ) {
			$search .= " AND ($wpdb->posts.post_password = '') ";
		}
	}
	return $search;
}
// add_filter( 'posts_search', '__search_by_title_only', 500, 2 );

/*
 function custom_search( $search, $wp_query ) {
	global $wpdb;

	if ( ! $wp_query->is_search ) {
			return $search;
	}
	if ( ! isset( $wp_query->query_vars ) ) {
			return $search;
	}

	$search_words = explode( ' ', isset( $wp_query->query_vars['s'] ) ? $wp_query->query_vars['s'] : '' );
	if ( count( $search_words ) > 0 ) {
			$search  = '';
			$search .= "AND post_type = 'post'";
		foreach ( $search_words as $word ) {
			if ( ! empty( $word ) ) {
					$search_word = '%' . esc_sql( $word ) . '%';
					$search     .= " AND (
								 {$wpdb->posts}.post_title LIKE '{$search_word}'
								OR {$wpdb->posts}.post_content LIKE '{$search_word}'
								OR {$wpdb->posts}.ID IN (
								SELECT distinct post_id
								FROM {$wpdb->postmeta}
								WHERE meta_value LIKE '{$search_word}'
								)
							) ";

			}
		}
	}
	return $search;
}
add_filter( 'posts_search', 'custom_search', 10, 2 ); */


/**
 * 記事一覧の抜粋の...のスタイル変更
 *
 * @param string $more 抜粋文字.
 * @return '…'
 */
function new_excerpt_more( $more ) {
	if ( is_page( 'blog' ) ) {

		return '・・・<svg class="blog-archive__arw"><use xlink:href="#svg-icon-post-arw"></use></svg>';
	} else {
		return '…';
	}

}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * 記事一覧の抜粋の文字数変更
 *
 * @param int $length 抜粋文字の長さ.
 * @return '入力した文字数'
 */
function custom_excerpt_length( $length ) {
	if ( is_page( 'blog' ) ) {

		if ( wp_is_mobile() ) {
			return 42;
		} else {
			return 65;
		}
	} else {
		return 30;
	}

}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function custom_the_posts_pagination( $template ) {
	$template = '
	<div class="c-posts-pagination %1$s" role="navigation">
		<div class="c-posts-pagination__wrap">%3$s</div>
	</div>';
	return $template;
}
add_filter( 'navigation_markup_template', 'custom_the_posts_pagination' );



function my_ajax_url() {
	?>
  <script>var ajaxUrl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';</script>
	<?php
}
add_action( 'wp_head', 'my_ajax_url', 1 );



function json_breadcrumb() {

	if ( is_admin() || is_home() || is_front_page() ) {
		return; }

	$position  = 1;
	$query_obj = get_queried_object();
	$permalink = ( empty( $_SERVER['HTTPS'] ) ? 'http://' : 'https://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$json_breadcrumb = array(
		'@context'        => 'http://schema.org',
		'@type'           => 'BreadcrumbList',
		'name'            => 'パンくずリスト',
		'itemListElement' => array(
			array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'item'     => array(
					'name' => 'HOME',
					'@id'  => esc_url( home_url( '/' ) ),
				),
			),
		),
	);

	if ( is_page() ) {

		$ancestors   = get_ancestors( $query_obj->ID, 'page' );
		$ancestors_r = array_reverse( $ancestors );
		if ( count( $ancestors_r ) != 0 ) {
			foreach ( $ancestors_r as $key => $ancestor_id ) {
				$ancestor_obj                         = get_post( $ancestor_id );
				$json_breadcrumb['itemListElement'][] = array(
					'@type'    => 'ListItem',
					'position' => $position++,
					'item'     => array(
						'name' => esc_html( $ancestor_obj->post_title ),
						'@id'  => esc_url( get_the_permalink( $ancestor_obj->ID ) ),
					),
				);
			}
		}
		$json_breadcrumb['itemListElement'][] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'item'     => array(
				'name' => esc_html( $query_obj->post_title ),
				'@id'  => $permalink,
			),
		);

	} elseif ( is_post_type_archive() ) {

		$json_breadcrumb['itemListElement'][] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'item'     => array(
				'name' => $query_obj->label,
				'@id'  => esc_url( get_post_type_archive_link( $query_obj->name ) ),
			),
		);

	} elseif ( is_tax() || is_category() ) {

		if ( ! is_category() ) {
			$post_type                            = get_taxonomy( $query_obj->taxonomy )->object_type[0];
			$pt_obj                               = get_post_type_object( $post_type );
			$json_breadcrumb['itemListElement'][] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'item'     => array(
					'name' => $pt_obj->label,
					'@id'  => esc_url( get_post_type_archive_link( $pt_obj->name ) ),
				),
			);
		}

		$ancestors   = get_ancestors( $query_obj->term_id, $query_obj->taxonomy );
		$ancestors_r = array_reverse( $ancestors );
		foreach ( $ancestors_r as $key => $ancestor_id ) {
			$json_breadcrumb['itemListElement'][] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'item'     => array(
					'name' => esc_html( get_cat_name( $ancestor_id ) ),
					'@id'  => esc_url( get_term_link( $ancestor_id, $query_obj->taxonomy ) ),
				),
			);
		}

		$json_breadcrumb['itemListElement'][] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'item'     => array(
				'name' => esc_html( $query_obj->name ),
				'@id'  => esc_url( get_term_link( $query_obj ) ),
			),
		);

	} elseif ( is_single() ) {

		if ( ! is_single( 'post' ) ) {
			$pt_obj                               = get_post_type_object( $query_obj->post_type );
			$json_breadcrumb['itemListElement'][] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'item'     => array(
					'name' => $pt_obj->label,
					'@id'  => esc_url( get_post_type_archive_link( $pt_obj->name ) ),
				),
			);
		}

		$json_breadcrumb['itemListElement'][] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'item'     => array(
				'name' => esc_html( $query_obj->post_title ),
				'@id'  => $permalink,
			),
		);

	} elseif ( is_404() ) {

		$json_breadcrumb['itemListElement'][] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'item'     => array(
				'name' => '404 Not found',
				'@id'  => $permalink,
			),
		);

	} elseif ( is_search() ) {

		$json_breadcrumb['itemListElement'][] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'item'     => array(
				'name' => '「' . get_search_query() . '」の検索結果',
				'@id'  => $permalink,
			),
		);

	}

	echo '<script type="application/ld+json">' . json_encode( $json_breadcrumb ) . '</script>';
}

add_action( 'wp_head', 'json_breadcrumb' );





// ブログカード挿入


// 記事IDを指定して抜粋文を取得
function ltl_get_the_excerpt( $post_id ) {
	global $post;
	$post_bu = $post;
	$post    = get_post( $post_id );
	setup_postdata( $post_id );
	$output = get_the_excerpt();
	$post   = $post_bu;
	return $output;
}

// ショートコード
function nlink_scode( $atts ) {
	extract(
		shortcode_atts(
			array(
				'url'     => '',
				'title'   => '',
				'excerpt' => '',
			),
			$atts
		)
	);

	$id = url_to_postid( $url );// URLから投稿IDを取得

	$no_image = 'noimageに指定したい画像があればここにパス';// アイキャッチ画像がない場合の画像を指定

	// タイトルを取得
	if ( empty( $title ) ) {
		$title = esc_html( get_the_title( $id ) );
	}
	// 抜粋文を取得
	if ( empty( $excerpt ) ) {
		$excerpt = esc_html( ltl_get_the_excerpt( $id ) );
		if ( mb_strlen( $excerpt, 'UTF-8' ) > 120 ) {
			  $excerpt = mb_substr( $excerpt, 0, 120, 'UTF-8' ) . '...';
		}
	}

	// アイキャッチ画像を取得
	if ( has_post_thumbnail( $id ) ) {
		$img     = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
		$img_tag = "<img src='" . $img[0] . "' alt='{$title}'/>";
	} else {
		$img_tag = '<img src="' . $no_image . '" alt="" width="' . $img_width . '" height="' . $img_height . '" />';
	}

	$nlink .= '
<a href="' . $url . '" class="blog-card" target="_blank" rel="noopener noreferrer">
  <div class="blog-card__box">
  <div class="blog-card__band"><span class="blog-card__band-in">あわせて読みたい</span></div>
    <div class="blog-card__thumbnail">' . $img_tag . '</div>
    <div class="blog-card__right">
        <div class="blog-card__title">' . $title . ' </div>
        <div class="blog-card__excerpt">' . $excerpt . '</div>
		<div class="blog-card__readmore"><span class="blog-card__readmore-in">記事を読む</span></div>
    </div>
  </div>
</a>';

	return $nlink;
}

add_shortcode( 'nlink', 'nlink_scode' );




if ( ! function_exists( 'st_add_orignal_quicktags' ) ) {
	/**
	 * オリジナルクイックタグ登録
	 */
	function st_add_orignal_quicktags() {
		if ( wp_script_is( 'quicktags' ) ) {
			?>
<script type="text/javascript">
				QTags.addButton('ed_p', 'P', '<p>', '</p>');
				QTags.addButton('ed_h2', 'h2', '<h2>', '</h2>');
				QTags.addButton('ed_h3', 'h3', '<h3>', '</h3>');
				QTags.addButton('ed_h4', 'h4', '<h4>', '</h4>');
				QTags.addButton('ed_br', 'br', '<br>');
				//スマホの時は改行OFF
				QTags.addButton('ed_br__pc', 'br__pc', '<br class="u-sp-hidden">');
				QTags.addButton('ed_br__sp', 'br__sp', '<br class="u-pc-hidden">');
				QTags.addButton('ed_strong', 'strong', '<strong>', '</strong>');
				QTags.addButton('ed_huto', 'ボックス', '<div class="huto">', '</div>');
				QTags.addButton('ed_huto', '太字', '<span class="huto">', '</span>');
				QTags.addButton('ed_hutoaka', '太字（赤）', '<span class="hutoaka">', '</span>');
				QTags.addButton('ed_hutyellow', '太字（黄）', '<span class="hutoyellow">', '</span>');
				QTags.addButton('ed_oomozi', '大文字', '<span class="oomozi">', '</span>');
				QTags.addButton('ed_komozi', '小文字', '<span class="komozi">', '</span>');
				QTags.addButton('ed_dotline', 'ドット線', '<span class="dotline">', '</span>');
				QTags.addButton('ed_ymarker', '黄マーカー', '<span class="ymarker">', '</span>');
				QTags.addButton('ed_under_rmarker', 'アンダー黄色マーカー', '<span class="underline-yellow">', '</span>');
				QTags.addButton('ed_ymarker', '黄マーカー', '<span class="ymarker">', '</span>');
				QTags.addButton('ed_sankou', '参考', '<div class="sankou">', '</div>');
				QTags.addButton('ed_photoline', '写真に枠線', '<span class="photoline">', '</span>');
				QTags.addButton('ed_entry', '記事タイトルデザイン', '<p class="entry-title">', '</p>');
				QTags.addButton('ed_clearfix', '回り込み解除', '<div class="clearfix">', '</div>');
				QTags.addButton('ed_center', 'センター寄せ', '<div class="center">', '</div>');
				QTags.addButton('ed_yellowbox', '黄色ボックス', '<div class="boxes-style yellowbox">', '</div>');
				QTags.addButton('ed_redbox', '薄赤ボックス', '<div class="boxes-style redbox">', '</div>');
				QTags.addButton('ed_bluebox', '薄青ボックス', '<div class="boxes-style bluebox">', '</div>');
				QTags.addButton('ed_greenbox', '薄緑ボックス', '<div class="boxes-style greenbox">', '</div>');
				QTags.addButton('ed_blaunbox', '薄茶色ボックス', '<div class="boxes-style blaunbox">', '</div>');
				QTags.addButton('ed_graybox', 'グレーボックス', '<div class="boxes-style graybox">', '</div>');
				QTags.addButton('ed_inyoumodoki', '引用風', '<div class="inyoumodoki">', '</div>');
				QTags.addButton('ed_dl', 'dl', '<dl><dt></dt>', '<dd></dd></dl>');
				//QTags.addButton('ed_card', 'ブログカード', '[nlink url="ここにURLを追加"]');
				/*QTags.addButton('ed_maruno', 'olタグを囲む数字ボックス', '<div class="maruno">', '</div>');
				QTags.addButton('ed_maruck', 'ulタグを囲むチェックボックス', '<div class="maruck">', '</div>');*/
				/*QTags.addButton('ed_scroll_box', 'table横スクロール要素', '<div class="scroll-box">', '</div>');
				QTags.addButton('ed_resetwidth', 'width100%リセット', '<span class="resetwidth">', '</span>');
				QTags.addButton('ed_notab', '装飾なしテーブル', '<div class="notab">', '</div>');
				QTags.addButton('ed_responbox', 'PCのみ左右%ボックス', '<div class="clearfix responbox"><div class="lbox"><p>左側のコンテンツ40%</p></div><div class="rbox"><p>右側のコンテンツ60%</p></div></div>', '');
				QTags.addButton('ed_responbox50s', '全サイズ左右50%ボックス', '<div class="clearfix responbox50 smart50"><div class="lbox"><p>左側のコンテンツ50%</p></div><div class="rbox"><p>右側のコンテンツ50%</p></div></div>', '');
				QTags.addButton( 'ed_ive', 'イベント', "onclick=\"ga('send', 'event', 'linkclick', 'click', 'hoge');\"", '' );*/
				QTags.addButton( 'ed_nofollow', 'nofollow', " rel=\"nofollow\"", '' );
			</script>
			<?php
		}
	}
}
add_action( 'admin_print_footer_scripts', 'st_add_orignal_quicktags' );



/**
 * エディターから不要な項目削除
 */

 add_filter( 'mce_buttons', 'remove_mce_buttons' );
function remove_mce_buttons( $buttons ) {
	$remove = array(
		'italic', // イタリック
		'wp_more', // 「続きを読む」タグを挿入
		// 'wp_adv', // ツールバー切り替え
		'dfw', // 集中執筆モード
	);
	return array_diff( $buttons, $remove );
}

add_filter( 'mce_buttons_2', 'remove_mce_buttons_2' );
function remove_mce_buttons_2( $buttons ) {
	$remove = array(
		'strikethrough', // 打ち消し
		'hr', // 横ライン
		'removeformat', // 書式設定をクリア
		'charmap', // 特殊文字
		'undo', // 取り消し
		'redo', // やり直し
		'wp_help', // キーボードショートカット
	);
	return array_diff( $buttons, $remove );
}

/**
 * セッションの利用開始
 */
function init_session_start() {

	session_start();
}
add_action( 'init', 'init_session_start' );




/**
 *
 * WELCART
 */


add_filter( 'usces_filter_tax_guid', 'my_filter_tax_guid', 10, 2 );
function my_filter_tax_guid( $str, $tax_rate ) {
	$str = '(税込)';
	return $str;
}


/* フォームオプション内容カスタマイズ */


add_filter( 'usces_filter_the_itemOption', 'my_filter_the_itemOption', 10, 6 );
function my_filter_the_itemOption( $html, $opts, $name, $label, $post_id, $sku ) {
	// 処理

	global $post, $usces;
	$post_id = $post->ID;

	if ( $label == '#default#' ) {
		$label = $name;
	}

	$opts = usces_get_opts( $post_id, 'name' );
	if ( ! $opts ) {
		return false;
	}

	$opt          = $opts[ $name ];
	$opt['value'] = usces_change_line_break( $opt['value'] );
	$means        = (int) $opt['means'];
	$essential    = (int) $opt['essential'];

	$html          = '';
	$sku           = esc_attr( urlencode( $usces->itemsku['code'] ) );
	$optcode       = esc_attr( urlencode( $name ) );
	$name          = esc_attr( $name );
	$label         = esc_attr( $label );
	$session_value = isset( $_SESSION['usces_singleitem']['itemOption'][ $post_id ][ $sku ][ $optcode ] ) ? $_SESSION['usces_singleitem']['itemOption'][ $post_id ][ $sku ][ $optcode ] : null;
	$html         .= "\n<label for='itemOption[{$post_id}][{$sku}][{$optcode}]' class='iopt_label'>{$label}</label>\n";
	switch ( $means ) {
		case 0:// Single-select
		case 1:// Multi-select
			$selects        = explode( "\n", $opt['value'] );
			$multiple       = ( $means === 0 ) ? '' : ' multiple';
			$multiple_array = ( $means == 0 ) ? '' : '[]';
			$html          .= "\n<select name='itemOption[{$post_id}][{$sku}][{$optcode}]{$multiple_array}' id='itemOption[{$post_id}][{$sku}][{$optcode}]' class='iopt_select'{$multiple} onKeyDown=\"if (event.keyCode == 13) {return false;}\">\n";
			if ( $essential == 1 ) {
				if ( '#NONE#' == $session_value || null == $session_value ) {
					$selected = ' selected="selected"';
				} else {
					$selected = '';
				}
				$html .= "\t<option value='#NONE#'{$selected}>" . __( 'Choose', 'usces' ) . "</option>\n";
			}
			$i = 0;
			foreach ( (array) $selects as $v ) {
				$v = trim( $v );
				if ( ( $i == 0 && $essential == 0 && null == $session_value ) || esc_attr( $v ) == $session_value ) {
					$selected = ' selected="selected"';
				} else {
					$selected = '';
				}
				$html .= "\t<option value='" . esc_attr( $v ) . "'{$selected}>" . esc_attr( $v ) . "</option>\n";
				$i++;
			}
			$html .= "</select>\n";
			break;
		case 2:// Text
			$html .= "\n<input name='itemOption[{$post_id}][{$sku}][{$optcode}]' type='text' id='itemOption[{$post_id}][{$sku}][{$optcode}]' class='iopt_text' onKeyDown=\"if (event.keyCode == 13) {return false;}\" value=\"" . esc_attr( $session_value ) . "\" />\n";
			break;

		/*
		 ===========
		ここからカスタマイズ
		================*/
		case 3:// Radio-button
			$selects = explode( "\n", $opt['value'] );

			$i = 0;
			foreach ( (array) $selects as $v ) {
				$v = trim( $v );
				if ( $v == $session_value ) {
					$checked = ' checked="checked"';
				} else {
					$checked = '';
				}
				$html .= "<input name='itemOption[{$post_id}][{$sku}][{$optcode}]' id='itemOption[{$post_id}][{$sku}][{$optcode}]{$i}' class='iopt_radio' type='radio' value='" . urlencode( $v ) . "'{$checked}>\t<label for='itemOption[{$post_id}][{$sku}][{$optcode}]{$i}' class='iopt_radio_label'><span class='item__text'>" . esc_html( $v ) . "</span></label>\n";
				$i++;
			}
			break;
		/*
		 ===============
		カスタマイズ終了
		=================*/
		case 4:// Check-box
			$selects = explode( "\n", $opt['value'] );

			$i = 0;
			foreach ( (array) $selects as $v ) {
				$v = trim( $v );
				if ( $v == $session_value ) {
					$checked = ' checked="checked"';
				} else {
					$checked = '';
				}
				$html .= "<input name='itemOption[{$post_id}][{$sku}][{$optcode}][]' id='itemOption[{$post_id}][{$sku}][{$optcode}]{$i}' class='iopt_checkbox' type='checkbox' value='" . urlencode( $v ) . "'{$checked}>\t<label for='itemOption[{$post_id}][{$sku}][{$optcode}]{$i}' class='iopt_checkbox_label'><span class='item__text'>" . esc_html( $v ) . "</span></label>\n";
				$i++;
			}
			break;
		case 5:// Text-area
			$html .= "\n<textarea name='itemOption[{$post_id}][{$sku}][{$optcode}]' id='itemOption[{$post_id}][{$sku}][{$optcode}]' class='iopt_textarea'>" . esc_attr( $session_value ) . "</textarea>\n";
			break;
	}

	if ( $out == 'return' ) {
		return $html;
	} else {
		echo $html;
	}
}

/**
 *
 * カート内で商品名の<br>タグ削除
 */


add_filter( 'usces_filter_cart_item_name', 'my_filter_cart_item_name', 10, 2 );
function my_filter_cart_item_name( $cart_item_name, $args ) {
    // 処理
    //var_dump( $cart_item_name);
    $ttt = str_replace( '&lt;br&gt;', '', $cart_item_name );

	return esc_html($ttt);
}


/**
 * 送り状一括登録
 */
require_once 'inc-admin/_loader.php';


/**
 * メニュー追加
 */
function mt_add_pages() {
			add_menu_page( 'よくある質問', 'よくある質問', 'edit_posts', 'post.php?post=39&action=edit', '', 'dashicons-sticky', 8 );
}
add_action( 'admin_menu', 'mt_add_pages' );

function mt_add_pages02() {
			add_menu_page( 'レイアウト管理', 'レイアウト管理', 'edit_posts', 'post.php?post=30&action=edit', '', 'dashicons-text-page', 9 );
}
add_action( 'admin_menu', 'mt_add_pages02' );

function mt_add_pages03() {
			add_menu_page( '商品検索履歴', '商品検索履歴', 'edit_posts', 'index.php?page=search-meter%2Fadmin.php', '', '', 9 );
}
add_action( 'admin_menu', 'mt_add_pages03' );


/**
 *
 * スタッフ用の管理画面用のCSS読み込み
 */


function my_admin_style() {
	global $current_user;
	wp_get_current_user();
	if ( $current_user->ID == 2 ) { // ユーザーIDを指定、該当ユーザーなら以下を適用
		wp_enqueue_style( 'my_admin_style', get_template_directory_uri() . '/admin/css/admin-style.css' );
	}

}
add_action( 'admin_enqueue_scripts', 'my_admin_style' );



/**
 *
 * スタッフ用の管理画面作成
 */

function remove_menus_user() {
	global $current_user;
	wp_get_current_user();
	if ( $current_user->ID == 2 ) { // ユーザーIDを指定、該当ユーザーなら以下を適用

		global $menu;
		// var_dump( $menu );
		global $submenu;
		// var_dump( $submenu );
		// global $$wp_admin_bar;
		// var_dump( $wp_admin_bar );
		remove_menu_page( 'index.php' ); // ダッシュボード.
		// remove_menu_page( 'edit.php' ); // 投稿.
		remove_menu_page( 'upload.php' ); // メディア.
		remove_menu_page( 'edit.php?post_type=page' ); // 固定.
		remove_menu_page( 'edit-comments.php' ); // コメント.
		remove_menu_page( 'themes.php' ); // 外観.
		remove_menu_page( 'plugins.php' ); // プラグイン.
		remove_menu_page( 'users.php' ); // ユーザー.
		remove_menu_page( 'tools.php' ); // ツール.
		remove_menu_page( 'options-general.php' ); // 設定.
		remove_menu_page( 'edit.php?post_type=mw-wp-form' );  // お問い合わせ（mw-wp-form）
		remove_menu_page( 'usc-e-shop/usc-e-shop.php' );  // welcart
		remove_menu_page( 'monsterinsights_reports' ); // アナリティクスレポート
		remove_menu_page( 'usces_orderlist' ); // Welcart Management
		remove_menu_page( 'ai1wm_export' ); // All In One SEO Pack.
		remove_menu_page( 'booking-package/index.php' ); // Welcart Management
		remove_menu_page( 'ai1wm_export' ); // All In One SEO Pack.
		remove_menu_page( 'aioseo' ); // Welcart Management
		remove_menu_page( 'edit.php?post_type=acf-field-group' ); // Welcart Management
		remove_menu_page( 'cptui_main_menu' ); // Welcart Management
		remove_submenu_page( 'edit-tags.php', 'to-interface-post' );
		remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' ); // 投稿 / タグ.

		  /*
		   add_menu_page( '通販今月or本日の売り上げ', '通販今月or本日の売り上げ', 'edit_posts', 'admin.php?page=usc-e-shop%2Fusc-e-shop.php', '', 'dashicons-cart', 15 );
		  add_menu_page( '通販受注リスト', '通販受注リスト', 'edit_posts', 'admin.php?page=usces_orderlist', '', 'dashicons-cart', 16 ); */

			add_menu_page( '予約管理', '予約管理', 'edit_posts', 'admin.php?page=booking-package%2Findex.php', '', 'dashicons-calendar-alt', 17 );

			add_menu_page( '予約設定', '予約設定', 'edit_posts', 'admin.php?page=booking-package_setting_page', '', 'dashicons-calendar-alt', 18 );

	}
}

add_action( 'admin_menu', 'remove_menus_user' );


global $current_user;
if ( $current_user->ID == 2 ) {
	function custom_columns( $columns ) {
		unset( $columns['author'] );
		unset( $columns['tags'] );
		  unset( $columns['comments'] );

		unset( $columns['details'] );   // SEO keyword

		return $columns;
	}
	add_filter( 'manage_posts_columns', 'custom_columns' );

}

add_filter(
	'contextual_help',
	function( $old_help, $id, $screen ) {
		$screen->remove_help_tabs();
		$screen->set_help_sidebar( '' );
		return false;
	},
	999,
	3
);
/**
 *
 * スタッフ用管理画面、admin_bar不要項目削除
 */


function aktk_remove_bar_menus( $wp_admin_bar ) {
	global $current_user;
	if ( $current_user->ID == 2 ) { // ユーザーIDを指定、該当ユーザーなら以下を適用
		// var_dump($wp_admin_bar);

		$wp_admin_bar->remove_menu( 'wp-logo' );
		$wp_admin_bar->remove_menu( 'new-content' );
		$wp_admin_bar->remove_menu( 'comments' );
		$wp_admin_bar->remove_menu( 'edit-profile' );
		$wp_admin_bar->remove_menu( 'user-info' );

	}

}
add_action( 'admin_bar_menu', 'aktk_remove_bar_menus', 99 );


function admin_bar_menu_hide() {
	  global $current_user;
	if ( $current_user->ID == 2 ) { // ユーザーIDを指定、該当ユーザーなら以下を適用
		global $wp_admin_bar;
		$wp_admin_bar->remove_node( 'aioseo-main' );
		$wp_admin_bar->remove_node( 'booking-package_top_bar' );
	}
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_menu_hide', 999 );


add_filter(
	'wp_editor_settings',
	function ( $settings ) {
		  global $current_user;
		if ( $current_user->ID == 2 ) {
			if ( user_can_richedit() ) {
				$settings['quicktags'] = false;
				return $settings;
			}
		}
	}
);
