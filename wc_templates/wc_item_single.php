<?php
/**
 * Product Page Template
 *
 * @package eye-vison
 */

get_header();
?>
<!-- <header class="item-header">
				<h1 class="item_page_title"><?php the_title(); ?></h1>
			</header> -->
<section id="primary" class="cart">
	<div id="content" class="l-inner" role="main">

	<?php
	if ( have_posts() ) :
		the_post();
		?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


			<ul class="cart-content">

				<?php usces_remove_filter(); ?>
				<?php usces_the_item(); ?>
				<?php usces_have_skus(); ?>

				<li class="cart-content__thumb">




							<a href="<?php usces_the_itemImageURL( 0 ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', null ); ?> target="_blank"><?php usces_the_itemImage( 0, 999, 999, $post ); ?></a>


						<?php
						$imageid = usces_get_itemSubImageNums();
						if ( ! empty( $imageid ) ) :
							?>
						<div class="itemsubimg">
							<?php foreach ( $imageid as $id ) : ?>
							<a href="<?php usces_the_itemImageURL( $id ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', null ); ?>><?php usces_the_itemImage( $id, 999, 999, $post ); ?></a>
						<?php endforeach; ?>
						</div>
						<?php endif; ?>

					</li><!-- .thumb -->

					<li class="cart-content__info">

							<div class="detail-box">
								<h2 class="detail-box__name"><?php echo wp_strip_all_tags( usces_the_itemName( 'return' ) ); ?></h2>
							<!-- 	<div class="itemcode">(<?php usces_the_itemCode(); ?>)</div> -->
								<?php wel_campaign_message(); ?>

								<?php
								if ( get_field( 'item_sub_desc' ) ) :
									?>
									<div class="detail-box__sub-desc">
										<!-- <?php the_content(); ?> -->
										<?php the_field( 'item_sub_desc' ); ?>
									</div>
								<?php endif; ?>

								<?php
								if ( get_field( 'item_desc' ) ) :
									?>
									<div class="detail-box__description">
										<!-- <?php the_content(); ?> -->
										<?php the_field( 'item_desc' ); ?>
									</div>
								<?php endif; ?>



								<?php

											$item_fec = get_field( 'item_fec' );

								?>

										<?php if ( ! empty( $item_fec ) ) : ?>
										<ul class="p-item__fec cart-fec">

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

								<?php if ( 'continue' === wel_get_item_chargingtype() ) : ?>
								<!-- Charging Type Continue shipped -->
								<div class="field">
									<table class="dlseller">
										<tr><th><?php _e( 'First Withdrawal Date', 'dlseller' ); ?></th><td><?php echo dlseller_first_charging( $post->ID ); ?></td></tr>
										<?php if ( 0 < (int) $usces_item['dlseller_interval'] ) : ?>
										<tr><th><?php _e( 'Contract Period', 'dlseller' ); ?></th><td><?php echo $usces_item['dlseller_interval']; ?><?php _e( 'month (Automatic Updates)', 'welcart_basic' ); ?></td></tr>
										<?php endif; ?>
									</table>
								</div>
								<?php endif; ?>
							</div><!-- .detail-box -->

					<div class="cart-item-info">

						<?php
						$item_custom = usces_get_item_custom( $post->ID, 'list', 'return' );
						if ( $item_custom ) {
							echo $item_custom;
						}
						?>

						<form action="<?php echo USCES_CART_URL; ?>" method="post">

						<?php do { ?>
							<div class="skuform">
								<?php if ( '' !== usces_the_itemSkuDisp( 'return' ) ) : ?>
								<div class="skuname"><?php usces_the_itemSkuDisp(); ?></div>
								<?php endif; ?>

								<?php if ( usces_is_options() ) : ?>
								<dl class="item-option">
									<?php while ( usces_have_options() ) : ?>
									<dt><?php usces_the_itemOptName(); ?></dt>
									<dd><?php usces_the_itemOption( usces_getItemOptName(), '' ); ?></dd>
									<?php endwhile; ?>
								</dl>
								<?php endif; ?>

								<?php usces_the_itemGpExp(); ?>

								<div class="field">
									<div class="field__zaiko"><?php _e( 'stock status', 'usces' ); ?> : <?php usces_the_itemZaikoStatus(); ?></div>

									<?php if ( 'continue' === wel_get_item_chargingtype() ) : ?>
									<div class="frequency"><span class="field_frequency"><?php dlseller_frequency_name( $post->ID, 'amount' ); ?></span></div>
									<?php endif; ?>

									<div class="field__price">
									<?php if ( usces_the_itemCprice( 'return' ) > 0 ) : ?>
										<span class="field__cprice"><?php usces_the_itemCpriceCr(); ?></span>
									<?php endif; ?>
										<?php usces_the_itemPriceCr(); ?><em class="field__tax"><?php usces_guid_tax(); ?></em>
									</div>
									<?php usces_crform_the_itemPriceCr_taxincluded(); ?>
								</div>

								<?php if ( ! usces_have_zaiko() ) : ?>
								<div class="itemsoldout"><?php echo apply_filters( 'usces_filters_single_sku_zaiko_message', __( 'At present we cannot deal with this product.', 'welcart_basic' ) ); ?></div>
								<?php else : ?>
								<ul class="cart-action">
									<li class="cart-action__quantity">
										<p class="cart-action__qua-label"><?php _e( 'Quantity', 'usces' ); ?>:</p>
										<p class="cart-action__qua-input"><?php usces_the_itemQuant(); ?><?php usces_the_itemSkuUnit(); ?></p>
									</li>
									<li class="cart-action__button"><?php usces_the_itemSkuButton( __( 'Add to Shopping Cart', 'usces' ), 0 ); ?></li>
								</ul>
								<?php endif; ?>
								<div class="error_message"><?php usces_singleitem_error_message( $post->ID, usces_the_itemSku( 'return' ) ); ?></div>
							</div><!-- .skuform -->
						<?php } while ( usces_have_skus() ); ?>

							<?php do_action( 'usces_action_single_item_inform' ); ?>
						</form>
						<?php do_action( 'usces_action_single_item_outform' ); ?>

					</div><!-- .item-info -->

					<?php usces_assistance_item( $post->ID, __( 'An article concerned', 'usces' ) ); ?>

					</li>



			</ul><!-- .storycontent -->

		</article>

	<?php else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
	<?php endif; ?>

	</div><!-- #content -->
</section><!-- #primary -->

<?php

get_footer();
?>
