

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>




	<?php if ( is_home() || is_front_page() ) : ?>
			<?php


			$options['ssl']['verify_peer']      = false;
			$options['ssl']['verify_peer_name'] = false;

			$critical_css = file_get_contents(
				esc_url( get_template_directory_uri() ) . '/dist/css/csscritical.css?' . mt_rand(),
				false,
				stream_context_create( $options )
			);
			?>
			<style>
				[v-cloak] {
					display: none;
				}
				<?php echo esc_html( $critical_css ); ?>
			</style>
	<?php endif; ?>

	<?php wp_head(); ?>
	</head>

<body id="body">
	<!-- SVGの大元をインクルード -->
	<div class="u-all-hidden">
		 <?php get_template_part( 'inc/svg-icons' ); ?>
	</div>

<div class="l-wrapper">
	<header class="l-header" id="js-app-header">

		<div class="l-inner l-header__inner">

				<div class="l-header__left l-logo-area">
				<?php if ( is_home() || is_front_page() ) : ?>
					<h1 class="l-logo-area__catch u-sp-hidden">足立区花畑(竹ノ塚駅近辺)でコンタクトをお探しならアイ・ビジョンにお任せください。</h1>
				<?php else : ?>
					<p class="l-logo-area__catch u-sp-hidden">足立区花畑(竹ノ塚駅近辺)でコンタクトをお探しならアイ・ビジョンにお任せください。</p>
				<?php endif; ?>

					<div class="l-logo-area__row">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-logo-area__logo">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_logo.svg" alt="アイ・ビジョン">
						</a>
						<a href="tel:03-3885-3177" class="l-logo-area__tel u-sp-hidden" target="_blank">
							<p class="l-logo-area__sub">TEL</p>
							<p class="l-logo-area__number">03-3885-3177</p>
						</a>
					</div>
					<!-- ./row -->
				</div>
				<!-- ./left -->

				<div class="l-header__right l-header-side">
						<div class="l-header-side__left u-sp-hidden">
							<div class="l-header-side__table">
								 <?php get_template_part( 'inc/table-info01' ); ?>
							</div>
							<div class="l-header-side__table">
								 <?php get_template_part( 'inc/table-info02' ); ?>
							</div>
							<p class="l-header-side__off">定休日／水曜日・祝日・夏期休業・年末年始 その他あり</p>
						</div>

						<?php if ( ! wp_is_mobile() ) : ?>
							<div class="l-header-side__right l-header-font-trans">
								<div class="  l-header-font-trans__area">
									<p class="l-header-font-trans__heading">文字サイズ</p>
									<div class="l-header-font-trans__list">
										<button class="js-font-size-change l-header-font-trans__btn" id="is-font-size-l">大</button>
										<button class="js-font-size-change l-header-font-trans__btn" id="is-font-size-m">中</button>
										<button class="js-font-size-change l-header-font-trans__btn" id="is-font-size-s">小</button>
									</div>
									<!-- ./list -->
								</div>
								<!-- ./area -->
						</div>
						<!-- ./l-header-font-trans -->
						<?php endif; ?>



						<!-- SP_ONLY -->

						<button class="u-pc-hidden l-sp-translate js-modal-open" data-target="js-modal-translate">
							<div class="l-sp-translate__svg">
									  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_icon_tranlate.svg" alt="文字サイズ変更">
							</div>
							<p class="l-sp-translate__text">文字サイズ</p>
						</button>

						<button class="u-pc-hidden l-sp-toggle" id="js-toggle" @click="navOpen" :class="{'is-open': open}">
							<div class="l-sp-toggle__inner">
								<span class="l-sp-toggle__line"></span>
								<span class="l-sp-toggle__line"></span>
								<span class="l-sp-toggle__line"></span>
							</div>
						</button>
				</div>
				<!-- ./right -->

		</div>
		<!-- ./inner -->
		<transition name="global">
		<div class="l-global-area" v-show="show"　v-cloak>
			<nav class="l-global">
				<ul class="l-global__list">
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav01"></use></svg>
								</i>
								<p class="l-global__guide">お知らせ</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>item-info" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav02"></use></svg>
								</i>
								<p class="l-global__guide">商品情報</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav03"></use></svg>
								</i>
								<p class="l-global__guide">初めての方</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav04"></use></svg>
								</i>
								<p class="l-global__guide">よくある質問</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav05"></use></svg>
								</i>
								<p class="l-global__guide">店舗案内</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="http://yokoyama-ganka.jp/" class="l-global__link" target="_blank">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav06"></use></svg>
								</i>
								<p class="l-global__guide">提携眼科</p>
							</a>
						</li>
				</ul>
			</nav>
			<ul class="l-global-table u-pc-hidden">
				<li class="l-global-table__item">
				 <?php get_template_part( 'inc/table-info01' ); ?>
				</li>
				<li class="l-global-table__item u-mb0">
				 <?php get_template_part( 'inc/table-info02' ); ?>
				</li>
				<li class="l-global-table__off">定休日／水曜日・祝日・<br>夏期休業・年末年始 その他あり</li>
			</ul>

		 </div>
		 <!-- ./l-global-area -->
		  </transition>
	</header>


	<div class="c-modal js-modal" id="js-modal-translate">
		<div class="c-modal__bg js-modal-close"></div>
			<div class="c-modal__size-content">
					<ul class="c-modal__size-select">
						<li class="c-modal__size-btn c-modal__size-btn--size-l js-font-size-change js-modal-close" id="is-font-size-l">大</li>
						<li class="c-modal__size-btn c-modal__size-btn--size-m js-font-size-change js-modal-close" id="is-font-size-m">中</li>
						<li class="c-modal__size-btn c-modal__size-btn--size-s js-font-size-change js-modal-close" id="is-font-size-s">小</li>
					</ul>
					<p class="js-modal-close c-modal__close-text">
						<span class="c-modal__close-inside">
						<svg class="c-modal__close-icon"><use xlink:href="#svg-icon-close"></use></svg>
						閉じる</span>
					</p>
			</div>
	</div>


	<ul class="l-head-action">
		<li class="l-head-action__item">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3" class="l-head-action__link l-head-action__link--reserve" target="_blank">来店ご予約</a>
		</li>

		<li class="l-head-action__item">
				<a href="https://page.line.me/lqk5945j?openQrModal=true" class="l-head-action__link l-head-action__link--line" target="_blank">
					<svg class="l-head-action__line"><use xlink:href="#svg-icon-line"></use></svg>
				</a>
		</li>
	</ul>


	<!-- <?php echo do_shortcode( '[pluginhandles]' ); ?> -->
