import $ from 'jquery';
import cookie from 'jquery.cookie';


$(function ($) {
    //変数にクッキー名を入れる
    var history = $.cookie('fontSize');
    //適用する箇所を指定。今回は部分的に#test内のpに
    var elm = $('html');
    //変数が空ならfontMを、空でなければクッキーに保存しておいたものを適用
    if (!history) {
        elm.addClass('is-font-size-m');
        $('#is-font-size-m').addClass('is-active');
    } else {
        elm.addClass(history);
        $('#' + history).addClass('is-active');
    }
    //ボタンをクリックしたら実行
    $('.js-font-size-change').click(function () {
        //activeでないボタンだった場合のみ動作
        if (!$(this).hasClass('is-active')) {
            //現在activeのついているclassを削除
            $('.is-active').removeClass('is-active');
            //クリックしたボタンをactive
            $(this).addClass('is-active');
            //クリックした要素のID名を変数にセット
            var setFontSize = this.id;
            //クッキーに変数を保存
            $.cookie('fontSize', setFontSize, { path: '/' });
            //一度classを除去して、変数をclassとして追加
            elm.removeClass("is-font-size-l is-font-size-m is-font-size-s");
            elm.addClass(setFontSize);
        }
    });
});
