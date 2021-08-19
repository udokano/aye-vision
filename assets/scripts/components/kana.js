import $ from 'jquery';
import autoKana from '../lib/autoKana.js';


jQuery(function () {
    jQuery.fn.autoKana('#name1', '#name3', {
        katakana: true, //true：カタカナ、false：ひらがな（デフォルト）
    });
    jQuery.fn.autoKana('#name2', '#name4', {
        katakana: true, //true：カタカナ、false：ひらがな（デフォルト）
    });
});
