<?php if ( ! wp_is_mobile() && is_home() && is_front_page() ) : ?>

<div class="l-page-top">
	<a href="#" class="l-page-top__link"><svg class="l-page-top__icon"><use xlink:href="#svg-icon-page-top"></use></svg></a>
</div>
<!-- ./page-top -->

<?php endif; ?>


<?php if ( ! is_home() && ! is_front_page() ) : ?>

<div class="l-page-top" id="js-app-page-top">
	<i  class="l-page-top__link" @click="scrollTop"><svg class="l-page-top__icon"><use xlink:href="#svg-icon-page-top"></use></svg></i>
</div>
<!-- ./page-top -->

<?php endif; ?>


<footer class="l-footer">
	<div class="l-inner l-footer__inner">
			<div class="l-footer__left l-footer-info">
				<?php if ( is_home() || is_front_page() ) : ?>
						<h1 class="u-pc-hidden l-footer-info__sp-heading">足立区花畑(竹ノ塚駅近辺)でコンタクトをお探しならアイ・ビジョンにお任せください。</h1>
				<?php else : ?>
							<p class="u-pc-hidden l-footer-info__sp-heading">足立区花畑(竹ノ塚駅近辺)でコンタクトをお探しならアイ・ビジョンにお任せください。</p>
				<?php endif; ?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-footer-info__logo">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_logo_footer.svg" alt="アイ・ビジョン" class="">
				</a>

				<a href="tel:03-3885-3177" class="shop-info__tel">
												<span class="shop-info__sub">TEL</span>
												<span class="shop-info__number">03-3885-3177</span>
												<p class="u-pc-hidden l-footer-info__sp-time">営業時間  9：00～19：00  　定休日  水曜・祝日</p>
				</a>

				<p class="l-footer-info__pc-copy u-sp-hidden">Copyright (c) EYE VISION All rights reserved.</p>
			</div>
			<!-- ./left -->
			<ul class="l-footer__center l-footer-table">
					<li class="l-footer-table__item c-table-footer">
						 <?php get_template_part( 'inc/table-info01' ); ?>
					</li>
					<!-- ./item -->
					<li class="l-footer-table__item c-table-footer">
						 <?php get_template_part( 'inc/table-info02' ); ?>
					</li>
					<!-- ./item -->
			</ul>

			<ul class="l-footer__right l-footer-nav">
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3" class="l-footer-nav__link">来店ご予約</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="l-footer-nav__link">お知らせ</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>item-info" class="l-footer-nav__link">商品情報</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide" class="l-footer-nav__link">初めての方</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq" class="l-footer-nav__link">よくある質問</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog" class="l-footer-nav__link">ブログ</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info" class="l-footer-nav__link">店舗案内</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info-eng" class="l-footer-nav__link">店舗案内(英語)</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info-ch" class="l-footer-nav__link">店舗案内(中国)</a>
				</li>

				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>recruit" class="l-footer-nav__link">採用情報</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="http://yokoyama-ganka.jp/" class="l-footer-nav__link" target="_blank">提携眼科</a>
				</li>

			</ul>
	</div>
	<!-- ./inner -->
	<p class="l-footer__sp-copy u-pc-hidden"><small>Copyright (c) EYE VISION All rights reserved.</small></p>
</footer>

<ul class="l-foot-action" id="js-app-action">
	<li class="l-foot-action__item l-foot-tel">
		<a href="tel:03-3885-3177" class="l-foot-action__link l-foot-tel__link" target="_blank">
				<p class="l-foot-tel__number">03-3885-3177</p>
				<p class="l-foot-tel__guide">営業時間  9：00～19：00<br>定休日 水曜・祝日</p>
		</a>
	</li>
	<li class="l-foot-action__item l-foot-reserve">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3" class="l-foot-action__link l-foot-reserve__link" target="_blank">
			   <p class="l-foot-reserve__text">来店ご予約</p>
		</a>
	</li>
	<li class="l-foot-action__item l-foot-line">
		<a href="https://page.line.me/lqk5945j?openQrModal=true" class="l-foot-action__link l-foot-line__link" target="_blank">
				<svg class="l-foot-line__icon"><use xlink:href="#svg-icon-line"></use></svg>
		</a>
	</li>
</ul>

</div>
<!-- ./l-wrapper -->
<script defer>
  (function(d) {
	var config = {
	  kitId: 'tdr0hhf',
	  scriptTimeout: 3000,
	  async: true
	},
	h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>

</body>
<?php wp_footer(); ?>



<script defer>

	window.addEventListener( 'load', function(){

	$(".js-item-ajax").eq(0).addClass('is-active');
	$(".js-item-ajax").on("click", function () {
		var currentCat = $(this).attr("data-slug");
		var btnElm = $("#js-ajax-link-toggle");
		 //var btnHref = btnElm.attr("href");
		 //var btnSplit = btnElm.attr("href").split('=');
		 //var split = btnHref.replace(btnSplit[1],currentCat);

					if("1day" == currentCat) {
							btnElm.attr("href","<?php echo esc_url( home_url( '/' ) ); ?>item/?item_cat=1day");
					}

					 if("2week" == currentCat) {
							btnElm.attr("href","<?php echo esc_url( home_url( '/' ) ); ?>item/?item_cat=2week");
					}

					 if("care" == currentCat) {
							btnElm.attr("href","<?php echo esc_url( home_url( '/' ) ); ?>item-normal/?item_cat=care");
					}


		$(".js-item-ajax").removeClass("is-active");
		  $(this).addClass('is-active');
		$.ajax({
			type: "POST",
			url: "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/ajax-item-loop-top.php",
			data: {
				current_cat: currentCat,
			},
			success: function (response) {
				jQuery("#js-item-ajax").html(response);
				// btnElm.attr("href",split);
			}
		});
	});
});

	</script>

	<script defer>

	 window.addEventListener( 'load', function(){
	$(".js-item-ajax-btn").on("click", function () {

		var currentCat = $(this).attr("data-slug");

		var params = (new URL(document.location)).searchParams;
		var urlCat = params.get('item_cat');
		$(".js-item-ajax-btn").removeClass("is-active");
		  $(this).addClass('is-active');
		$.ajax({
			type: "POST",
			url: "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/ajax-item-loop-list.php",
			data: {
				current_cat: currentCat,
				item_cat: urlCat,
			},
			success: function (response) {
				jQuery("#js-item-ajax").html(response);
			}
		});
	});
});

	</script>

	<?php if ( is_single() && in_category( 'item' ) || is_page( 'usces-cart' ) ) : ?>
		<?php get_template_part( 'inc/validation' ); ?>
	<?php endif; ?>
