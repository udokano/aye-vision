<?php
/*
Template Name: 店舗情報--中国版
*/
?>

<?php get_header('lang'); ?>

<?php if ( is_page( 'shop-info-ch' ) ) : ?>

<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">商店指南</span>
		<span class="l-pages-heading__sub">STORE GUIDE</span>
	</h1>

</div>
<!-- ./pages-heading -->
<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">TOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-list" class="l-breadcrumb__link">商店指南</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->

<div class="store l-inner">

	<ul class="store-photo">
		<li class="store-photo__main">
			<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_shop01.jpg' alt='写真' class='lazy u-object-fit'>
		</li>
		<li class="store-photo__sub">
				<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_shop02.jpg' alt='写真' class='lazy u-object-fit'>
		</li>
		 <li class="store-photo__sub">
				<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_shop03.jpg' alt='写真' class='lazy u-object-fit'>
		</li>
	</ul>
	<div class="store-info">
			<dl class="store-info__dl">
				<dt class="store-info__dt">商店名称</dt>
				<dd class="store-info__dd">隐形眼镜专卖店 Eye・Vision</dd>
			</dl>
			<dl class="store-info__dl">
				<dt class="store-info__dt">地点</dt>
				<dd class="store-info__dd">东京都足立区花畑1-7-19 横山眼科大楼2楼 *入口在二楼。请从停车场一侧的楼梯上去。</dd>
			</dl>
			 <dl class="store-info__dl">
				<dt class="store-info__dt">电话</dt>
				<dd class="store-info__dd"><a href="tel:03-3885-3177" class="store-info__tel">03-3885-3177</a></dd>
			</dl>
			  <dl class="store-info__dl">
				<dt class="store-info__dt">停车</dt>
				<dd class="store-info__dd">20辆</dd>
			</dl>
			<dl class="store-info__dl store-info__dl--table">
				<dt class="store-info__dt">支付时间</dt>
				<dd class="store-info__dd">
					<div class="store-info__table">
						 <?php get_template_part( 'inc/table-info01-access-ch' ); ?>
					</div>
					 <div class="store-info__table u-mb0">
						 <?php get_template_part( 'inc/table-info02-access-ch' ); ?>
					</div>
					<p class="store-info__note">周三、国定假日、暑假、年终和新年假期等休息。</p>
				</dd>
			</dl>
	</div>
	<!-- ./info -->
</div>
<!-- ./store -->

<?php if ( wp_is_mobile() ) : ?>
		<section class="shop-time-sp">
			<div class="l-inner">
				<h2 class="shop-time-sp__ttl">支付时间</h2>
				<div class="shop-time-sp__table">
					 <?php get_template_part( 'inc/table-info01-access-ch' ); ?>
				</div>
				<!-- ./table -->
				<div class="shop-time-sp__table">
					 <?php get_template_part( 'inc/table-info02-access-ch' ); ?>
				</div>
				<!-- ./table -->
		</section>
<?php endif; ?>

<section class="access">
	<div class="l-inner">
			<h2 class="c-ttl-under-eng access__ttl">
											<span class="c-ttl-under-eng__main  access__main">访问信息</span>
											<!-- <span class="c-ttl-under-eng__sub access__eng">ACCESS</span> -->
								</h2>

								<ul class="access-col">
									<li class="access-col__item u-radius-40">
										<i class="access-col__icon">
											<img <?php echo esc_attr( DUMMY ); ?>  data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/icon_train.png' alt='あいこん' class='lazy'>
										</i>

										<h3 class="access-col__ttl">乘坐公共交通工具前来的人</h3>
										<dl class="access-col__list">
											<dt class="access-col__dt">从竹子冢站的东面出口乘坐东武巴士。</dt>
											<dd class="access-col__dd">Aya24: 乘坐经六町站和Shakenjo的巴士（开往绫濑站），在第5个Toei Jutaku巴士站下车。</dd>
										</dl>
										<dl class="access-col__list">
											<dt class="access-col__dt">东武巴士从武町站出发</dt>
											<dd class="access-col__dd">Aya24 Rokucho站，经Shakuba(为Takenotsuka站东口)，在Dai 5 Toei Jutaku(第五东井塾)下车。</dd>
										</dl>
										 <dl class="access-col__list">
											<dt class="access-col__dt">绫濑站的东武巴士</dt>
											<dd class="access-col__dd">Aya24 Rokucho站，经Shakuba(为Takenotsuka站东口)，在Dai 5 Toei Jutaku(第五东井塾)下车。</dd>
											<dd class="access-col__dd">Aya 40（开往花畑团地），花畑1丁目站，步行2分钟</dd>
										</dl>
									</li>
									<li class="access-col__item u-radius-40">
										<i class="access-col__icon">
											<img <?php echo esc_attr( DUMMY ); ?>  data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/icon_car.png' alt='あいこん' class='lazy'>
										</i>

										<h3 class="access-col__ttl">乘坐汽车、摩托车或自行车</h3>
										<div class="access-col__list-row">
											<dl class="access-col__list">
												<dt class="access-col__dt">停车</dt>
												<dd class="access-col__dd">20辆</dd>
											</dl>
											<dl class="access-col__list">
												<dt class="access-col__dt">停车</dt>
												<dd class="access-col__dd">20辆车</dd>
											</dl>
										</div>
										<!-- ./row -->
										<ul class="access-col__ul">
											<li class="access-col__li">
												<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_access01.jpg' alt='' class='lazy'>
											</li>
											<li class="access-col__li">
												<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_access02.jpg' alt='' class='lazy'>
											</li>
										</ul>
									</li>
								</ul>

								<div class="access-gmap">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3236.0621113739317!2d139.80896881526212!3d35.798408480167176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601891a53b293287%3A0xe14055e90c500ff8!2z44Ki44Kk44O744OT44K444On44Oz!5e0!3m2!1sja!2sjp!4v1627446417159!5m2!1sja!2sjp"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
								</div>

								<a href="https://goo.gl/maps/3JNSe3T6DxtQaKoC6" class="c-btn access-btn" target="_blank">GoogleMap开放</a>
	</div>
	<!-- ./inner -->
</section>
<?php endif; ?>

<?php
get_footer('lang');
