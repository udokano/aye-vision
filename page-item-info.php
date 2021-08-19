<?php
/*
Template Name: 商品情報
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

<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>item-info" class="l-breadcrumb__link">商品情報</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->

<!-- <img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_shop01.jpg' alt='写真' class='lazy'>
 -->

 <?php get_template_part( 'inc/item-lens-type' ); ?>

    <?php get_template_part( 'inc/item-lens-maker' ); ?>
<?php
get_footer();
