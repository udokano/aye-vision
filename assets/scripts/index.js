/**
 *
 * プラグイン・ライブラリの読み込み
 */

import $ from 'jquery';
import cookie from 'jquery.cookie';

//import imagemapresizer from 'image-map-resizer';
// tslint:disable-next-line:no-var-requires
//const foobar = require('image-map-resizer');
// こちらはCSSファイル読み込みのimport
import 'slick-carousel/slick/slick.css';
import 'slick-carousel';


import Vue from 'vue';
import Slick from 'vue-slick';



/**
 *
 * JSのモジュールを読み込む
 */


/* ライブラリー */

import lazyLoad from './lib/lazy.js';

import autoKana from './lib/autoKana.js';

/* コンポーネント */

import vueSlide from './slide/top-slide.js';

import lazyLoadAction from './components/IntersectionObserver.js';

import kana from './components/kana.js';

import fontSize from './components/fontSize.js';

import anchor from './components/anchor-link.js';

import pageTop from './components/page-top.js';

import hamburger from './components/hamburger.js';

import tab from './components/tab.js';

import modal from './components/modal.js';

import accordion_qa_vue from './components/accordion-qa.js';

/* ページ独自 */

import reserve from './page/reserve.js';
