<?php
/*
Template Name: WEB限定クーポン
*/
?>

<?php get_header(); ?>
<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">WEB限定クーポン</span>
		<span class="l-pages-heading__sub">COUPON</span>
	</h1>

</div>
<!-- ./pages-heading -->



<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>web-coupon" class="l-breadcrumb__link">WEB限定クーポン</a>
		</li>

	</ul>
</div>
<!-- ./l-breadcrumb -->

<!-- <img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_shop01.jpg' alt='写真' class='lazy'>
 -->



 <section class="web-coupon" id="">

							<div class="web-coupon__inner">

                                    <h2 class="web-coupon__ttl">WEB限定クーポン配布中!!</h2>

                                    <div class="web-coupon__thumb">
                                        <img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/coupon/coupon.png' alt='' class='lazy'>
                                    </div>

                                    <p class="web-coupon__desc">印刷してお持ちいただくか、<br class="u-pc-hidden">スマホ画面をご提示ください。</p>

                                      <p class="web-coupon__n-list">※クーポン1枚につき1度のみ、他キャンペーンとの併用不可</p>

                                    <a href="javascript:void(0)" onclick="window.print();return false;" class="c-btn web-coupon__btn">このページを印刷</a>



							</div>
</section>



<?php
get_footer();
