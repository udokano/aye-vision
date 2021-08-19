import $ from 'jquery';

$(function () {
    $('.js-modal-open').each(function () {
        $(this).on('click', function () {
            var target = $(this).data('target');
            var modal = document.getElementById(target);
            $(modal).addClass("is-modal-open");
            $("body").addClass("is-of-hidden");
            return false;
        });
    });
    $('.js-modal-close').on('click', function () {
        $('.js-modal').removeClass("is-modal-open");
        $("body").removeClass("is-of-hidden");
        return false;
    });
});

/**
 * TOPの商品一覧用
 */


$(function () {

    $(document).on('click', '.js-item-modal', function (e) {
        var itemName = $(this).data('name');
        var url = $(this).data('url');
        var reserveUrl = $("#js-reserve-link").attr("href")
        var reserveUrlSplit = reserveUrl.split("=");
        var reserveUrlReplace = reserveUrl.replace(reserveUrlSplit[2], itemName);
        console.log(reserveUrlSplit);
        $("#js-modal-item").addClass("is-modal-open");
        $("#js-ec-link").attr("href", url);
        $("#js-reserve-link").attr("href", reserveUrlReplace);
        $("body").addClass("is-of-hidden");
        return false;
    });

    $('.js-modal-close').on('click', function () {
        $('.js-modal').removeClass("is-modal-open");
        $("body").removeClass("is-of-hidden");
        return false;
    });
});
