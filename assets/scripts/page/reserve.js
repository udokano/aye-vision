import $ from 'jquery';


function getParam(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}



var selectOutWrapElm = $("#js-service-out-wrap");
var selectOutElm = $("#js-service-out");
var selectOutTextElm = $("#js-service-out-text");
var selectListElm = $("#js-service-list");
var selectItemElm = $(".js-service-item");



$(document).on("click", "#js-service-out", function (e) {
    selectListElm.toggleClass("is-list-show");
});

$(document).on("click", function (e) {
    if (!e.target.closest('#js-service-out,#js-service-list')) {
        selectListElm.removeClass("is-list-show");
    }
});

var position = selectOutWrapElm.offset().top;

$(document).on("click", ".js-service-item", function (e) {
    selectItemElm.removeClass("is-item-checked");
    var thisItemName = $(this).find('.js-select-text').text();
    $(this).addClass("is-item-checked");
    selectOutTextElm.text(thisItemName);
    $("#booking_package_input_servicetext").val(thisItemName);
    var selectOutElmElmHeight = selectOutElm.outerHeight();
    position = selectOutWrapElm.offset().top;
    selectListElm.removeClass("is-list-show");
    $("html, body").animate({
        scrollTop: position - selectOutElmElmHeight,
    }, 10, "swing");
});

$(window).on("load", function () {
    //$(".js-hidden").css("visibility","visible");
});

var paramValue = getParam('item');



const target = document.getElementById("booking-package_inputFormPanel");



/* 商品一覧のDOM移動 */

const observer = new MutationObserver(function () {

    //console.log(target.children.length);

    //observer.disconnect()
    selectOutWrapElm.insertAfter("#booking_package_value_servicetext");
    selectOutWrapElm.css("display", "block");
});

/* パラメーターがある場合には値と一致するものを選択済み+inputに値を入れる */

const observer02 = new MutationObserver(function () {

    selectItemElm.each(function () {
        var optionValue = $(this).data('name');
        console.log(optionValue);
        if (paramValue == optionValue) {
            selectItemElm.removeClass("is-item-checked");
            $(this).addClass("is-item-checked");
            selectOutTextElm.text(optionValue);
            $("#booking_package_input_servicetext").val(optionValue)
        }
    });
    observer02.disconnect()
});

/* observer.disconnect();
 observer.observe(target, config); */

const config = { childList: true };


// 監視実行
observer.observe(target, config);

observer02.observe(target, config);
