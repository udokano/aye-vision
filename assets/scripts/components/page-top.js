import Vue from 'vue';
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
