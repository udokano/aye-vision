<?php


require_once dirname( __FILE__ ) . '../../../../../wp-load.php';


/**
 * 定数定義
 * ダミー画像のパスとHTMLを定義
 */
define( 'PATH', esc_url( get_template_directory_uri() ) . '/dist/images/common/c_dummy_thumb.jpg' );
define( 'DUMMY', 'src=' . PATH . '' );


/**
 * レンズのカテゴリー(GET)取得
 * 最初の記事一覧を取得するために必要
 */


/* 1day,2week用 */

if ( is_page( 'item' ) ) {
	if ( isset( $_GET['item_cat'] ) && ! empty( $_GET['item_cat'] ) ) {
		$item_cat  = wp_unslash( $_GET['item_cat'] );
		$show_item = $item_cat;
	} else {
		$show_item = '1day';
	}
}

/* サークルカラー、乱視用レンズ、調光レンズ、遠近両用レンズ用 */

if ( is_page( 'item-type' ) ) {
	if ( isset( $_GET['item_cat'] ) && ! empty( $_GET['item_cat'] ) ) {
		$item_cat  = wp_unslash( $_GET['item_cat'] );
		$show_item = $item_cat;
	} else {
		$show_item = 'circle-color';
	}
}

/* それ以外 */

if ( is_page( 'item-normal' ) ) {
	if ( isset( $_GET['item_cat'] ) && ! empty( $_GET['item_cat'] ) ) {
		$item_cat  = wp_unslash( $_GET['item_cat'] );
		$show_item = $item_cat;
	} else {
		$show_item = 'hard-lens';
	}
}


/**
 *
 * Ajaxで記事を切り替えるときに必要な値(POST)
 */

if ( isset( $_POST['item_cat'] ) && ! empty( $_POST['item_cat'] ) ) {
	   $item_cat   = wp_unslash( $_POST['item_cat'] );
		$show_item = $item_cat;
} else {
		// $show_item = '1day';
		// echo $show_item;
}



/**
 * タブのカテゴリー(Ajax POST)を取得
 */


if ( isset( $_POST['current_cat'] ) ) {
		$item_category = wp_unslash( $_POST['current_cat'] );
	if ( 'all' === $item_category ) {
			$item_category = 'item';
	}
} else {
		$item_category = 'item';
}

?>


 <?php
										$args      = array(
											'post_type'   => 'post',
											'posts_per_page' => -1,
											'category_name' => "${show_item} + ${item_category}",
											'meta_key'    => 'item_order', // 並び替えに利用したいカスタムフィールドのキーを指定します。
											'orderby'     => 'meta_value_num', // カスタムフィールドの値で並び替えるという宣言です。
											'post_status' => 'publish',
											'order'       => 'ASC',
										);
										$the_query = new WP_Query( $args );

										// var_dump( $args );
										?>

							<?php if ( $the_query->have_posts() ) : ?>
										<ul class="l-inner product" >
								<?php
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
									?>

 <?php get_template_part( 'inc/item-list' ); ?>


											<?php
							endwhile;
								wp_reset_postdata();
								?>
							</ul>

								<?php else : ?>
											<p class="p-top-items__no-item">商品準備中</p>
								<?php endif; ?>
