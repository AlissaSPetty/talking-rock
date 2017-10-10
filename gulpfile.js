var gulp = require('gulp');
var clean = require('gulp-clean');
var jshint = require('gulp-jshint');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var uglify = require('gulp-uglify');
var imageResize = require('gulp-image-resize');
var compass = require('gulp-compass');
var cache = require('gulp-cache');
var webserver = require('gulp-webserver');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();


var bases = {
  dev: 'dev/wp/wp-content/themes/talking-rock/',
  prod: 'prod/wp/wp-content/themes/talking-rock/',
};
var paths = {
  images: 'images/',
  js: 'js/',
  css: 'css/'
}

gulp.task('sass', function () {
  gulp.src('./scss/*.scss')
    .pipe(compass({
      css: 'css',
      sass: 'scss',
      image: 'images',
      javascript: bases.dev + 'js',
      relative: true
    }))
    .pipe(minifyCSS())
    .pipe(gulp.dest(bases.dev + 'css'))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task('clean-prod', function () {
  return gulp.src(bases.prod)
    .pipe(clean());
});

gulp.task('scripts-prod', ['copy-prod'], function () {
  gulp.src(paths.js + 'script.js', {
      cwd: bases.dev
    })
    .pipe(uglify())
    .pipe(concat('script.min.js'))
    .pipe(gulp.dest(bases.prod + paths.js));
  gulp.src(paths.js + 'vendor/*.js', {
      cwd: bases.dev
    })
    .pipe(concat('vendor.min.js'))
    .pipe(gulp.dest(bases.prod + paths.js));
  gulp.src(paths.js + 'acq-scripts/*.js', {
      cwd: bases.dev
    })
    .pipe(concat('acq-scripts.min.js'))
    .pipe(gulp.dest(bases.prod + paths.js));
});

gulp.task('imagemin-prod', function () {
  gulp.src(paths.images + '/**/*.*', {
      cwd: bases.dev
    })
    .pipe(imagemin())
    .pipe(gulp.dest(bases.prod + paths.images));
});

gulp.task('copy-prod', ['clean-prod'], function () {
  // Copy everything
  gulp.src('**/*.*', {
      cwd: bases.dev
    })
    .pipe(gulp.dest(bases.prod));
});

gulp.task('imagemin', function () {
  return gulp.src(bases.dev + 'images/**/*')
    .pipe(cache(imagemin({
      optimizationLevel: 6,
      progressive: true,
      interlaced: true
    })))
    .pipe(gulp.dest(bases.dev + 'images'));
});

gulp.task('production', ['scripts-prod']);
