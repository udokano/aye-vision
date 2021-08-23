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

<?php if ( is_page( 'shop-info-eng' ) ) : ?>
<footer class="l-footer">
	<div class="l-inner l-footer__inner l-footer-inner-lang">
			<div class="l-footer__left l-footer-info  l-footer-inner-lang__left">


                    <p class="u-pc-hidden l-footer-info__sp-heading">If you are looking for contact lenses in Hanabata, Adachi-ku (near Takenotsuka Station), leave it to Eye-Vision.</p>


				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-footer-info__logo">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_logo_footer.svg" alt="アイ・ビジョン" class="">
				</a>

				<a href="tel:03-3885-3177" class="shop-info__tel">
												<span class="shop-info__sub">TEL</span>
												<span class="shop-info__number">03-3885-3177</span>
												<p class="u-pc-hidden l-footer-info__sp-time">Business hours: 9:00-19:00 Closed on Wednesdays and national holidays</p>
				</a>

				<p class="l-footer-info__pc-copy u-sp-hidden">Copyright (c) EYE VISION All rights reserved.</p>
			</div>
			<!-- ./left -->


			<ul class="l-footer__right l-footer-nav  l-footer-inner-lang__right">
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3" class="l-footer-nav__link">reserve</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="l-footer-nav__link">news</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>item-info" class="l-footer-nav__link">Product Info</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide" class="l-footer-nav__link">First time user</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq" class="l-footer-nav__link">FAQ</a>
                </li>
                	<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog" class="l-footer-nav__link">Blog</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info" class="l-footer-nav__link">Store Guide</a>
                </li>
                 <li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info-eng" class="l-footer-nav__link">Store Guide(English)</a>
                </li>
                <li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info-ch" class="l-footer-nav__link">Store Guide(China)</a>
				</li>

				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>recruit" class="l-footer-nav__link">Recruit</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="http://yokoyama-ganka.jp/" class="l-footer-nav__link" target="_blank">Lift Eye</a>
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
				<p class="l-foot-tel__guide">Time 9：00～19：00<br>Closed on Wednesdays and national holidays</p>
		</a>
	</li>
	<li class="l-foot-action__item l-foot-reserve">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3" class="l-foot-action__link l-foot-reserve__link" target="_blank">
			   <p class="l-foot-reserve__text">reserve</p>
		</a>
	</li>
	<li class="l-foot-action__item l-foot-line">
		<a href="https://page.line.me/lqk5945j?openQrModal=true" class="l-foot-action__link l-foot-line__link" target="_blank">
				<svg class="l-foot-line__icon"><use xlink:href="#svg-icon-line"></use></svg>
		</a>
	</li>
</ul>
<?php endif; ?>

<?php if ( is_page( 'shop-info-ch' ) ) : ?>
<footer class="l-footer">
	<div class="l-inner l-footer__inner l-footer-inner-lang">
			<div class="l-footer__left l-footer-info  l-footer-inner-lang__left">


                <p class="u-pc-hidden l-footer-info__sp-heading">如果您要在足立区花畑（竹冢站附近）寻找隐形眼镜，请交给Eye-Vision。</p>


				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-footer-info__logo">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/common/c_logo_footer.svg" alt="アイ・ビジョン" class="">
				</a>

				<a href="tel:03-3885-3177" class="shop-info__tel">
												<span class="shop-info__sub">TEL</span>
												<span class="shop-info__number">03-3885-3177</span>
												<p class="u-pc-hidden l-footer-info__sp-time">营业时间。9:00-19:00 周三和国定假日休息</p>
				</a>

				<p class="l-footer-info__pc-copy u-sp-hidden">Copyright (c) EYE VISION All rights reserved.</p>
			</div>
			<!-- ./left -->


			<ul class="l-footer__right l-footer-nav  l-footer-inner-lang__right">
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3" class="l-footer-nav__link">储备</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="l-footer-nav__link">新闻</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>item-info" class="l-footer-nav__link">产品信息</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>guide" class="l-footer-nav__link">第一次使用</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>faq" class="l-footer-nav__link">常见问题</a>
                </li>
                <li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog" class="l-footer-nav__link">博客</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info" class="l-footer-nav__link">商店指南</a>
                </li>
                 <li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info-eng" class="l-footer-nav__link">商店指南(英语)</a>
                </li>
                <li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop-info-ch" class="l-footer-nav__link">商店指南(中国)</a>
				</li>

				<li class="l-footer-nav__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>recruit" class="l-footer-nav__link">招聘</a>
				</li>
				<li class="l-footer-nav__item">
					<a href="http://yokoyama-ganka.jp/" class="l-footer-nav__link" target="_blank">抬眼</a>
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
				<p class="l-foot-tel__guide">时间：9：00～19：00<br>周三及国定假日休息</p>
		</a>
	</li>
	<li class="l-foot-action__item l-foot-reserve">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve?services=3" class="l-foot-action__link l-foot-reserve__link" target="_blank">
			   <p class="l-foot-reserve__text">招聘</p>
		</a>
	</li>
	<li class="l-foot-action__item l-foot-line">
		<a href="https://page.line.me/lqk5945j?openQrModal=true" class="l-foot-action__link l-foot-line__link" target="_blank">
				<svg class="l-foot-line__icon"><use xlink:href="#svg-icon-line"></use></svg>
		</a>
	</li>
</ul>
<?php endif; ?>
</div>
<!-- ./l-wrapper -->
<script>
  (function(d) {
	var config = {
	  kitId: 'tdr0hhf',
	  scriptTimeout: 3000,
	  async: true
	},
	h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
	<script>


		document.addEventListener("DOMContentLoaded", function() {
			var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

			if ("IntersectionObserver" in window) {
				let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
				entries.forEach(function(entry) {
					if (entry.isIntersecting) {
					let lazyImage = entry.target;
					lazyImage.src = lazyImage.dataset.src;
					if (typeof lazyImage.dataset.srcset === "undefined") {
					}else{
						lazyImage.srcset = lazyImage.dataset.srcset;
					}
					lazyImage.classList.remove("lazy");
					lazyImageObserver.unobserve(lazyImage);
					}
				});
				});

				lazyImages.forEach(function(lazyImage) {
				lazyImageObserver.observe(lazyImage);
				});
			} else {
				// Possibly fall back to a more compatible method here
			}
        });



	</script>

</body>
<?php wp_footer(); ?>



<script>

	$(function () {

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

		 //console.log(btnHref);
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

				//console.log("成功");
				console.log(currentCat);
			}
		});
	});
});

	</script>

	<script>

	$(function () {
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


				console.log("成功");
				console.log(currentCat);
			}
		});
	});
});

	</script>

	<?php if ( is_single() && in_category( 'item' ) || is_page( 'usces-cart' ) ) : ?>
		<?php get_template_part( 'inc/validation' ); ?>
	<?php endif; ?>
