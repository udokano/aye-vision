import Vue from 'vue';
//import isMobile from 'ismobilejs';
//var isSmartPhone = isMobile.phone;
if (window.matchMedia("(max-width: 768px)").matches) {
    new Vue({
        el: "#js-app-header",
        data: {
            open: false,
            show: false,
        },
        methods: {
            navOpen: function () {


                this.open = !this.open;
                this.show = !this.show;


            }
        }
    });
}
