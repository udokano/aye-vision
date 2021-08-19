<?php
/*
Template Name: よくある質問一覧
*/
?>

<?php get_header(); ?>



<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">よくある質問</span>
		<span class="l-pages-heading__sub">QUESTIONS</span>
	</h1>

</div>
<!-- ./pages-heading -->
<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq" class="l-breadcrumb__link">よくある質問</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->
<?php

 $faq_post_id = 39;

?>


	<section class="top-faq" id="js-app-qa">

							<div class="l-inner">

							<?php
							define( 'MAX', '5' ); // 1ページの記事の表示数
							$near_shop_list = get_field( 'rp_faq', $faq_post_id );
							//var_dump( $near_shop_list );
							$books_num = count( $near_shop_list );
							//var_dump( $books_num );
							$max_page = ceil( $books_num / MAX );
							// var_dump( $max_page );

							if ( ! isset( $_GET['faq_page'] ) ) { // $_GET['page_id'] はURLに渡された現在のページ数
								$now = 1; // 設定されてない場合は1ページ目にする
							} else {
								$now = $_GET['faq_page'];
							}

							$start_no = ( $now - 1 ) * MAX; // 配列の何番目から取得すればよいか

							// array_sliceは、配列の何番目($start_no)から何番目(MAX)まで切り取る関数
							$disp_data = array_slice( $near_shop_list, $start_no, MAX, true );
							?>
						<ul class="p-faq-archive top-faq__list">
							<?php foreach ( $disp_data as $val ) : ?>

									<li class="p-faq-archive__item">

														<accordion-qa>
															<span slot="title"><?php echo wp_kses_post( $val['rp_faq_ttl'], true ); ?></span>

															<span slot="content"><?php echo wp_kses_post( $val['rp_faq_aw'], true ); ?></span>
														</accordion-qa>

											</li>

						<?php endforeach; ?>
								</ul>

							</div>
							<!-- ./l-inner -->
	</section>

	<?php
								echo '<div class="c-pagination l-inner faq-pagination">';
									echo '<ul class="page-numbers">';



	if ( $now > 1 ) { // リンクをつけるかの判定
		echo '<li>';
		echo '<a href=" ' . esc_url( home_url( '/' ) ) . 'faq/?faq_page=' . ( $now - 1 ) . '" class="prev page-numbers"><</a>';
		 echo '</li>';
	}
	for ( $i = 1; $i <= $max_page; $i++ ) { // 最大ページ数分リンクを作成

		echo '<li>';
		if ( $i == $now ) { // 現在表示中のページ数の場合はリンクを貼らない
			echo '<span class="current">' . $now . '</span>';
		} else {
			echo '<a href=" ' . esc_url( home_url( '/' ) ) . 'faq/?faq_page=' . $i . '">' . $i . '</a>';
		}
		 echo '</li>';

	}
	if ( $now < $max_page ) { // リンクをつけるかの判定
		echo '<li>';
		echo '<a href=" ' . esc_url( home_url( '/' ) ) . 'faq/?faq_page=' . ( $now + 1 ) . '" class="next page-numbers">></a>';
		echo '</li>';
	}
									echo '</ul>';
								 echo '</div>';
	?>

<?php
get_footer();
