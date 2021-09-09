<?php get_header(); ?>




<!-- スライドショー -->



<?php

 $post_ID = 30;

?>

<?php if ( have_rows( 'rp_fv_slide', $post_ID ) ) : ?>
<div class="l-key-visual" id="app-top-slide" v-cloak>
	<ul class="l-key-visual__slide">
  <slick ref="slick" :options="slickOptions">
	  <?php
		while ( have_rows( 'rp_fv_slide', $post_ID ) ) :
			the_row();
			?>
			<?php
			 $link   = get_sub_field( 'rp_fv_slide_link', $post_ID );
			 $img    = get_sub_field( 'rp_fv_slide_img', $post_ID );
			 $img_sp = get_sub_field( 'rp_fv_slide_img_sp', $post_ID );

			?>
			<li class="l-key-visual__bnr">
				<a href="<?php echo esc_url( $link['url'] ); ?>" class="l-key-visual__link" target="<?php echo esc_attr( $link['target'] ); ?>">

					<?php if ( wp_is_mobile() ) : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/slide_dummy_sp.jpg"  data-src="<?php echo esc_url( $img_sp['url'] ); ?>" alt="<<?php echo esc_attr( $img_sp['alt'] ); ?>" class="u-radius-40 lazy">
					<?php else : ?>
							 <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/slide_dummy.jpg" data-src="<?php echo esc_url( $img['url'] ); ?>" alt="<<?php echo esc_attr( $img['alt'] ); ?>" class="u-radius-40 lazy">
					<?php endif; ?>

				</a>
			</li>
	  <?php endwhile; ?>

	   </slick>
	   </ul>

  </div>
<?php endif; ?>

<section class="sec-guide p-sec">
	<div class="l-inner sec-guide__inner p-sec__inner">
		<div class="p-sec-col02 sec-guide__col">
				<h2 class="c-ttl-vertical p-sec-col02__heading  sec-guide__ttl">
					 <span class="c-ttl-vertical__eng  sec-guide__eng">GUIDE</span>
					<span class="c-ttl-vertical__main">初めての方</span>
				</h2>
				<div class="p-sec-col02__contents">
						<ul class="guide-list">
								<li class="guide-list__item">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide#link-01" class="guide-list__link">
										<div class="guide-list__thumb ">
											<img <?php echo esc_attr( DUMMY ); ?> data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/thumb_new-users01.jpg" alt="ご利用の流れとご注意点" class="u-radius-30 lazy">
										</div>
										<!-- ./thumb -->
										<h3 class="guide-list__ttl">ご利用の流れと<br class="u-sp-hidden">ご注意点</h3>

										<svg class="u-pc-hidden guide-list__icon"><use xlink:href="#svg-icon-circle-arw"></use></svg>
									</a>
								</li>
								<li class="guide-list__item">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide#link-04" class="guide-list__link">
										<div class="guide-list__thumb ">
											<img <?php echo esc_attr( DUMMY ); ?> data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/thumb_new-users02.jpg" alt="当店の感染症対策について" class="u-radius-30 lazy">
										</div>
										<!-- ./thumb -->
										<h3 class="guide-list__ttl">当店の感染症対策<br class="u-sp-hidden">について</h3>

										<svg class="u-pc-hidden guide-list__icon"><use xlink:href="#svg-icon-circle-arw"></use></svg>
									</a>
								</li>
								<li class="guide-list__item">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide#link-02" class="guide-list__link">
										<div class="guide-list__thumb ">
											<img <?php echo esc_attr( DUMMY ); ?> data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/thumb_new-users03.jpg" alt="ご利用の流れとご注意点" class="u-radius-30 lazy">
										</div>
										<!-- ./thumb -->
										<h3 class="guide-list__ttl">初めてでも<br class="u-sp-hidden">安心保証システム</h3>

										<svg class="u-pc-hidden guide-list__icon"><use xlink:href="#svg-icon-circle-arw"></use></svg>
									</a>
								</li>
								<li class="guide-list__item">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide#link-03" class="guide-list__link">
										<div class="guide-list__thumb ">
											<img <?php echo esc_attr( DUMMY ); ?> data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/thumb_new-users04.jpg" alt="ご利用の流れとご注意点" class="u-radius-30 lazy">
										</div>
										<!-- ./thumb -->
										<h3 class="guide-list__ttl">メガネ販売<br class="u-sp-hidden">のご案内</h3>

										<svg class="u-pc-hidden guide-list__icon"><use xlink:href="#svg-icon-circle-arw"></use></svg>
									</a>
								</li>
						</ul>
				</div>
				<!-- ./contents -->
		</div>
		<!-- ./col02 -->

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide" class="c-btn p-sec__btn sec-guide__btn">もっと見る</a>
	</div>
	<!-- ./inner -->
</section>

<section class="sec-news p-sec">
	<div class="l-inner sec-news__inner p-sec__inner">
		<div class="p-sec-col02 sec-news__col">
				<h2 class="c-ttl-vertical p-sec-col02__heading  sec-news__ttl">
					 <span class="c-ttl-vertical__eng  sec-news__eng">NEWS</span>
					<span class="c-ttl-vertical__main">お知らせ</span>
				</h2>
				<div class="p-sec-col02__contents">
							<ul class="p-news">
									 <?php
										$args      = array(
											'post_type'   => 'news',
											'posts_per_page' => 5,
											'orderby'     => 'menu_order',
											'post_status' => 'publish',
											'order'       => 'ASC',
										);
										$the_query = new WP_Query( $args );
										?>

							<?php if ( $the_query->have_posts() ) : ?>

								<?php
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
									?>

								<li class="p-news__item">
									<a href="<?php the_permalink(); ?>" class="p-news__link">
										<div class="p-news__thumb">
												 <?php get_template_part( 'inc/thumbnail' ); ?>
										</div>
										<div class="p-news__contents">
											<p class="p-news__top">
												<span class="p-news__time">
													<time datetime="<?php echo get_the_date( 'Y年Md日' ); ?>"><?php echo get_the_date( 'Y年Md日' ); ?></time>
												</span>
												<?php
														$news_taxonomys = get_the_terms( $post->ID, 'tax_news_kind' );
												?>

												<?php if ( $news_taxonomys[0] ) : ?>
														<span class="p-news__tax"><?php echo esc_html( $news_taxonomys[0]->name ); ?></span>
												<?php endif; ?>
											</p>
											<h3 class="p-news__ttl"><?php the_title(); ?></h3>
											<p class="p-news__desc"><?php echo get_the_excerpt(); ?></p>
										</div>
									</a>
								</li>


											<?php
							endwhile;
								wp_reset_postdata();
								?>


								<?php else : ?>

								<?php endif; ?>

							</ul>
				</div>
				<!-- ./contents -->
		</div>
		<!-- ./col02 -->

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="c-btn p-sec__btn sec-news__btn">もっと見る</a>
	</div>
	<!-- ./inner -->
</section>

<section class="sec-items p-sec p-sec--mb0">
	<div class="l-inner sec-items__inner p-sec__inner">
		<div class="p-sec-col02 p-sec-col02--wrap sec-items__col">
				<h2 class="c-ttl-vertical p-sec-col02__heading  sec-items__ttl">
					 <span class="c-ttl-vertical__eng  sec-items__eng">NEWS</span>
					<span class="c-ttl-vertical__main">商品情報</span>
				</h2>

				<div class="p-sec-col02__left-top item-search">
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post" class="item-search__form">
						<div class="item-search__left">
									<svg class="item-search__icon"><use xlink:href="#svg-icon-search"></use></svg>
									<input type="text" name="s" placeholder="商品名など検索キーワードを入力" class="item-search__input">
						</div>
						<!-- ./left -->

						<button type="submit" class="item-search__submit">検索</button>
					</form>
				</div>
				<!-- ./search -->
				<div class="p-sec-col02__contents p-sec-col02__contents--right-fit">

								<ul class="p-item-kind">
									<?php
									$x              = 1;
									$num            = 4;
									$cat_info       = get_category_by_slug( 'lens-type' );
									$cat_item_id    = $cat_info->term_id;
									$arg            = array(
										'type'       => 'post',
										'orderby'    => 'term_order',
										'parent'     => $cat_item_id,
										'hide_empty' => 0,
										'order'      => 'ASC',
									);
									$item_categorys = get_categories( $arg );
									?>

									<?php
									foreach ( $item_categorys as $item_category ) :
										?>

										<?php if ( $x >= $num ) : ?>
											<?php break; ?>
										<?php else : ?>
											<li class="p-item-kind__item js-item-ajax" data-slug="<?php echo esc_attr( $item_category->slug ); ?>">
												<?php echo esc_html( $item_category->name ); ?>
											</li>
										<?php endif; ?>

										<?php
										$x++;
								endforeach;
									?>
									<li class="p-item-kind__item js-item-ajax" data-slug="care">
												ケア商品
											</li>
								</ul>
							<div id="js-item-ajax">

									 <?php get_template_part( 'inc/ajax-item-loop-top' ); ?>
							</div>



				</div>
				<!-- ./contents -->
		</div>
		<!-- ./col02 -->

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>item/?item_cat=1day" class="c-btn p-sec__btn sec-items__btn" id="js-ajax-link-toggle">もっと探す</a>
	</div>
	<!-- ./inner -->
</section>


<div class="c-modal js-modal" id="js-modal-item">
		<div class="c-modal__bg js-modal-close"></div>
			<div class="c-modal__content">
					<p class="c-modal-method">購入方法を選択してください</p>
					<ul class="c-modal-buy">
						<li class="c-modal-buy__item">
							<a href="" class="c-btn c-modal-buy__btn c-modal-buy__btn--ec" id="js-ec-link">通販で購入する</a>
						</li>
						<li class="c-modal-buy__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3&item=ワンデーピュアワンデーピュア" class="c-btn c-modal-buy__btn c-modal-buy__btn--coming" id="js-reserve-link">来店して購入する</a>
						</li>
					</ul>

					<p class="js-modal-close c-modal__close-text">
						<span class="c-modal__close-inside">
						<svg class="c-modal__close-icon"><use xlink:href="#svg-icon-close"></use></svg>
						閉じる</span>
					</p>
			</div>
	</div>

<section class="top-about">
	<div class="l-inner">
							<h2 class="c-ttl-under-eng top-about__ttl">
								<span class="c-ttl-under-eng__main">アイ・ビジョンについて</span>
								<span class="c-ttl-under-eng__sub">ABOUT US</span>
							</h2>

							<div class="top-about__box">
								<p class="top-about__desc u-sp-hidden">当店ホームページにお越し下さいましてありがとうございます。<br class="">コンタクトレンズは、現在使い捨てレンズの割合が多くなっております。<br class="">以前に比べて、当店取り扱いしている各メーカーより、乱視用レンズ、遠近両用レンズ、カラーレンズなど、<br class="">種類も増えており、お客様の生活スタイルに応じて多種多様の中からレンズを選んで頂けます。<br class="">ところが、最近コンタクトレンズによるトラブルが、多発しております。<br class="">あなたの目の健康は大丈夫ですか？<br class="">コンタクトレンズは高度管理医療機器です。<br class="">併設の眼科医院がございますので、受付時間内に健康保険証をご持参の上お越し下さい。<br class="">ぜひ、眼科医の検査処方を受けて正しい使用方法をまもり、コンタクトレンズライフを送りましょう。</p>
								<p class="top-about__desc u-pc-hidden">
									当店ホームページにお越し下さいましてありがとうございます。<br class="">コンタクトレンズは、現在使い捨てレンズの割合が多くなっております。<br class="">以前に比べて、当店でお取り扱いしている各メーカーより、乱視用レンズ、<br class="">遠近両用レンズ、カラーレンズなど、種類も増えており、お客様の<br class="">生活スタイルに応じて多種多様の中からレンズを選んで頂けます。<br class="">ところが、最近コンタクトレンズによる<br class="">トラブルが、多発しております。<br class="">あなたの目の健康は大丈夫ですか？<br class="">コンタクトレンズは高度管理医療機器です。<br class="">併設の眼科医院がございますので、<br class="">受付時間内に健康保険証をご持参の上お越し下さい。<br class="">ぜひ、眼科医の検査処方を受けて正しい使用方法を<br class="">まもり、コンタクトレンズライフを送りましょう。
								</p>
							</div>
							<!-- ./box -->
	</div>
	<!-- ./inner -->
</section>

<section class="top-access">
	<div class="l-inner">
							<h2 class="c-ttl-under-eng top-access__ttl">
								<span class="c-ttl-under-eng__main">アクセス</span>
								<span class="c-ttl-under-eng__sub">ACCESS</span>
							</h2>

							<div class="top-access__col">
									<div class="top-access__map map-area">
										<div class="map-area__illust u-radius-50">
											<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/illust_access-map.jpg?88522632888' alt='アイ・ビジョン（横山眼科ビル2F）' class='lazy u-sp-hidden'>
											<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/illust_access-map_sp.jpg?88522632888' alt='アイ・ビジョン（横山眼科ビル2F）' class='lazy u-pc-hidden'>
										</div>
										<!-- ./illust -->
										<ul class="map-area__list">
											<li class="map-area__item u-sp-hidden">★：当店案内看板あり</li>
											<li class="map-area__item">
												<a href="https://goo.gl/maps/jc62tLVx66XmixpQ7" class="map-area__gmap" target="_blank">
												<span class="u-sp-hidden">Googleマップで見る</span>
												<span class="u-pc-hidden">地図アプリで開く</span>
											</a>
											</li>
										</ul>
									</div>
									<!-- ./map -->

									<div class="top-access__contents shop-info">
											<p class="u-pc-hidden shop-info__sp-heading">
												<svg class="shop-info__sp-icon"><use xlink:href="#svg-icon-map-pin"></use></svg>
												所在地
											</p>
											<p class="shop-info__address">東京都足立区花畑1-7-19 横山眼科ビル2F</p>
											<a href="tel:03-3885-3177" class="shop-info__tel">
												<span class="shop-info__sub">TEL</span>
												<span class="shop-info__number">03-3885-3177</span>
											</a>

											<div class="shop-info__table">
												 <?php get_template_part( 'inc/table-info01-access' ); ?>
											</div>
											<!-- ./table -->

											<div class="shop-info__table">
												 <?php get_template_part( 'inc/table-info02-access' ); ?>
											</div>
											<!-- ./table -->

											<p class="shop-info__note">
												<span class="shop-info__main">※ご来店の際は必ず営業終了時間の30分前までにお越しください。<br class="">定休日／水曜日・祝日・夏期休業・年末年始 その他あり</span>
												<span class="shop-info__strong">駐車場／20台</span>
											</p>

											<ul class="shop-info__bottom">
												<li class="shop-info__card">
													<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/top-page/img_access-card.png' alt='' class='lazy'>
												</li>
												<li class="shop-info__guide">他、交通系ICカードの電子マネー<br class="">お使いになれます。</li>
											</ul>
									</div>
									<!-- ./contents -->
							</div>
							<!-- ./col -->
	</div>
	<!-- ./inner -->
</section>
	  <?php
										$args      = array(
											'post_type'   => 'post',
											'posts_per_page' => 3,
											'category_name' => 'blog',
											'orderby'     => 'menu_order',
											'post_status' => 'publish',
											'order'       => 'ASC',
										);
										$the_query = new WP_Query( $args );
										?>

							<?php if ( $the_query->have_posts() ) : ?>


<section class="top-blog">
							<div class="l-inner">
										<h2 class="c-ttl-under-eng top-blog__ttl">
											<span class="c-ttl-under-eng__main">アイ・ビジョンのブログ</span>
											<span class="c-ttl-under-eng__sub">blog</span>
										</h2>
										<p class="top-blog__intro">コンタクトや目に関する役立つトピック！</p>



										<ul class="p-blog-archive top-blog__article">
												<?php
												while ( $the_query->have_posts() ) :
													$the_query->the_post();
													?>
											<li class="p-blog-archive__item">
												<a href="<?php the_permalink(); ?>" class="p-blog-archive__link">
													<div class="p-blog-archive__thumb">
														 <?php get_template_part( 'inc/thumbnail' ); ?>
													</div>
													<h3 class="p-blog-archive__ttl"><?php the_title(); ?></h3>
												</a>
											</li>

													<?php
							endwhile;
												wp_reset_postdata();
												?>

										</ul>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog-list" class="c-btn top-blog__btn">もっと見る</a>
							</div>
							<!-- ./inner -->
</section>
	<?php endif; ?>


<?php

 $faq_post_id = 39;

?>

<?php
if ( have_rows( 'rp_faq', $faq_post_id ) ) :
	;

	$i = 0;
	?>
	<section class="top-faq" id="js-app-qa">

							<div class="l-inner">

								<h2 class="c-ttl-under-eng top-faq__ttl">
											<span class="c-ttl-under-eng__main">よくある質問</span>
											<span class="c-ttl-under-eng__sub">FAQ</span>
										</h2>
								<ul class="p-faq-archive top-faq__list">
										<?php
										while ( have_rows( 'rp_faq', $faq_post_id ) ) :
											the_row();
											$i++;
											?>

											 <?php if ( $i < 5 ) : ?>

											<li class="p-faq-archive__item">

														<accordion-qa>
															<span slot="title"><?php the_sub_field( 'rp_faq_ttl', $faq_post_id ); ?></span>

															<span slot="content"><?php the_sub_field( 'rp_faq_aw', $faq_post_id ); ?></span>
														</accordion-qa>

											</li>

											<?php endif; ?>

										<?php endwhile; ?>

								</ul>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq" class="c-btn top-faq__btn">もっと見る</a>
							</div>
							<!-- ./l-inner -->
	</section>
<?php endif; ?>

<?php

 $footer_post_id = 30;

?>

<?php
if ( have_rows( 'rp_footer_bnr', $footer_post_id ) ) :
	;
	?>

<div class="campaign">
	<div class="l-inner">
				<ul class="campaign__bnr">
					<?php
					while ( have_rows( 'rp_footer_bnr', $footer_post_id ) ) :
						the_row();
						?>

									<?php

									$bnr_link = array();

									if ( ! empty( get_sub_field( 'rp_footer_bnr_link', $footer_post_id ) ) ) {
										$bnr_link = get_sub_field( 'rp_footer_bnr_link', $footer_post_id );
										// var_dump($bnr_link);
										$bnr_link_url    = $bnr_link['url'];
										$bnr_link_target = $bnr_link['target'];
									}


									$bnr_img = get_sub_field( 'rp_footer_bnr_img', $footer_post_id );



									?>
						<li class="campaign__item">
							<a href="<?php echo esc_url( $bnr_link_url ); ?>" class="campaign__link u-radius-30" target="<?php echo esc_html( $bnr_link_target ); ?>">
								<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( $bnr_img['url'] ); ?>' alt='<?php echo esc_url( $bnr_img['alt'] ); ?>' class='lazy' >
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
	</div>
	<!-- ./inner -->
</div>
<!-- ./campaign -->
<?php endif; ?>


<div class="u-all-hidden">
						<svg class="icon"><use xlink:href="#svg-icon-nav01"></use></svg>
<svg class="icon"><use xlink:href="#svg-icon-nav02"></use></svg>
<svg class="icon"><use xlink:href="#svg-icon-nav03"></use></svg>
<svg class="icon"><use xlink:href="#svg-icon-nav04"></use></svg>
<svg class="icon"><use xlink:href="#svg-icon-nav05"></use></svg>
<svg class="icon"><use xlink:href="#svg-icon-search"></use></svg>
<svg class="icon"><use xlink:href="#svg-icon-ac"></use></svg>
<svg class="icon"><use xlink:href="#svg-icon-ac-open"></use></svg>
<svg class="icon"><use xlink:href="#svg-icon-map-pin"></use></svg>
</div>





<?php
get_footer(); ?>
