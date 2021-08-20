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
				<?php get_template_part( 'inc/item-list' ); ?>
			<?php endwhile; ?>

</ul>
	<?php else : ?>
					<p class="item-search-no-find">商品が見つかりませんでした。</p>
			<?php endif; ?>


	 <?php get_template_part( 'inc/item-lens-maker' ); ?>

<?php
get_footer();
