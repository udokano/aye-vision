<script defer>
window.addEventListener( 'load', function(){
/* お客様情報入力ページ */
jQuery(function () {
    jQuery("#customer_pref option:first-child").val("");
    jQuery("form").validationEngine('attach', {
    promptPosition:"topLeft"
  });
    jQuery("#mailaddress1").addClass("validate[required]");
    jQuery("#mailaddress2").addClass("validate[required,equals[mailaddress1]]");
    jQuery("#name1").addClass("validate[required]");
    jQuery("#name2").addClass("validate[required]");
    jQuery("#tel").addClass("validate[required]");
    jQuery("#zipcode").addClass("validate[required]");
    jQuery("#customer_pref").addClass("validate[required]");
    jQuery("#address1").addClass("validate[required]");
     jQuery("#address2").addClass("validate[required]");
});

/* jQuery(function () {

    jQuery("#customer_form").validationEngine('attach', {
    promptPosition:"topRight"
  });
    jQuery("#mailaddress1").addClass("validate[required]");
    jQuery("#mailaddress2").addClass("validate[required,equals[mailaddress1]]");
    jQuery("#pass01").addClass("validate[required]");
    jQuery("#pass02").addClass("validate[required,equals[pass01]]");
    jQuery("#name1").addClass("validate[required]");
    jQuery("#name2").addClass("validate[required]");
    jQuery("#tel").addClass("validate[required]");
});
 */
/*
戻るボタン押したらバリデーション無効化する
-------------*/
jQuery(".back_cart_button").on("click", function () {
    jQuery("input,select").removeClass("validate[required]");
   jQuery("input").removeClass("validate[required,equals[mailaddress1]]");
   //  jQuery("input").removeClass("validate[required,equals[pass01]]");
});

jQuery(".back_to_customer_button").on("click", function () {
    jQuery("input,select").removeClass("validate[required]");
   jQuery("input").removeClass("validate[required,equals[mailaddress1]]");
   //  jQuery("input").removeClass("validate[required,equals[pass01]]");
});

});
</script>
