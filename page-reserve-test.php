<?php
/*
Template Name: 来店予約--予約フォーム切り替えテスト用
*/
?>


<?php



date_default_timezone_set( 'Asia/Tokyo' );
$info = getdate();
$hour = $info['hours'];
$min  = $info['minutes'];

$current_date = $hour;


/*現在の日付の曜日の番号を出力する*/
$date = date( 'w' );


?>


<?php get_header(); ?>



<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">来店予約</span>
		<span class="l-pages-heading__sub">RESERVATION</span>
	</h1>

</div>
<!-- ./pages-heading -->


<?php


$class_active01 = '';
$class_active02 = '';

if ( isset( $_GET['reserve-type'] ) ) {
			$reserve_param = wp_unslash( $_GET['reserve-type'] );
	if ( '01' === $reserve_param ) {
		$class_active01 = 'is-select-type';
	} elseif ( '02' === $reserve_param ) {
		$class_active02 = 'is-select-type';
	}
}

?>


<!--
<ul class="l-inner reserve-type">
	<li class="reserve-type__item js-reserve-type <?php echo esc_attr( $class_active01 ); ?>">
		<a
		href="
		<?php echo esc_url( home_url( '/' ) ); ?>reserve?reserve-type=01&services=3
		<?php
		if ( isset( $_GET['item'] ) ) {
			$item_param = wp_unslash( $_GET['item'] );
			echo '&item=' . esc_html( $item_param );
		}
		?>
		"
		class="reserve-type__link">レンズ購入・初めての方</a>
	</li>
	<li class="reserve-type__item js-reserve-type <?php echo esc_attr( $class_active02 ); ?>"><a
		href="
		<?php echo esc_url( home_url( '/' ) ); ?>reserve?reserve-type=02&services=4
		<?php
		if ( isset( $_GET['item'] ) ) {
			$item_param = wp_unslash( $_GET['item'] );
			echo '&item=' . esc_html( $item_param );
		}
		?>
		"
		class="reserve-type__link">レンズ受取り・ケア用品購入のみの方</a>
	</li>
</ul> -->

 <?php
										$args      = array(
											'post_type'   => 'post',
											'posts_per_page' => -1,
											'category_name' => 'item',
											'post_status' => 'publish',
											'orderby'     => 'ID',
											'order'       => 'ASC',
										);
										$the_query = new WP_Query( $args );

										// var_dump( $args );
										?>

							<?php if ( $the_query->have_posts() ) : ?>
	<div class="service-out-wrap" id="js-service-out-wrap">
			<p class="service-out" id="js-service-out"><span id="js-service-out-text">商品を選択してください</span>
				<svg class="service-out__icon"><use xlink:href="#svg-icon-arw-sel"></use></svg>
			</p>
			<ul class="service-list" id="js-service-list">

											<?php
											while ( $the_query->have_posts() ) :
												$the_query->the_post();
												?>
													<li class="service-list__item js-service-item" data-name="<?php echo wp_strip_all_tags( usces_the_itemName( 'return' ) ); ?>">
														<div class="service-list__thumb">
															 <?php


																if ( usces_the_itemImageURL( 0, 'return' ) ) {
																	echo usces_the_itemImage( 0, 800, 800 );
																} else {
																	echo '<img src="' . esc_url( get_template_directory_uri() ) . '/dist/images/item/dummy.thumb.jpg" alt="在庫なし" class="no">';
																}
																?>

														</div>
														<p class="service-list__name js-select-text"><?php echo wp_strip_all_tags( usces_the_itemName( 'return' ) ); ?></p>
													</li>
												<?php
										endwhile;
											wp_reset_postdata();
											?>
			</ul>
	</div>
	<?php endif; ?>



<section class="reserve-area">
	<div class="l-inner reserve-form">

			<div class="reserve-list">


			現在の時間：<?php echo $current_date; ?>時

			<p class="">9:00~18:59までしか予約フォームが出現しなければ成功</p>


			<?php if ( 8 < $current_date && 19 > $current_date ) : ?>

						<div class="reserve-list__cal js-hidden js-reserve-cal" id="js-reserve-type01">
							<?php echo do_shortcode( '[booking_package id=4]' ); ?>
						</div>

									<?php else : ?>

									<p class=""><br>予約時間外</p>

			<?php endif; ?>

					<!-- <div class="reserve-list__cal js-hidden js-reserve-cal" id="js-reserve-type02">

					</div> -->

			</div>
			<!-- ./list -->
	</div>
	<!-- ./linner -->
</section>


<?php
get_footer();
?>
