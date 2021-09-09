<?php
/*
Template Name: ブログ一覧
*/
?>


<?php get_header(); ?>



<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">ブログ</span>
		<span class="l-pages-heading__sub">BLOG</span>
	</h1>

</div>
<!-- ./pages-heading -->
<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog-list" class="l-breadcrumb__link">ブログ</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->
<?php
global $max_num_page;
$paged                                        = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
										$args = array(
											'post_type'   => 'post',
											'posts_per_page' => 5,
											'category_name' => 'blog',
											'orderby'     => 'menu_order',
											'post_status' => 'publish',
											'order'       => 'ASC',
											'paged'       => $paged,
										);
										$the_query = new WP_Query( $args );
										?>

							<?php if ( $the_query->have_posts() ) : ?>

<section class="blog-archive">
		<div class="l-inner">
				<div class="blog-archive__area">
								<?php
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
									?>
						<article class="blog-archive__post">
							<a href="<?php the_permalink(); ?>" class="blog-archive__link">
								<div class="blog-archive__thumb">
										<?php get_template_part( 'inc/thumbnail' ); ?>
								</div>
								<!-- ./thumb -->
								<div class="blog-archive__contents">
											<p class="blog-archive__date"><time datetime=" <?php echo get_the_date( 'Y年Md日' ); ?>"> <?php echo get_the_date( 'Y年Md日' ); ?></time></p>
											<h3 class="blog-archive__ttl"><?php the_title(); ?></h3>
											<p class="blog-archive__desc"><?php echo  get_the_excerpt() ; ?></p>
								</div>
							</a>
						</article>

													<?php
							endwhile;
												wp_reset_postdata();
								?>
				</div>
		</div>
</section>
	<?php endif; ?>

	<?php
	if ( $the_query->max_num_pages > 1 ) {
		echo '<div class="c-pagination blog-pagination">';
		echo paginate_links(
			array(
				'base'      => get_pagenum_link( 1 ) . '%_%',
				'format'    => 'page/%#%/',
				'current'   => max( 1, $paged ),
				'total'     => $the_query->max_num_pages,
				'type'      => 'list',
				'mid_size'  => '1',
				'prev_text' => '<',
				'next_text' => '>',
			)
		);
		echo '</div>';
	}
	?>
<?php
get_footer();
