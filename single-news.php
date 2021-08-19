<?php get_header(); ?>
<div class="l-breadcrumb">
	<ul class="l-inner l-breadcrumb__list">
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-breadcrumb__link">アイ・ビジョンTOP</a>
		</li>
		<li class="l-breadcrumb__item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="l-breadcrumb__link">お知らせ</a>
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
					 <span class="c-ttl-vertical__eng p-single__eng">NEWS</span>
					<span class="c-ttl-vertical__main">お知らせ</span>
				</h2>
				<div class="p-sec-col02__contents p-single__content">
					<h1 class="p-single__blog-ttl"><?php the_title(); ?></h1>
					<p class="p-single__info">
						<span class="p-single__date">
							<time datetime="<?php echo get_the_date( 'Y年Md日' ); ?>"><?php echo get_the_date( 'Y年Md日' ); ?></time>
						</span>
						<span class="p-single__clinic">中村眼科クリニック</span>
                    </p>

                    <?php
					if ( get_field( 'news_heading_img' ) ) :
						?>
						<div class="p-single-content__thumb">
							<img <?php echo esc_attr( DUMMY ); ?> data-src='<?php echo esc_url( the_field( 'news_heading_img' ) ); ?>' alt='' class='lazy u-object-fit u-radius-50'>
						</div>
					<?php endif; ?>

					<div class="p-single-content c-cms">


						<?php the_content(); ?>
					</div>
				</div>
				<!-- ./contents -->
			</div>
			<!-- ./col02 -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="c-btn p-single__btn">お知らせ一覧へ戻る</a>
	</div>
	<!-- ./inner -->

</section>




<?php
get_footer();
