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

								<li class="p-item product__item" data-url="<?php the_permalink(); ?>">




										<?php

											$item_fec = get_field( 'item_fec' );

											$item_sub = get_field( 'item_sub_desc' );

											$item_desc = get_field( 'item_desc' );

											$item_brand = get_field( 'item_brand' );

											$item_zaiko = get_field( 'item_zaiko' );

											// var_dump( $item_zaiko );

										?>

										<?php if ( ! empty( $item_brand ) ) : ?>

											<div class="p-item__brand">


											<?php if ( 'seed' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_seed.png' alt='シード' class=''>

											<?php elseif ( 'ire' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_aire.png' alt='アイレ' class=''>

												<?php elseif ( 'alcon' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_alcon.png' alt='alcon' class=''>

												<?php elseif ( 'cooper-vision' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_coper.png' alt='アイレ' class=''>

												<?php elseif ( 'johnson' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_johnson.png' alt='アイレ' class=''>

												 <?php elseif ( 'bausch' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_bausch.png' alt='bausch' class=''>

												 <?php elseif ( 'menicon' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_mennicon.png' alt='menicon' class=''>

												<?php elseif ( 'tore' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_toray.svg' alt='tore' class=''>

												 <?php elseif ( 'other' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_other.png' alt='other' class=''>

											<?php endif; ?>

											  </div>
										<?php endif; ?>


											<div class="p-item__thumb">
													<?php if ( ! empty( $item_zaiko ) ) : ?>
														<?php if ( $item_zaiko || in_array( 'none', $item_zaiko ) ) : ?>
															<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_no_zaiko.svg" alt="在庫なし" class="p-item__balloon">
														<?php endif; ?>
													 <?php endif; ?>

													 <?php


														if ( usces_the_itemImageURL( 0, 'return' ) ) {
															echo usces_the_itemImage( 0, 800, 800 );
														} else {
															echo '<img src="' . esc_url( get_template_directory_uri() ) . '/dist/images/item/dummy.thumb.jpg" alt="在庫なし" class="no">';
														}
														?>

																							</div>
											<!-- ./thumb -->

										<?php if ( ! empty( $item_fec ) ) : ?>
										<ul class="p-item__fec">

											<?php if ( in_array( 'fac01', $item_fec ) ) : ?>

														<li class="p-item__f-item"
															><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_feature01.jpg" alt="UVカット">
														</li>
											<?php endif; ?>
											<?php if ( in_array( 'fac02', $item_fec ) ) : ?>
															<li class="p-item__f-item"
															><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_feature02.jpg" alt="うるおい">
														</li>
											<?php endif; ?>

											<?php if ( in_array( 'fac03', $item_fec ) ) : ?>
															<li class="p-item__f-item"
															><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_feature03.jpg" alt="汚れにくい">
														</li>
											<?php endif; ?>
											<?php if ( in_array( 'fac04', $item_fec ) ) : ?>
															<li class="p-item__f-item"
															><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_feature04.jpg" alt="汚れにくい">
														</li>
											<?php endif; ?>
										</ul>
										<?php endif; ?>
											<h3 class="p-item__name"><?php echo wp_kses_post( usces_the_itemName( 'return' ) ); ?></h3>
											<?php if ( $item_sub ) : ?>
														<p class="p-item__t-sub"><?php the_field( 'item_sub_desc' ); ?></p>
											<?php endif; ?>
											<?php if ( $item_desc ) : ?>
														<p class="p-item__desc"><?php the_field( 'item_desc' ); ?></p>
											<?php endif; ?>
											<p class="p-item__col">
												<span class="p-item__box">
												<?php if ( in_category( 'soft-lens' ) || in_category( 'hard-lens' ) ) : ?>
													1枚
													<?php else : ?>
													1箱
													<?php endif; ?>
												</span>
												<span class="p-item__price">
													<?php usces_the_firstPrice(); ?><em class="p-item__tax">円<?php usces_guid_tax(); ?></em>
												</span>

											</p>


											<ul class="p-item__btn-col">
												<li class="p-item__btn-list">
													<a href="<?php the_permalink(); ?>" class="p-item__btn p-item__btn--ec c-btn">
															通販で購入
													</a>

												</li>
												<li class="p-item__btn-list">
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3&item=<?php echo wp_strip_all_tags( usces_the_itemName( 'return' ) ); ?>" class="p-item__btn p-item__btn--reserve c-btn">
																来店予約して購入
														</a>
													</li>
											</ul>


								</li>


											<?php
							endwhile;
								wp_reset_postdata();
								?>
							</ul>

								<?php else : ?>
											<p class="p-top-items__no-item">商品準備中</p>
								<?php endif; ?>
