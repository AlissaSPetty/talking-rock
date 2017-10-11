var gulp = require('gulp');
var clean = require('gulp-clean');
var jshint = require('gulp-jshint');
var gutil = require('gulp-util');
var sass = require('gulp-ruby-sass');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var livereload = require('gulp-livereload');
var uglify = require('gulp-uglify');
var imageResize = require('gulp-image-resize');
var cache = require('gulp-cache');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');
var tasklist = require('gulp-task-list')(gulp);

var wordpressRoot = ''; // you will need to set up a root directory for your wordpress installation and pass it as an argument to the serve task
// change these values to point to the custom theme
var bases = {
  dev: 'themes-dev/talking-rock/',
  prod: 'themes-prod/talking-rock/',
};
var paths = {
  images: 'images/',
  js: 'js/',
  css: 'css/'
};

gulp.task('sass', function () {
  return sass('./scss/*.scss')
    .on('error', sass.logError)
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(minifyCSS())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(bases.dev + paths.css));
});

// wipe out the production directory
gulp.task('clean-prod', function () {
  return gulp.src(bases.prod)
    .pipe(clean());
});

// prepare js files for production
gulp.task('scripts-prod', function () {
  gulp.src(paths.js + 'script.js', {
      cwd: bases.dev
    })
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(uglify())
    .pipe(concat('script.min.js'))
    .pipe(gulp.dest(bases.prod + paths.js));
  gulp.src(paths.js + 'vendor/*.js', {
      cwd: bases.dev
    })
    .pipe(concat('vendor.min.js'))
    .pipe(gulp.dest(bases.prod + paths.js));
});

// imagemin for production
gulp.task('imagemin-prod', function () {
  gulp.src(paths.images + '/**/*.*', {
      cwd: bases.dev
    })
    .pipe(imagemin())
    .pipe(gulp.dest(bases.prod + paths.images));
});

// copies themes-dev directory to a themes-prod folder
gulp.task('copy-prod', function () {
  // Copy everything
  gulp.src('**/*.*', {
      cwd: bases.dev
    })
    .pipe(gulp.dest(bases.prod));
});

// watches scss for changes and runs livereload listener
gulp.task('watch', function () {
  gulp.watch('./scss/**/*.scss', ['sass']);
});

// optimize images with imagemin (Photoshop save-for-web should be used first)
gulp.task('imagemin', function () {
  return gulp.src(bases.dev + 'images/**/*')
    .pipe(cache(imagemin({
      optimizationLevel: 6,
      progressive: true,
      interlaced: true
    })))
    .pipe(gulp.dest(bases.dev + 'images'));
});

// default task runs watch
gulp.task('default', ['watch']);

// production packaging task
gulp.task('production', ['clean-prod', 'copy-prod', 'scripts-prod', 'imagemin-prod']);