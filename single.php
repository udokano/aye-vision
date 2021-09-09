<?php get_header(); ?>
<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog-list" class="l-breadcrumb__link">ブログ</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="" class="l-breadcrumb__link"><?php the_title(); ?></a>
		</li>
	</ul>
</div>
<!-- ./l-breadcrumb -->

<section class="p-sec  p-single">
	<div class="l-inner p-sec__inner p-single__inner">
			<div class="p-sec-col02 ">
				<h2 class="c-ttl-vertical p-sec-col02__heading  p-single__ttl">
					 <span class="c-ttl-vertical__eng p-single__eng">BLOG</span>
					<span class="c-ttl-vertical__main">ブログ</span>
				</h2>
				<div class="p-sec-col02__contents p-single__content">
					<h1 class="p-single__blog-ttl"><?php the_title(); ?></h1>
					<p class="p-single__info">
						<span class="p-single__date">
							<time datetime="<?php echo get_the_date( 'Y年Md日' ); ?>"><?php echo get_the_date( 'Y年Md日' ); ?></time>
						</span>
						<span class="p-single__clinic">スタッフ</span>
					</p>

					<div class="p-single-content c-cms">
						<?php the_content(); ?>
					</div>
				</div>
				<!-- ./contents -->
			</div>
			<!-- ./col02 -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog-list" class="c-btn p-single__btn">ブログ一覧へ戻る</a>
	</div>
	<!-- ./inner -->

</section>




<?php
get_footer();
