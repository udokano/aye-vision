/**
 * 共用のスクリプトスタイルを指定
 *
 */


/* 定数定義 */

const header = jQuery('#js-header');

const headerHight = jQuery('#js-header').outerHeight(); //ヘッダの高さ

const toggleBtn = jQuery('#js-toggle');

const globalNav = jQuery('#js-global-nav');

const spNavLink = jQuery('.js-sp-nav-link');

const topSpaceElm = jQuery('#js-top-space');

const logoElm = jQuery('#js-logo').outerHeight();



/*

ヘッダースクロール
------------------------------------*/

$(window).on("scroll", function () {
    var nowPosition = $(window).scrollTop();
    if (nowPosition > 150) {
        header.addClass("is-change");
    }

    else {
        header.removeClass("is-change");
    }

});


/*

ヘッダー分余白
------------------------------------*/

topSpaceElm.css("margin-top", headerHight + logoElm + "px");


/*

ハンバーガー
------------------------------------*/

toggleBtn.on("click", function () {
    $(this).toggleClass("is-open");
    globalNav.toggleClass("is-open");
    globalNav.css("top", headerHight + "px");
});

spNavLink.on("click", function () {
    toggleBtn.removeClass('is-open');
    globalNav.removeClass('is-open');
});


/*
TAB MENU
-------------------------------------*/

jQuery('.js-tab-btn').click(function () {
    //セレクタ設定
    var thisElm = jQuery(this);
    var thisTabWrap = thisElm.parents('.js-tab-wrap');
    var thisTabBtn = thisTabWrap.find('.js-tab-btn');
    var thisTabContents = thisTabWrap.find('.js-tab-contents');

    //current class
    var currentClass = 'is-tab-active';

    //js-tab-btn current 切り替え
    thisTabBtn.removeClass(currentClass);
    thisElm.addClass(currentClass);

    //クリックされた tabが何番目か取得
    var thisElmIndex = thisTabBtn.index(this);

    //js-tab-contents 切り替え
    thisTabContents.removeClass(currentClass);
    thisTabContents.eq(thisElmIndex).addClass(currentClass);
});


/*
読み込み完了してからのアンカーリンク
-------------------------------------*/


var urlHash = location.hash;
if (urlHash) {
    jQuery('body,html').stop().scrollTop(0);
    setTimeout(function () {
        var target = $(urlHash);
        var position = target.offset().top - headerHight;
        $('body,html').stop().animate({ scrollTop: position }, 500);
    }, 100);

    jQuery(window).on('load', function () {
        var target = jQuery(urlHash);
        var position = target.offset().top - headerHight;
        jQuery('body,html').stop().animate({ scrollTop: position }, 500);

    });

}



/*
ANCHOR LINK PC and SP
-------------------------------------*/

jQuery('a[href^="#"]').click(function () {

    /* ウィンドウサイズが 768px以下の場合のコードをここに */

    // スクロールの速度（ミリ秒）
    var speed = 400;
    // アンカーの値取得 リンク先（href）を取得して、hrefという変数に代入
    var href = jQuery(this).attr('href');
    // 移動先を取得 リンク先(href）のidがある要素を探して、targetに代入
    var target = jQuery(href == '#' || href == '' ? 'html' : href);
    // 移動先を調整 idの要素の位置をoffset()で取得して、positionに代入
    var position = target.offset().top - headerHight;
    // スムーススクロール linear（等速） or swing（変速）
    jQuery('body,html').animate({ scrollTop: position }, speed, 'swing');
    return false;
});

/*
page top
-------------------------------------*/


if ($("#js-page-top").length) {
    var scrollElm = $("#js-page-top");



    $(window).on("scroll", function () {
        var nowScroll = $(window).scrollTop();
        var aboutTop = $("#js-about-top").offset().top;
        //console.log(nowScroll);
        //console.log(aboutTop);
        var documentHight = $(document).innerHeight();
        var windowHight = $(window).innerHeight();
        var pageBottomPos = documentHight - windowHight;
        var footerPos = $(".l-footer").offset().top;
        var footerHight = $(".l-footer").outerHeight();
        //console.log(nowScroll + windowHight);
        //console.log(footerPos - footerHight);
        if (nowScroll > aboutTop) {
            scrollElm.addClass("is-fixed");
            if (nowScroll === pageBottomPos) {
                scrollElm.removeClass("is-fixed");
            }
        }

        else {
            scrollElm.removeClass("is-fixed");
        }
    });

}




/*
MX FORM エラースクロール
-------------------------------------*/


if ($('.mw_wp_form .error')[0]) {


    var errorEl = $('.mw_wp_form .error').eq(0);
    var position = errorEl.parent().offset().top;
    //$('body,html').delay(500).animate({ scrollTop: position - 40 }, 600, 'swing');

    $(window).on('load', function (e) {
        $.when(
            $("html, body").animate({
                scrollTop: position
            }, 400, "swing"),
            e.preventDefault(),
        ).done(function () {
            var diff = errorEl.offset().top;
            if (diff === position) {
            } else {
                $("html, body").animate({
                    scrollTop: diff - headerHight
                }, 10, "swing");
            }
        });
    });
}
