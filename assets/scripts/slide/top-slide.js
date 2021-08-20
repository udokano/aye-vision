
import $ from 'jquery';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel';
import Vue from 'vue';
import Slick from 'vue-slick';

const topSlideElm = document.getElementById('app-top-slide');

if (topSlideElm !== null) {


    var appTopSlide = new Vue({
        components: { Slick },
        el: '#app-top-slide',
        data: {
            slickOptions: {
                autoplay: true,
                autoplaySpeed: 8000,
                slidesToShow: 1,
                pauseOnHover: false,
                pauseOnDotsHover: false,
                dots: true,
                centerMode: true,
                centerPadding: '10.35%',
                slidesToScroll: 1,
                arrows: true,
                //lazyLoad: 'ondemand',// or 'progressive'
                initialSlide: 1,
                prevArrow: '<div class="l-key-visual-arw l-key-visual-arw--prev"></div>',
                nextArrow: '<div class="l-key-visual-arw l-key-visual-arw--next"></div>',
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            centerPadding: '5%',
                            //adaptiveHeight: true
                        }
                    },
                ]
            },

        },
    });
}
