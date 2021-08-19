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
			<a href="" class="l-breadcrumb__link">商品情報</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->



 <section class="item-list" id="">

							<div class="l-inner">

										<h2 class="item-search-heading"><?php single_cat_title(); ?>の商品一覧</h2>

							</div>
							<!-- ./inner -->
</section>
	 <?php if ( have_posts() ) : ?>

<ul class="l-inner product" id="js-item-ajax">

			<?php
			while ( have_posts() ) :
				the_post();
				?>
			<li class="p-item product__item" data-url="<?php the_permalink(); ?>">


				<?php

											$item_fec = get_field( 'item_fec' );

											$item_sub = get_field( 'item_sub_desc' );

											$item_desc = get_field( 'item_desc' );

											$item_brand = get_field( 'item_brand' );

											$item_zaiko = get_field( 'item_zaiko' );
										   // var_dump( $item_fec);

				?>


				<?php if ( ! empty( $item_brand ) ) : ?>

											<div class="p-item__brand">


											<?php if ( 'seed' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_seed.png' alt='シード' class=''>

											<?php elseif ( 'ire' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_aire.png' alt='アイレ' class=''>

												<?php elseif ( 'alcon' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_alcon.png' alt='alcon' class=''>

												<?php elseif ( 'cooper-vision' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_coper.png' alt='アイレ' class=''>

												<?php elseif ( 'johnson' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_johnson.png' alt='アイレ' class=''>

												 <?php elseif ( 'bausch' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_bausch.png' alt='bausch' class=''>

												 <?php elseif ( 'menicon' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_mennicon.png' alt='menicon' class=''>

												<?php elseif ( 'tore' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_toray.svg' alt='tore' class=''>

												 <?php elseif ( 'other' === $item_brand ) : ?>

												<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/logo_brand_other.png' alt='other' class=''>

											<?php endif; ?>

											  </div>
										<?php endif; ?>


										<div class="p-item__thumb">
													<?php if ( ! empty( $item_zaiko ) ) : ?>
														<?php if ( $item_zaiko || in_array( 'none', $item_zaiko ) ) : ?>
															<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_no_zaiko.svg" alt="在庫なし" class="p-item__balloon">
														<?php endif; ?>
													 <?php endif; ?>

													 <?php


														if ( usces_the_itemImageURL( 0, 'return' ) ) {
															echo usces_the_itemImage( 0, 800, 800 );
														} else {
															echo '<img src="' . esc_url( get_template_directory_uri() ) . '/dist/images/item/dummy.thumb.jpg" alt="在庫なし" class="no">';
														}
														?>

																							</div>
											<!-- ./thumb -->


										<?php if ( ! empty( $item_fec ) ) : ?>
										<ul class="p-item__fec">

											<?php if ( in_array( 'fac01', $item_fec ) ) : ?>

														<li class="p-item__f-item"
															><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_feature01.jpg" alt="UVカット">
														</li>
											<?php endif; ?>
											<?php if ( in_array( 'fac02', $item_fec ) ) : ?>
															<li class="p-item__f-item"
															><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_feature02.jpg" alt="うるおい">
														</li>
											<?php endif; ?>

											<?php if ( in_array( 'fac03', $item_fec ) ) : ?>
															<li class="p-item__f-item"
															><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_feature03.jpg" alt="汚れにくい">
														</li>
														<?php endif; ?>
												<?php if ( in_array( 'fac04', $item_fec ) ) : ?>
															<li class="p-item__f-item"
															><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/item/icon_feature04.jpg" alt="汚れにくい">
														</li>

											<?php endif; ?>
										</ul>
										<?php endif; ?>
											<h3 class="p-item__name"><?php echo wp_kses_post( usces_the_itemName( 'return' ) ); ?></h3>
											<?php if ( $item_sub ) : ?>
														<p class="p-item__t-sub"><?php the_field( 'item_sub_desc' ); ?></p>
											<?php endif; ?>
											<?php if ( $item_desc ) : ?>
														<p class="p-item__desc"><?php the_field( 'item_desc' ); ?></p>
											<?php endif; ?>
											<p class="p-item__col">
												<span class="p-item__box">
													1箱
												</span>
												<span class="p-item__price">
													<?php usces_the_firstPrice(); ?><em class="p-item__tax">円<?php usces_guid_tax(); ?></em>
												</span>

											</p>


											<ul class="p-item__btn-col">
												<li class="p-item__btn-list">
													<a href="<?php the_permalink(); ?>" class="p-item__btn p-item__btn--ec c-btn">
															通販で購入
													</a>

												</li>
												<li class="p-item__btn-list">
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3&item=<?php echo wp_strip_all_tags( usces_the_itemName( 'return' ) ); ?>" class="p-item__btn p-item__btn--reserve c-btn">
																来店予約して購入
														</a>
													</li>
											</ul>


								</li>
			<?php endwhile; ?>

</ul>
	<?php else : ?>
					<p class="item-search-no-find">商品が見つかりませんでした。</p>
			<?php endif; ?>


	 <?php get_template_part( 'inc/item-lens-maker' ); ?>

<?php
get_footer();
