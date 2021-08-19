<?php
/*
Template Name: 店舗情報
*/
?>

<?php get_header(); ?>
<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">店舗案内</span>
		<span class="l-pages-heading__sub">STORE GUIDE</span>
	</h1>

</div>
<!-- ./pages-heading -->
<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-list" class="l-breadcrumb__link">店舗案内</a>
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
				<dt class="store-info__dt">店舗名</dt>
				<dd class="store-info__dd">コンタクトレンズ専門店 アイ・ビジョン</dd>
			</dl>
			<dl class="store-info__dl">
				<dt class="store-info__dt">所在地</dt>
				<dd class="store-info__dd">足立区花畑1-7-19  横山眼科ビル2F   ※2階が入口です。駐車場側の外階段からお上がり下さい。</dd>
			</dl>
			 <dl class="store-info__dl">
				<dt class="store-info__dt">電話番号</dt>
				<dd class="store-info__dd"><a href="tel:03-3885-3177" class="store-info__tel">03-3885-3177</a></dd>
			</dl>
			  <dl class="store-info__dl">
				<dt class="store-info__dt">駐車場</dt>
				<dd class="store-info__dd">20台</dd>
			</dl>
			<dl class="store-info__dl store-info__dl--table">
				<dt class="store-info__dt">受付時間</dt>
				<dd class="store-info__dd">
					<div class="store-info__table">
						 <?php get_template_part( 'inc/table-info01-access' ); ?>
					</div>
					 <div class="store-info__table u-mb0">
						 <?php get_template_part( 'inc/table-info02-access' ); ?>
					</div>
					<p class="store-info__note">定休日／水曜日・祝日・夏期休業・年末年始 その他あり</p>
				</dd>
			</dl>
	</div>
	<!-- ./info -->
</div>
<!-- ./store -->

<?php if ( wp_is_mobile() ) : ?>
		<section class="shop-time-sp">
			<div class="l-inner">
				<h2 class="shop-time-sp__ttl">受付時間</h2>
				<div class="shop-time-sp__table">
					 <?php get_template_part( 'inc/table-info01-access' ); ?>
				</div>
				<!-- ./table -->
				<div class="shop-time-sp__table">
					 <?php get_template_part( 'inc/table-info02-access' ); ?>
				</div>
				<!-- ./table -->
		</section>
<?php endif; ?>

<section class="access">
	<div class="l-inner">
			<h2 class="c-ttl-under-eng access__ttl">
											<span class="c-ttl-under-eng__main  access__main">アクセス情報</span>
											<span class="c-ttl-under-eng__sub access__eng">ACCESS</span>
								</h2>

								<ul class="access-col">
									<li class="access-col__item u-radius-40">
										<i class="access-col__icon">
											<img <?php echo esc_attr( DUMMY ); ?>  data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/icon_train.png' alt='あいこん' class='lazy'>
										</i>

										<h3 class="access-col__ttl">公共交通機関でお越しの方</h3>
										<dl class="access-col__list">
											<dt class="access-col__dt">竹の塚駅東口より東武バス</dt>
											<dd class="access-col__dd">・綾24　六町駅・車検場経由（綾瀬駅行）第五都営住宅下車 すぐ前</dd>
										</dl>
										<dl class="access-col__list">
											<dt class="access-col__dt">六町駅より東武バス</dt>
											<dd class="access-col__dd">・綾24　六町駅・車検場経由（竹の塚駅東口行）第五都営住宅下車 すぐ前</dd>
										</dl>
										 <dl class="access-col__list">
											<dt class="access-col__dt">綾瀬駅より東武バス</dt>
											<dd class="access-col__dd">・綾24　六町駅・車検場経由（竹の塚駅東口行）第五都営住宅下車 すぐ前</dd>
											<dd class="access-col__dd">・綾40 （花畑団地行）花畑一丁目下車　徒歩2分</dd>
										</dl>
									</li>
									<li class="access-col__item u-radius-40">
										<i class="access-col__icon">
											<img <?php echo esc_attr( DUMMY ); ?>  data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/icon_car.png' alt='あいこん' class='lazy'>
										</i>

										<h3 class="access-col__ttl">お車・バイク・自転車でお越しの方</h3>
										<div class="access-col__list-row">
											<dl class="access-col__list">
												<dt class="access-col__dt">駐車場</dt>
												<dd class="access-col__dd">・20台</dd>
											</dl>
											<dl class="access-col__list">
												<dt class="access-col__dt">駐輪場</dt>
												<dd class="access-col__dd">・20台有り</dd>
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

								<a href="https://goo.gl/maps/3JNSe3T6DxtQaKoC6" class="c-btn access-btn" target="_blank">GoogleMapを開く</a>
	</div>
	<!-- ./inner -->
</section>

<section class="equipment">
			<div class="l-inner">
							<h2 class="c-ttl-under-eng equipment__ttl">
											<span class="c-ttl-under-eng__main  equipment__main">設備案内</span>
											<span class="c-ttl-under-eng__sub equipment__eng">EQUIPMENTS</span>
								</h2>

								<ul class="equipment-list">
									<li class="equipment-list__item u-radius-30">
										<div class="equipment-list__thumb">
											<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_eq01.png' alt='' class='lazy'>
										</div>
										<!-- ./thumb -->
										<div class="equipment-list__contents">
												<p class="equipment-list__sub">無散瞳眼底カメラ</p>
												<h3 class="equipment-list__ttl">nonmyd 8</h3>
												<p class="equipment-list__desc">赤外光により眼底観察を行い、眼底の撮影を行う機器です。</p>
										</div>
										<!-- ./contents -->
									</li>
									<li class="equipment-list__item u-radius-30">
										<div class="equipment-list__thumb">
											<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_eq02.png' alt='' class='lazy'>
										</div>
										<!-- ./thumb -->
										<div class="equipment-list__contents">
												<p class="equipment-list__sub">オートレフケラト/トノ/パキメータ</p>
												<h3 class="equipment-list__ttl">TONOREF® III</h3>
												<p class="equipment-list__desc">屈折度測定、角膜曲率半径計測、眼圧測定、角膜厚測定、調節力測定などの多彩な機能が１つの機器で可能となりました。</p>
										</div>
										<!-- ./contents -->
									</li>
									<li class="equipment-list__item u-radius-30">
										<div class="equipment-list__thumb">
											<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_eq03.png' alt='' class='lazy'>
										</div>
										<!-- ./thumb -->
										<div class="equipment-list__contents">
												<p class="equipment-list__sub">光学式生体計測装置</p>
												<h3 class="equipment-list__ttl">OA-2000（TOMEY）</h3>
												<p class="equipment-list__desc">白内障の手術に必要となる、眼軸長(眼の長さ)・角膜の丸み・前房深度・水晶体の厚みなど目に触れることなく一度に測定可能な機器です。</p>
										</div>
										<!-- ./contents -->
									</li>
									 <li class="equipment-list__item u-radius-30">
										<div class="equipment-list__thumb">
											<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_eq04.png' alt='' class='lazy'>
										</div>
										<!-- ./thumb -->
										<div class="equipment-list__contents">
												<p class="equipment-list__sub">両眼視簡易検査器</p>
												<h3 class="equipment-list__ttl">D-5000 AUTO</h3>
												<p class="equipment-list__desc">スマートフォンの操作や、読書などで近くの物を見る事に順応してしまった目をワックの内部で表示される風景を眺めて頂き、目の緊張を緩める機器です。</p>
										</div>
										<!-- ./contents -->
									</li>
									 <li class="equipment-list__item u-radius-30">
										<div class="equipment-list__thumb">
											<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_eq05.png' alt='' class='lazy'>
										</div>
										<!-- ./thumb -->
										<div class="equipment-list__contents">
												<p class="equipment-list__sub">スペースセイビングチャート</p>
												<h3 class="equipment-list__ttl">SSC-330（NIDEK）</h3>
												<p class="equipment-list__desc">1メートルの距離で５メートル相当の検査ができる視力表です。他人に視力を知れらる事なく検査が行える特徴もございます。</p>
										</div>
										<!-- ./contents -->
									</li>
								</ul>
								<p class="equipment-note">※提携している眼科にてご利用いただく検査機器も含みます。</p>
			</div>
			<!-- ./l-inner -->
</section>
<?php
get_footer();
