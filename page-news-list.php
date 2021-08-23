<?php
/*
Template Name: お知らせ一覧
*/
?>

<?php


/**
 * 絞りj込み検索に必要な値の取得
 *****************************/


/* フォームからの値がある場合とない場合で処理を分ける */

/* 新しくフォームに入力された場合($_POSTの値がある場合!!)には新しくSESSIONの値を入れる */

if ( isset( $_REQUEST['years'] ) ) {
	$news_years = $_REQUEST['years'];

	$_SESSION['years'] = $news_years;
}
 $session_news_year = $_SESSION['years'];

if ( isset( $_REQUEST['tax'] ) ) {
	$news_tax = $_REQUEST['tax'];

	$_SESSION['tax'] = $news_tax;
}
/* ページの再読み込みまたはページングした場合には既存のSESSIONの値を使う */
 $session_news_tax = $_SESSION['tax'];

// var_dump( $news_years );

 //echo $session_news_year;

	$news_year_arg[] = array();

if ( $session_news_year ) {
	$news_year_arg[] = array(
		array(
			'year' => $session_news_year,
		),
	);
}

if ( $session_news_tax ) {
	$news_tax_arg[] = array(
		'taxonomy'         => 'tax_news_kind',
		'terms'            => $session_news_tax,
		'include_children' => false,
		'field'            => 'slug',
		'operator'         => 'IN',
	);
}

$news_tax_arg['relation'] = 'OR';

?>


<?php

global $max_num_page;
$paged      = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args       = array(
	'post_type'      => 'news',
	'tax_query'      => $news_tax_arg,
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'post_status'    => 'publish',
	'order'          => 'ASC',
	'paged'          => $paged,
	'date_query'     => $news_year_arg,
);
$news_query = new WP_Query( $args );

/*
 echo '<pre>';
	var_dump( $args );
	echo '</pre>'; */

?>

<?php get_header(); ?>
<div class="l-pages-heading">

	<h1 class="l-pages-heading__texts">
		<span class="l-pages-heading__ttl">お知らせ</span>
		<span class="l-pages-heading__sub">INFORMATION</span>
	</h1>

</div>
<!-- ./pages-heading -->
<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="l-breadcrumb__link">お知らせ</a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->
<?php

$now_year = gmdate( 'Y' );

?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>news/" method="post">
	<div class="news-form">
			<div class="l-inner news-form__inner">
					<div class="news-form__row">
						<?php if ( ! wp_is_mobile() ) : ?>
								<div class="news-form__date">
									<?php if ( ! empty( $session_news_year ) ) : ?>
										<?php echo esc_html( $session_news_year ); ?>
												   <?php
										else :
											?>
											2021<?php endif; ?>年
								</div>
						<?php endif; ?>

						<ul class="news-form__parts">
								<li class="news-form__input form-select">
									<svg class="form-select__arw"><use xlink:href="#svg-icon-arw-sel"></use></svg>
									<?php

											$year      = null; // 年の初期化
											$args      = array( // クエリの作成
												'post_type' => 'news',
												'orderby' => 'date',
												'order'   => 'DESC',
												'posts_per_page' => -1,
											);
											$the_query = new WP_Query( $args ); if ( $the_query->have_posts() ) {
												echo '<select name="years" id="js-year-select" class="form-select__sel">';
												echo '<option value="">過去のお知らせ</option>';
												while ( $the_query->have_posts() ) :
													$the_query->the_post(); // ループの開始
													if ( $year != get_the_date( 'Y' ) && $now_year != get_the_date( 'Y' ) ) {
																	$selected = '';
																	$year     = get_the_date( 'Y' );
														if ( $year == $session_news_year ) {

																$selected = 'selected';
														}
																	echo '<option value="' . $year . '" ' . $selected . '>' . $year . '年</>';
													}
											endwhile;
												echo '</select>';
												wp_reset_postdata();
											}
											?>
								</li>
								<li class="news-form__input form-select">
											 <svg class="form-select__arw"><use xlink:href="#svg-icon-arw-sel"></use></svg>
											<?php


											$arg        = array(
												'orderby'  => 'term_order',
												'taxonomy' => 'tax_news_kind',
											);
											$categories = get_terms( 'tax_news_kind', $arg );


											if ( $categories ) {
												$cat_selct  = '<select name="tax" class="form-select__sel">';
												$cat_selct .= '<option value="" >カテゴリーから探す</option>';
												foreach ( $categories as $category ) {

														$selected = '';
														// echo $category->term_id . '<br>';
													if ( $category->slug == $session_news_tax ) {

														$selected = 'selected';
													}
														$cat_selct .= '<option value="' . esc_attr( $category->slug ) . '" ' . $selected . ' >' . esc_html( $category->name ) . '</option>';

												}
												$cat_selct .= '</select>';
												echo $cat_selct;
											}
											?>
								</li>
								<li class="news-form__submit">
											<button type="submit" class="c-btn news-form__btn">絞り込む</button>
								</li>
						</ul>
					</div>
			</div>
			<!-- ./inner -->
	</div>
	<!-- ./form -->
</form>

<?php if ( wp_is_mobile() ) : ?>
			<h2 class="news-now-date-sp">
				<?php if ( ! empty( $session_news_year ) ) : ?>
										<?php echo esc_html( $session_news_year ); ?>
												   <?php
										else :
											?>
											2021<?php endif; ?>年
			</h2>
<?php endif; ?>

	<?php
	if ( $news_query->have_posts() ) :
		;
		?>
<section class="p-news news-archive">
	<div class="l-inner">
			<div class="p-news__col news-archive__col">
				<?php
				while ( $news_query->have_posts() ) :
					$news_query->the_post();
					?>

					<article class="p-news__post news-archive__post">
						<a href="<?php the_permalink(); ?>" class="p-news__link">
							<div class="p-news__thumb news-archive__thumb">
								 <?php get_template_part( 'inc/thumbnail' ); ?>
							</div>
							<div class="p-news__content news-archive__content">
								<?php
														$news_taxonomys = get_the_terms( $post->ID, 'tax_news_kind' );
								?>
								<p class="p-news__top news-archive__top">

														<?php foreach ( $news_taxonomys as $news_taxonomy ) : ?>
															<span class="p-news__tax">
																<?php echo esc_html( $news_taxonomy->name ); ?>
															</span>
														<?php endforeach; ?>

								</p>
								<h3 class="p-news__ttl news-archive__ttl"><?php the_title(); ?></h3>
								<p class="p-news__desc news-archive__desc"><?php the_excerpt(); ?></p>
								<p class="news-archive__date">
									<time datetime="<?php echo get_the_date( 'Y年Md日' ); ?>"><?php echo get_the_date( 'Y年Md日' ); ?></time>
								</p>
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

			<?php else : ?>
						<p class="p-news__not-find">記事がありません</p>
			<?php endif; ?>
<?php
get_footer();?>
