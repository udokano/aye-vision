import Vue from 'vue';


const pageTopElm = document.getElementById('js-app-page-top');

if (pageTopElm !== null) {
    new Vue({
        el: '#js-app-page-top',
        methods: {
            scrollTop: function () {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }
        }
    })
}
