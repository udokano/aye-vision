
import $ from 'jquery';


var headerHight = $("#js-header").outerHeight();
var adjust = headerHight;
// #で始まるa要素をクリックした場合に処理
$('a[href^="#"]').click(function (e) {
    // 移動先を0px調整する。0を30にすると30px下にずらすことができる。


    console.log(adjust);
    // スクロールの速度（ミリ秒）
    var speed = 400;
    // アンカーの値取得 リンク先（href）を取得して、hrefという変数に代入
    var href = $(this).attr("href");
    // 移動先を取得 リンク先(href）のidがある要素を探して、targetに代入
    var target = $(href == "#" || href == "" ? 'html' : href);
    // 移動先を調整 idの要素の位置をoffset()で取得して、positionに代入
    var position = target.offset().top;
    // スムーススクロール linear（等速） or swing（変速）
    $.when(
        $("html, body").animate({
            scrollTop: position
        }, 400, "swing"),
        e.preventDefault(),
    ).done(function () {
        var diff = target.offset().top;
        if (diff === position) {
        } else {
            $("html, body").animate({
                scrollTop: diff,
            }, 10, "swing");
        }
    });
});


var urlHash = location.hash;
if (urlHash) {
    $('body,html').stop().scrollTop(0);
    setTimeout(function (e) {
        var target = $(urlHash);
        var position = target.offset().top;
        $.when(
            $("html, body").animate({
                scrollTop: position
            }, 400, "swing"),
            e.preventDefault(),
        ).done(function () {
            var diff = target.offset().top;
            if (diff === position) {
            } else {
                $("html, body").animate({
                    scrollTop: diff,
                }, 10, "swing");
            }
        });
    }, 100);
}
