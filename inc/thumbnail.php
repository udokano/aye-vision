<?php
													$thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
											<?php
											if ( has_post_thumbnail() ) :
												?>
												<img <?php echo esc_attr( DUMMY ); ?> data-src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title(); ?>" class="lazy u-radius-30 u-object-fit">
											<?php else : ?>
												<img <?php echo esc_attr( DUMMY ); ?> data-src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_dummy_thumb.jpg" alt="no_img" class="lazy u-radius-30 u-object-fit">
											<?php endif; ?>
