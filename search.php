<?php get_header(); ?>
<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">商品検索</span>
		<span class="l-pages-heading__sub">ITEM SEARCH</span>
	</h1>

</div>
<!-- ./pages-heading -->

<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="" class="l-breadcrumb__link">商品検索</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->

<!-- <img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/shop-info/thumb_shop01.jpg' alt='写真' class='lazy'>
 -->

<?php

if ( isset( $_POST['s'] ) ) {
		 $word = wp_unslash( $_POST['s'] );
}

$search_count = $wp_query->found_posts;

?>



 <section class="item-list" id="">

							<div class="l-inner">

							<?php
							if ( $word ) :
								?>
										<h2 class="item-search-heading">「<?php echo esc_html( $word ); ?>」を含む商品一覧</h2>
										<?php if ( 0 !== $search_count ) : ?>
											<p class="item-search-count"><?php echo esc_html( $search_count ); ?>点の商品が見つかりました</p>
										<?php endif; ?>
							<?php else : ?>
										<h2 class="item-search-heading">商品検索ページ</h2>
							<?php endif; ?>


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


										<div class="p-item__thumb">
												<?php usces_the_itemImage( 0, 800, 800 ); ?>
										</div>
										<!-- ./thumb -->

										<?php

											$item_fec = get_field( 'item_fec' );

											$item_sub = get_field( 'item_sub_desc' );

											$item_desc = get_field( 'item_desc' );

										   // var_dump( $item_fec);

										?>

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
					<section class="item-search item-search--search">
						<div class="l-inner item-search__inner u-radius-40">

										<h2 class="item-search__heading">別のキーワードで検索する</h2>
										<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post" class="item-search__form">

															<div class="item-search__left">
														<svg class="item-search__icon"><use xlink:href="#svg-icon-search"></use></svg>
														<input type="text" name="s" placeholder="商品名など検索キーワードを入力" class="item-search__input">
													</div>
													<!-- ./left -->

													<button type="submit" class="item-search__submit">検索</button>

										</form>
							</div>
							<!-- ./l-inner -->
					</section>
	<?php endif; ?>

<div class="item-lens-pt02">
	 <?php get_template_part( 'inc/item-lens-type' ); ?>
</div>
<!-- ./item-lens-pt02 -->

<?php
get_footer();
