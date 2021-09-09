<?php

/**
 * 定数定義
 * ダミー画像のパスとHTMLを定義
 */
define( 'PATH', esc_url( get_template_directory_uri() ) . '/dist/images/common/c_dummy_thumb.jpg' );
define( 'DUMMY', 'src=' . PATH . '' );



?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>



	<?php wp_head(); ?>
	</head>

<body id="body">
	<!-- SVGの大元をインクルード -->
	<div class="u-all-hidden">
		 <?php get_template_part( 'inc/svg-icons' ); ?>
	</div>

<div class="l-wrapper">
	<header class="l-header" id="js-app-header">

		<div class="l-inner l-header__inner l-header-inner-lang">

				<div class="l-header__left l-logo-area l-header-inner-lang__left">
					<?php if ( is_page( 'shop-info-eng' ) ) : ?>
						<p class="l-logo-area__catch u-sp-hidden">If you are looking for contact lenses in the United States, leave it to EyeVision.</p>
					<?php endif; ?>
					<?php if ( is_page( 'shop-info-ch' ) ) : ?>
						<p class="l-logo-area__catch u-sp-hidden">如果您要在美国寻找隐形眼镜，请交给EyeVision。</p>
					<?php endif; ?>
					<div class="l-logo-area__row l-header-inner-lang__logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-logo-area__logo">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_logo.svg" alt="アイ・ビジョン">
						</a>

					</div>
					<!-- ./row -->
				</div>
				<!-- ./left -->

				<div class="l-header__right l-header-side l-header-inner-lang__right">


						<?php if ( ! wp_is_mobile() ) : ?>
							<?php if ( is_page( 'shop-info-eng' ) ) : ?>
							<div class="l-header-side__right l-header-font-trans l-header-inner-lang__switch">
								<div class="  l-header-font-trans__area">
									<p class="l-header-font-trans__heading">font-size</p>
									<div class="l-header-font-trans__list">
										<button class="js-font-size-change l-header-font-trans__btn" id="is-font-size-l">L</button>
										<button class="js-font-size-change l-header-font-trans__btn" id="is-font-size-m">M</button>
										<button class="js-font-size-change l-header-font-trans__btn" id="is-font-size-s">S</button>
									</div>
									<!-- ./list -->
								</div>
								<!-- ./area -->
						</div>
						<!-- ./l-header-font-trans -->
							<?php endif; ?>
							 <?php if ( is_page( 'shop-info-ch' ) ) : ?>
							<div class="l-header-side__right l-header-font-trans l-header-inner-lang__switch">
								<div class="  l-header-font-trans__area">
									<p class="l-header-font-trans__heading">字体大小</p>
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
						<?php endif; ?>





							<!-- SP_ONLY -->
						   <?php if ( is_page( 'shop-info-ch' ) ) : ?>
						<button class="u-pc-hidden l-sp-translate js-modal-open" data-target="js-modal-translate">
							<div class="l-sp-translate__svg">
									  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_icon_tranlate.svg" alt="文字サイズ変更">
							</div>
							<p class="l-sp-translate__text">字体大小</p>
						</button>

						<button class="u-pc-hidden l-sp-toggle" id="js-toggle" @click="navOpen" :class="{'is-open': open}">
							<div class="l-sp-toggle__inner">
								<span class="l-sp-toggle__line"></span>
								<span class="l-sp-toggle__line"></span>
								<span class="l-sp-toggle__line"></span>
							</div>
						</button>
							<?php endif; ?>
								<!-- SP_ONLY -->
						   <?php if ( is_page( 'shop-info-eng' ) ) : ?>
						<button class="u-pc-hidden l-sp-translate js-modal-open" data-target="js-modal-translate">
							<div class="l-sp-translate__svg">
									  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_icon_tranlate.svg" alt="文字サイズ変更">
							</div>
							<p class="l-sp-translate__text">Font Size</p>
						</button>

						<button class="u-pc-hidden l-sp-toggle" id="js-toggle" @click="navOpen" :class="{'is-open': open}">
							<div class="l-sp-toggle__inner">
								<span class="l-sp-toggle__line"></span>
								<span class="l-sp-toggle__line"></span>
								<span class="l-sp-toggle__line"></span>
							</div>
						</button>
							<?php endif; ?>
				</div>
				<!-- ./right -->

		</div>
		<!-- ./inner -->
		<?php if ( is_page( 'shop-info-eng' ) ) : ?>
		<transition name="global">
		<div class="l-global-area" v-show="show"　v-cloak>
			<nav class="l-global">
				<ul class="l-global__list">
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav01"></use></svg>
								</i>
								<p class="l-global__guide">News</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>item-info" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav02"></use></svg>
								</i>
								<p class="l-global__guide">Product Info</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav03"></use></svg>
								</i>
								<p class="l-global__guide">First time user</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav04"></use></svg>
								</i>
								<p class="l-global__guide">FAQ</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav05"></use></svg>
								</i>
								<p class="l-global__guide">Store Guide</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="http://yokoyama-ganka.jp/" class="l-global__link" target="_blank">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav06"></use></svg>
								</i>
								<p class="l-global__guide">Lift Eye</p>
							</a>
						</li>
				</ul>
			</nav>


		 </div>
		 <!-- ./l-global-area -->
		  </transition>
		  <?php endif; ?>
		   <?php if ( is_page( 'shop-info-ch' ) ) : ?>
		<transition name="global">
		<div class="l-global-area" v-show="show"　v-cloak>
			<nav class="l-global">
				<ul class="l-global__list">
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav01"></use></svg>
								</i>
								<p class="l-global__guide">通知</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>item-info" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav02"></use></svg>
								</i>
								<p class="l-global__guide">产品信息</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav03"></use></svg>
								</i>
								<p class="l-global__guide">第一次使用</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav04"></use></svg>
								</i>
								<p class="l-global__guide">常见问题</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info" class="l-global__link">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav05"></use></svg>
								</i>
								<p class="l-global__guide">商店指南</p>
							</a>
						</li>
						<li class="l-global__item">
							<a href="http://yokoyama-ganka.jp/" class="l-global__link" target="_blank">
								<i class="l-global__icon">
									<svg class="l-global__svg"><use xlink:href="#svg-icon-nav06"></use></svg>
								</i>
								<p class="l-global__guide">抬眼</p>
							</a>
						</li>
				</ul>
			</nav>


		 </div>
		 <!-- ./l-global-area -->
		  </transition>
		  <?php endif; ?>
	</header>

  <?php if ( is_page( 'shop-info-eng' ) ) : ?>
	<div class="c-modal js-modal" id="js-modal-translate">
		<div class="c-modal__bg js-modal-close"></div>
			<div class="c-modal__size-content">
					<ul class="c-modal__size-select">
						<li class="c-modal__size-btn c-modal__size-btn--size-l js-font-size-change js-modal-close" id="is-font-size-l">L</li>
						<li class="c-modal__size-btn c-modal__size-btn--size-m js-font-size-change js-modal-close" id="is-font-size-m">M</li>
						<li class="c-modal__size-btn c-modal__size-btn--size-s js-font-size-change js-modal-close" id="is-font-size-s">S</li>
					</ul>
					<p class="js-modal-close c-modal__close-text">
						<span class="c-modal__close-inside">
						<svg class="c-modal__close-icon"><use xlink:href="#svg-icon-close"></use></svg>
						Close</span>
					</p>
			</div>
	</div>
 <?php endif; ?>

   <?php if ( is_page( 'shop-info-ch' ) ) : ?>
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
						关闭</span>
					</p>
			</div>
	</div>
 <?php endif; ?>



	<!-- <?php echo do_shortcode( '[pluginhandles]' ); ?> -->
