<?php
/*
Template Name: 商品一覧--コンタクトの期限
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
		$show_item = '1day';
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
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>item?item_cat=<?php echo esc_html( $show_item ); ?>" class="l-breadcrumb__link">
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

							<?php if ( '1day' === $show_item ) : ?>

										<h2 class="c-ttl-under-eng item-list__ttl">
											<span class="c-ttl-under-eng__main">1day<br class="u-pc-hidden">（1日使い捨てレンズ）</span>
											<span class="c-ttl-under-eng__sub">PRODUCT LINEUP</span>
										</h2>

										<p class="item-list__intro">1日使い捨てだから衛生的、コンタクトレンズデビューにおすすめ</p>

										 <div class="item-list__box">
											  <p class="item-list__supplement">メーカーや箱数によって送料がかかることがございますので、<br class="">お取り寄せも可能です。</p>

                                              <a href="tel:03-3885-3177" class="item-list__tel" target="_blank">
												03-3885-3177
												</a>

										</div>
										<!-- ./box -->

							<?php endif; ?>

							<?php if ( '2week' === $show_item ) : ?>

										<h2 class="c-ttl-under-eng item-list__ttl">
											<span class="c-ttl-under-eng__main">2week<br class="u-pc-hidden">（2週間使い捨てレンズ）</span>
											<span class="c-ttl-under-eng__sub">PRODUCT LINEUP</span>
										</h2>

										<p class="item-list__intro">毎日コンタクトレンズを使用される方にお勧めです。</p>


										<div class="item-list__box">
											  <p class="item-list__supplement">お電話での事前注文も可能です</p>
												<a href="tel:03-3885-3177" class="item-list__tel" target="_blank">
												03-3885-3177
												</a>
										</div>
										<!-- ./box -->


							<?php endif; ?>
							</div>
</section>

<ul class="l-inner item-anchor">
	<li class="item-anchor__item is-active js-item-ajax-btn" data-slug="all">全て</li>
		<li class="item-anchor__item js-item-ajax-btn" data-slug="circle-color">サークル・カラー</li>
		<li class="item-anchor__item js-item-ajax-btn" data-slug="astigmatic-lens">乱視用レンズ</li>
		<li class="item-anchor__item js-item-ajax-btn" data-slug="bifocal-lens">遠近両用レンズ</li>
		<?php if ( '2week' === $show_item ) : ?>
			<li class="item-anchor__item js-item-ajax-btn" data-slug="photochromatic-lens">調光レンズ</li>
		<?php endif; ?>
</ul>

<div class="" id="js-item-ajax">
		 <?php get_template_part( 'inc/ajax-item-loop-list' ); ?>
</div>


<div class="item-lens-pt02">
	 <?php get_template_part( 'inc/item-lens-type' ); ?>
</div>
<!-- ./item-lens-pt02 -->



<?php
get_footer();
