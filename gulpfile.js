var gulp = require('gulp');
var sass = require('gulp-sass'); //Sassコンパイル
var plumber = require('gulp-plumber'); //エラー時の強制終了を防止
var notify = require('gulp-notify'); //エラー発生時にデスクトップ通知する
var sassGlob = require('gulp-sass-glob'); //@importの記述を簡潔にする
var browserSync = require('browser-sync').create(); //ブラウザ反映
var postcss = require('gulp-postcss'); //autoprefixerとセット
var autoprefixer = require('autoprefixer'); //ベンダープレフィックス付与
var cssdeclsort = require('css-declaration-sorter'); //css並べ替え
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var mozjpeg = require('imagemin-mozjpeg');
var replace = require('gulp-replace');
var sourcemaps = require('gulp-sourcemaps');
// gulp-penthouseの読み込み.
const criticalCss = require('gulp-penthouse');
const crypto = require('crypto');
const hash = crypto.randomBytes(8).toString('hex');

const webpackStream = require('webpack-stream');
const webpack = require('webpack');
const webpackConfig = require('./webpack.config');


/*
WP用

動的サイトでも自動リロードさせる

-----------------------------------------*/


// scssのコンパイル
gulp.task('sass', function () {
    return gulp
        .src('./assets/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))//エラーチェック
        .pipe(sassGlob())//importの読み込みを簡潔にする
        .pipe(sass({
            outputStyle: 'compressed' //expanded, nested, campact, compressedから選択
        }))
        .pipe(postcss([autoprefixer(
            {
                // ☆IEは11以上、Androidは4.4以上
                // その他は最新2バージョンで必要なベンダープレフィックスを付与する
                browsers: ["last 2 versions", "ie >= 11", "Android >= 4"],
                cascade: false
            }
        )]))
        .pipe(postcss([cssdeclsort({ order: 'alphabetically' })]))//プロパティをソートし直す(アルファベット順)
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./dist/css/'));//コンパイル後の出力先
});

//エディタースタイル用

gulp.task('sass-edit', function () {
    return gulp
        .src('./assets/editor/*.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))//エラーチェック
        .pipe(sassGlob())//importの読み込みを簡潔にする
        .pipe(sass({
            outputStyle: 'compressed' //expanded, nested, campact, compressedから選択
        }))
        .pipe(postcss([autoprefixer(
            {
                // ☆IEは11以上、Androidは4.4以上
                // その他は最新2バージョンで必要なベンダープレフィックスを付与する
                browsers: ["last 2 versions", "ie >= 11", "Android >= 4"],
                cascade: false
            }
        )]))
        .pipe(postcss([cssdeclsort({ order: 'alphabetically' })]))//プロパティをソートし直す(アルファベット順)
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./admin/css/'));//コンパイル後の出力先
});

// criticalCssのタスク.
gulp.task('critical-css', () => {
    return gulp
        .src('./dist/css/style.css') // cssを読み込む.
        .pipe(
            criticalCss({
                out: 'critical.css', // 生成するCritical CSSのファイル名を指定.
                url: 'http://ayevision.local/', // 対象ページのURL.
                width: 18000, // 横幅.
                height: 50000, // 縦幅.
                userAgent:
                    'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' // UA指定.
            })
        )
        // .pipe(replace('../', '//cofus.work/assets/')) // 置換（開発環境と本番環境でURL置換が必要な場合はここで置換しておく）
        .pipe(postcss([autoprefixer(
            {
                precision: 1,
                outputStyle: 'compressed'
            }
        )]))
        .pipe(gulp.dest('./dist/css/critical.css'));//コンパイル後の出力先
});

gulp.task('bundle', function () {

    return webpackStream(webpackConfig, webpack)
        .pipe(gulp.dest('./dist/'));
});

// 保存時のリロード
gulp.task('browser-sync', function (done) {
    const browserSyncOption = {
        proxy: "http://ayevision.local/"
    }
    browserSync.init(browserSyncOption)
    done()
});



gulp.task('bs-reload', function (done) {
    browserSync.reload();
    done()
});

gulp.task('cache', function () {
    return gulp.src([
        './',
        '**.php'
    ])
        .pipe(replace('.css"', '.css?' + hash + '"'))
        .pipe(replace('.js"', '.js?' + hash + '"'))
        .pipe(replace('.jpg"', '.jpg?' + hash + '"'))
        .pipe(replace('.png"', '.png?' + hash + '"'))
        .pipe(replace('.gif"', '.gif?' + hash + '"'))
        .pipe(gulp.dest("./"))
});



// 監視
gulp.task('watch', function (done) {
    gulp.watch('./assets/editor/*.scss', gulp.task('sass-edit'));
    gulp.watch('./assets/editor/*.scss', gulp.task('bs-reload'));
    gulp.watch('./assets/scss/**/*.scss', gulp.task('sass'));
    gulp.watch('./assets/scss/**/*.scss', gulp.task('bs-reload'));
    gulp.watch('./assets/scripts/*.js', gulp.task('bs-reload'));
    gulp.watch('./assets/scripts/**', gulp.task('bundle'));
    //gulp.watch('./**.php', gulp.task('cache'));
    done()
});

// default
gulp.task('default', gulp.series(gulp.parallel('browser-sync', 'watch')));

//圧縮率の定義
var imageminOption = [
    pngquant({ quality: [0.7, 0.85], }),
    mozjpeg({ quality: 85 }),
    imagemin.gifsicle({
        interlaced: false,
        optimizationLevel: 1,
        colors: 256
    }),
    imagemin.jpegtran(),
    imagemin.optipng(),
    imagemin.svgo()
];
// 画像の圧縮
// $ gulp imageminで./src/img/base/フォルダ内の画像を圧縮し./src/img/フォルダへ
// .gifが入っているとエラーが出る
gulp.task('imagemin', function () {
    return gulp
        .src('./assets/images/**/*.{png,jpg,gif,svg}')
        .pipe(imagemin(imageminOption))
        .pipe(gulp.dest('./dist/images/'));
});
