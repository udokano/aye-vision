<?php


require_once dirname( __FILE__ ) . '../../../../../wp-load.php';


if ( isset( $_POST['current_cat'] ) ) {
		$item_category = wp_unslash( $_POST['current_cat'] );
} else {
	$item_category = '1day';
}

?>


 <?php
										$args      = array(
											'post_type'   => 'post',
											'posts_per_page' => 6,
											'category_name' => $item_category,
											'post_status' => 'publish',
											'orderby'     => 'ID',
											'order'       => 'ASC',
										);
										$the_query = new WP_Query( $args );
										?>

							<?php if ( $the_query->have_posts() ) : ?>
											<ul class="p-top-items">
								<?php
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
									?>

								<li class="p-top-items__item js-item-modal" data-url="<?php the_permalink(); ?>" data-name="<?php echo wp_strip_all_tags( usces_the_itemName( 'return' ) ); ?>">

										<?php
											$top_item_thumb = get_field( 'item_top_thumb' );
										?>


										<div class="p-top-items__thumb">
											   <?php if ( $top_item_thumb ) : ?>
													<img src='<?php echo esc_url( $top_item_thumb['url'] ); ?>' alt='<?php echo esc_html( usces_the_itemName() ); ?>' class='u-radius-30'>
												<?php else : ?>
															<?php usces_the_itemImage( 0, 800, 800 ); ?>
												<?php endif; ?>
										</div>
										<!-- ./thumb -->

										<div class="p-top-items__contents">
											<h3 class="p-top-items__ttl"><?php echo usces_the_itemName( 'return' ); ?></h3>
											<p class="p-top-items__price">
												<?php usces_crform( usces_the_firstPrice( 'return' ), true, false ); ?>
												<?php usces_guid_tax(); ?>
											</p>
										</div>
										<!-- ./contents -->

								</li>


											<?php
							endwhile;
								wp_reset_postdata();
								?>
								</ul>

								<?php else : ?>
											<p class="p-top-items__no-item">商品準備中</p>
								<?php endif; ?>
