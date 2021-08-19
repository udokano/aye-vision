<?php
/*
Template Name: 初めての方へ
*/
?>



<?php get_header(); ?>
<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">初めての方</span>
		<span class="l-pages-heading__sub">GUIDE</span>
	</h1>

</div>
<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide" class="l-breadcrumb__link">初めての方</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->
<div class="guide-contents">
	<ul class="guide-contents__list">
		<li class="guide-contents__ttl">目次</li>
		<li class="guide-contents__item">
			<a href="#link-01" class="guide-contents__anchor">
				ご利用の流れ
			</a>
		</li>
		<li class="guide-contents__item">
			<a href="#link-02" class="guide-contents__anchor">
				初めてでも安心保証システム
			</a>
		</li>
		<li class="guide-contents__item">
			<a href="#link-03" class="guide-contents__anchor">
				メガネ販売のご案内
			</a>
		</li>
		<li class="guide-contents__item">
			<a href="#link-04" class="guide-contents__anchor">
				当店の感染症対策について
			</a>
		</li>
	</ul>
</div>
<!-- ./guide-contents -->


<section class="rule">
	<div class="l-inner">
		<h2 class="rule__ttl">
			<span class="rule__inside">当店では、お客様が、快適に安全に<br class="u-pc-hidden">コンタクトレンズをご愛用頂く為に、<br class=""><span class="rule__pink">4つのルール</span>を守っていただくことをお願いしてます。</span>
		</h2>
		<ol class="rule-list">
			<li class="rule-list__item">
				   <p class="rule-list__num">1</p>
				<div class="rule-list__inner">
					<div class="rule-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?>  data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/illust_rule01.png' alt='イラスト' class='lazy'>
					</div>
					<p class="rule-list__desc">コンタクトレンズは高度管理医療機器です。<br class="">コンタクトレンズの購入の際は、必ず<br class="">眼科医の処方を受けてからお求めください。</p>
				</div>
				<!-- ./inner -->
			</li>
			<li class="rule-list__item">
				   <p class="rule-list__num">2</p>
				<div class="rule-list__inner">
					<div class="rule-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?>  data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/illust_rule02.png' alt='イラスト' class='lazy'>
					</div>
					<p class="rule-list__desc">決められた装用期間・時間をお守りください。</p>
				</div>
				<!-- ./inner -->
			</li>
			<li class="rule-list__item">
				   <p class="rule-list__num">3</p>
				<div class="rule-list__inner">
					<div class="rule-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?>  data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/illust_rule03.png' alt='イラスト' class='lazy'>
					</div>
					<p class="rule-list__desc">眼科医による定期検査をお受けください。</p>
				</div>
				<!-- ./inner -->
			</li>
			<li class="rule-list__item">
				   <p class="rule-list__num">4</p>
				<div class="rule-list__inner">
					<div class="rule-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?>  data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/illust_rule04.png' alt='イラスト' class='lazy'>
					</div>
					<p class="rule-list__desc">適切なレンズケアを行い、取扱説明書<br class="">ならびに、医師の指示に従ってください。</p>
				</div>
				<!-- ./inner -->
			</li>

		</ol>

		<p class="rule__note">以上の内容をお守りいただかないお客様には、<br class="u-pc-hidden">当店ではご販売できない場合があります。<br class="">ルールを守って、快適な「視」生活を送りましょう</p>
	</div>
	<!-- ./l-inner -->
</section>


<section class="guide-flow" id="link-01">
	<div class="l-inner">
			<h2 class="c-ttl-under-eng guide-flow__ttl">
											<span class="c-ttl-under-eng__main">ご利用の流れ</span>
											<span class="c-ttl-under-eng__sub">FLOW</span>
			</h2>

			<p class="guide-flow__intro">アイ・ビジョンで初めてコンタクトレンズをご購入される方は<br class="u-pc-hidden">トライアルレンズを使用して頂き、<br class="">経過観察を行ってからのご購入となります。<br class="">詳しくは下記をご確認ください。</p>

			<ol class="flow-list">
				<li class="flow-list__item flow-list__item--step01">
					<div class="flow-list__contents">
							<div class="flow-list__heading">
								<p class="flow-list__step">Step.01</p>
								<h3 class="flow-list__ttl">眼科へ受診して検査・診察を受けましょう</h3>
							</div>
							<!-- ./heading -->
							<p class="flow-list__desc">コンタクレンズのご購入には、まず眼科へ受診する必要がございます。<br class="">ご自身の「目」の状態を調べてもらいましょう。<br class="">当店は眼科と併設しておりますので、保険証を忘れずにご持参ください。<br class=""><span class="flow-list__note">※ご来店の際は必ず営業終了時間の30分前までにお越しください。</span><span class="flow-list__note">※診察料は別途ご負担となります。</span>
							</p>
					</div>
					<div class="flow-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow01.jpg' alt='' class='lazy u-sp-hidden u-object-fit'>
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow01_sp.jpg' alt='' class='lazy u-pc-hidden u-object-fit'>
					</div>
					<!-- ./thumb -->
				</li>
				<li class="flow-list__item flow-list__item--step02">
					<div class="flow-list__contents">
							<div class="flow-list__heading">
								<p class="flow-list__step">Step.02</p>
								<h3 class="flow-list__ttl">コンタクトレンズの脱着トレーニング</h3>
							</div>
							<!-- ./heading -->
							<p class="flow-list__desc">眼科での診察後、処方を元にトライアルレンズを使用してお客様に合ったレンズの選定を行います。<br class="">レンズの装用方法について専門スタッフがマンツーマンでトレーニングを行います。<br class=""></p>
					</div>
					<!-- ./contents -->
					<div class="flow-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow02.jpg' alt='' class='lazy u-sp-hidden u-object-fit'>
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow02_sp.jpg' alt='' class='lazy u-pc-hidden u-object-fit'>
					</div>
					<!-- ./thumb -->
				</li>
				<li class="flow-list__item flow-list__item--step03">
					<div class="flow-list__contents">
							<div class="flow-list__heading">
								<p class="flow-list__step">Step.03</p>
								<h3 class="flow-list__ttl">トライアルレンズを使用して経過観察</h3>
							</div>
							<!-- ./heading -->
							<p class="flow-list__desc">コンタクトレンズの調整・選択をしていきます。<br class="">2〜3回程ご来店頂き装用時の問題の有無、瞬きをした時のレンズの動きなどを入念に検査を行います。</p>
					</div>
					<!-- ./contents -->
					<div class="flow-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow03.jpg' alt='' class='lazy u-sp-hidden u-object-fit'>
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow03_sp.jpg' alt='' class='lazy u-pc-hidden u-object-fit'>
					</div>
					<!-- ./thumb -->
				</li>
				 <li class="flow-list__item flow-list__item--step04">
					<div class="flow-list__contents">
							<div class="flow-list__heading">
								<p class="flow-list__step">Step.04</p>
								<h3 class="flow-list__ttl">お客様に合ったコンタクトレンズの決定</h3>
							</div>
							<!-- ./heading -->
							<p class="flow-list__desc">経過観察後、お客様の目に適したコンタクトレンズが決まります。<br class="">コンタクトレンズの装用期間や使用期間、コンタクトのお手入れについての指導を行います。</p>
					</div>
					<!-- ./contents -->
					<div class="flow-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow04.jpg' alt='' class='lazy u-sp-hidden u-object-fit'>
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow04_sp.jpg' alt='' class='lazy u-pc-hidden u-object-fit'>
					</div>
					<!-- ./thumb -->
				</li>

				<li class="flow-list__item flow-list__item--step05">
					<div class="flow-list__contents">
							<div class="flow-list__heading">
								<p class="flow-list__step">Step.05</p>
								<h3 class="flow-list__ttl">コンタクトレンズの購入</h3>
							</div>
							<!-- ./heading -->
							<p class="flow-list__desc">コンタクトレンズ決定後、ご購入となります。<br class="">在庫が無い場合は後日、お客様の元へ直接配送いたします。<br class="">正しい使用方法を守り、快適なコンタクトレンズライフを送りましょう。<br class=""><span class="flow-list__note">※一部商品には送料が掛かります。その際に発生する送料については、お客様負担となりますので予めご了承ください。</span></p>
					</div>
					<!-- ./contents -->
					<div class="flow-list__thumb">
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow05.jpg' alt='' class='lazy u-sp-hidden u-object-fit'>
						<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_bg_flow05_sp.jpg' alt='' class='lazy u-pc-hidden u-object-fit'>
					</div>
					<!-- ./thumb -->
				</li>

			</ol>

			<h3 class="guide-card">お支払いには各種クレジット電子マネーが<br class="u-pc-hidden">ご利用いただけます。</h3>

			<ul class="pay-list">
				<li class="pay-list__item">
					<dl class="pay-list__inner">
						<dt class="pay-list__ttl">・クレジットカード</dt>
						<dd class="pay-list__data">
							<ul class="pay-kind-list">
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card01.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card02.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card03.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card04.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card05.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card06.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card07.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card08.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card09.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_card10.png' alt='VISA' class='lazy'>
								</li>
							</ul>
						</dd>
					</dl>
				</li>
				<li class="pay-list__item">
					<dl class="pay-list__inner">
						<dt class="pay-list__ttl">・電子マネー・交通系電子マネー</dt>
						<dd class="pay-list__data">
							<ul class="pay-kind-list">
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay01.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay02.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay03.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay04.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay05.png' alt='VISA' class='lazy'>
								</li>
							<!-- 	<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay06.png' alt='VISA' class='lazy'>
								</li> -->
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay07.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay08.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay09.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay10.png' alt='VISA' class='lazy'>
								</li>
                                <li class="pay-kind-list__item">
									<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/img_pay11.png' alt='VISA' class='lazy'>
								</li>
								<li class="pay-kind-list__note">
										※PiTaPaはご利用<br class="">いただけません
								</li>
							</ul>
						</dd>
					</dl>
				</li>
			</ul>
	</div>
	<!-- ./l-inner -->
</section>

<section class="guide-col" >

		<!-- 	<div class="guide-col__bg guide-col__bg--left">

			</div>

			<div class="guide-col__bg guide-col__bg--right">

			</div> -->

			<ul class="guide-col__list">
				<li class="guide-col__item guide-col__item--left system" id="link-02">
					<div class="guide-col__inner guide-col__inner--left">
						<div class="system__contents">
								<h2 class="c-ttl-under-eng system__ttl">
											<span class="c-ttl-under-eng__main  system__main">初めてでも安心、保証システム</span>
											<span class="c-ttl-under-eng__sub system__eng">GUARANTEE</span>
								</h2>

								<p class="system__intro">アイ・ビジョンではお客様に合った最適なコンタクトレンズを提供する為に、<br class="">初めての方でも安心してコンタクトデビューできるよう<br class="">独自の保証システムがございます。</p>

								<dl class="system__list">
									<dt class="system__name">調整交換</dt>
									<dd class="system__data">購入日より３ヶ月間、度数・カーブ・サイズ等の変更調整を行います。<br class="">アイ・ビジョンでは一般のソフト・ハードレンズを３ヶ月間かけてお客様の眼に合わせて行きます。<br class="">
										<ul class="system__note-list">
											<li class="system__note-item">※使い捨てレンズは除きます。</li>

										</ul>
										</dd>
								</dl>
								<dl class="system__list">
									<dt class="system__name">保証交換</dt>
									<dd class="system__data">購入日より1年間、汚れ・傷等がついた場合、破損レンズ3分の2以上ご持参の上、同データの新しいレンズにお取り替えいたします。
										<ul class="system__note-list">
											<li class="system__note-item">※紛失による保証はございません。 </li>
											<li class="system__note-item">※片眼1回限り</li>
											<li class="system__note-item">※使い捨てレンズは除きます。</li>
										</ul>
									</dd>
								</dl>
						</div>
						<!-- ./contents -->
					</div>
					<!-- ./inner -->
				</li>
				<li class="guide-col__item guide-col__item--right glasses" id="link-03">
					<div class="guide-col__inner guide-col__inner--right glasses__inner">
						<div class="glasses__contents">
									<h2 class="c-ttl-under-eng glasses__ttl">
											<span class="c-ttl-under-eng__main  glasses__main">メガネ販売のご案内</span>
											<span class="c-ttl-under-eng__sub glasses__eng">SERVICE</span>
								</h2>
								<p class="glasses__intro u-mb0">万が一の保険としてメガネのご用意をアイ・ビジョンでは推奨しております。<br class="">度の合ったメガネを新調したいけど…なかなか店舗まで足を運べないそんなお客様へのサービスとして、土曜日の午後限定で併設の眼科にてメガネの販売を行っております。<br class="">詳しくはスタッフまでお気軽にお問い合わせください。</p>
								<p class="glasses__note">※ご自宅への訪問は行っておりません。</p>
						</div>
						<!-- ./top -->

						<div class="glasses__thumb">
							<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/guide/thumb_glasses.jpg' alt='出張・訪問メガネ販売のご案内' class='lazy u-object-fit'>
						</div>
					</div>
					<!-- ./inner -->
				</li>
			</ul>

</section>

<section class="guarantee" id="link-04">
	<div class="l-inner">
		<h2 class="c-ttl-under-eng guarantee__ttl">
											<span class="c-ttl-under-eng__main guarantee__main">アイ・ビジョンでの<br class="u-pc-hidden">感染防止対策について</span>
											<span class="c-ttl-under-eng__sub guarantee__eng">GUARANTEE</span>
		</h2>

		<p class="guarantee__intro">当店ではコロナウィルス感染防止の安全対策としてお客様には<br class="">下記のご協力をお願いしております</p>

		<ul class="guarantee-list">
			<li class="guarantee-list__item">
				<svg class="guarantee-list__icon"><use xlink:href="#svg-icon-guide01"></use></svg>
				<dl class="guarantee-list__dl">
					<dt class="guarantee-list__dt">体温チェック</dt>
					<dd class="guarantee-list__dd">ご来店時に、検温機で体温測定をお願いしております。</dd>
				</dl>
			</li>
			<li class="guarantee-list__item">
				<svg class="guarantee-list__icon"><use xlink:href="#svg-icon-guide02"></use></svg>
				<dl class="guarantee-list__dl">
					<dt class="guarantee-list__dt">アルコール消毒液の設置</dt>
					<dd class="guarantee-list__dd">ご来店時に、検温機で体温測定をお願いしております。</dd>
				</dl>
			</li>
			<li class="guarantee-list__item">
				<svg class="guarantee-list__icon"><use xlink:href="#svg-icon-guide03"></use></svg>
				<dl class="guarantee-list__dl">
					<dt class="guarantee-list__dt">マスクの着用</dt>
					<dd class="guarantee-list__dd">飛沫感染防止、感染予防の為、必ずマスクを着用してご来店ください。</dd>
				</dl>
			</li>
			<li class="guarantee-list__item">
				<svg class="guarantee-list__icon"><use xlink:href="#svg-icon-guide04"></use></svg>
				<dl class="guarantee-list__dl">
					<dt class="guarantee-list__dt">入店者制限</dt>
					<dd class="guarantee-list__dd">混雑時は密を避けるため、お外、またはお車等でお待ち頂く場合がございます。</dd>
				</dl>
			</li>
		</ul>

	</div>
</section>

<?php
get_footer();?>
