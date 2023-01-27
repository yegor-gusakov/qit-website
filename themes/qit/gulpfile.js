const   gulp            = require('gulp'),
    watch           = require('gulp-watch'),
    concat          = require('gulp-concat'),
    sass            = require('gulp-sass')(require('sass')),
    uglify          = require('gulp-uglify'),
    cssmin          = require('gulp-cssmin'),
    autoprefixer    = require('gulp-autoprefixer'),
    sourcemaps      = require('gulp-sourcemaps'),
    importCss       = require('gulp-import-css'),
    browserSync     = require('browser-sync').create();

/**
 * Browser Sync
 */
gulp.task('serve', function() {
    browserSync.init({
        proxy: "qitt.loc",
        notify: false
    });
    gulp.watch(
        [
            'assets/scss/**/*.scss'
        ], gulp.parallel('css'));

    gulp.watch(
        [
            './assets/js/testimonials.js',
            'assets/js/src/**/*.js',
            'assets/js/script/**/*.js',
            'assets/js/pages/**/*.js'
        ], gulp.parallel('js'));

    gulp.watch(
        [
            "./*.html"
        ]).on('change', browserSync.reload);

    gulp.watch(
        [
            "./**/*.php"
        ]).on('change', browserSync.reload);

});

/**
 * Compile CSS
 */
gulp.task('css', function() {
    return gulp.src('./assets/scss/general.scss')
        .pipe(sourcemaps.init())
        .pipe(importCss())
        .pipe(sass())
        .pipe(autoprefixer({
            overrideBrowserslist:  ['last 2 versions'],
            cascade: false
        }))
        .pipe(cssmin())
        .pipe(concat('bundle.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(browserSync.reload({stream: true}))
});

/**
 * Compile JS
 */
gulp.task('js', function() {
    return gulp.src(
        [
            './assets/js/testimonials.js',
            './assets/js/src/vendor/*.js',
            './assets/js/script/*.js',
            './assets/js/pages/*.js'
        ])
        .pipe(concat('bundle.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/'))
        .pipe(browserSync.reload({stream: true}))

});

/**
 * Default
 */
gulp.task('default', gulp.series('serve'));
