<?php
/*
Template Name: 商品一覧--単一
*/
?>

<?php get_header(); ?>
<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">商品情報</span>
		<span class="l-pages-heading__sub">PRODUCT</span>
	</h1>

</div>
<!-- ./pages-heading -->


<?php

/**
 * パラメーターによって表示する商品を変える
 */

if ( isset( $_GET['item_cat'] ) && ! empty( $_GET['item_cat'] ) ) {
		$item_cat      = wp_unslash( $_GET['item_cat'] );
			$show_item = $item_cat;
} else {
		$show_item = 'hard-lens';
}


$now_cat_obj = get_category_by_slug( $show_item );

$now_cat_name = $now_cat_obj->name;

/* echo $show_item; */


?>

<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>item" class="l-breadcrumb__link">商品情報</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>item-normal?item_cat=<?php echo esc_html( $show_item ); ?>" class="l-breadcrumb__link">
				<?php echo esc_html( wp_strip_all_tags( $now_cat_name ) ); ?>
			</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->

<!-- <img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_shop01.jpg' alt='写真' class='lazy'>
 -->



 <section class="item-list" id="">

							<div class="l-inner">

										<h2 class="c-ttl-under-eng item-list__ttl">
											<span class="c-ttl-under-eng__main"><?php echo esc_html( wp_strip_all_tags( $now_cat_name ) ); ?></span>
											<span class="c-ttl-under-eng__sub">PRODUCT LINEUP</span>
										</h2>

										<!-- <p class="item-list__intro">1日使い捨てだから衛生的、コンタクトレンズデビューにおすすめ</p> -->

							</div>
</section>


<div class="" id="js-item-ajax">
         <?php get_template_part( 'inc/ajax-item-loop-list' ); ?>
</div>





<div class="item-lens-pt02">
	 <?php get_template_part( 'inc/item-lens-type' ); ?>
</div>
<!-- ./item-lens-pt02 -->



<?php
get_footer();
