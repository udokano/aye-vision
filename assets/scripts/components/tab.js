import $ from 'jquery';
export default function tab() {
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
}
