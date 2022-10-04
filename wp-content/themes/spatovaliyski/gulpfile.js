var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var babel = require('gulp-babel');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
var minifycss = require('gulp-minify-css');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var livereload = require('gulp-livereload');
var sourcemaps = require("gulp-sourcemaps");


gulp.task('browser-sync', function() {
  return browserSync({
    server: {
       baseDir: "./"
    }
  });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});

gulp.task('images', function(){
  return gulp.src('assets/src/images/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('assets/dist/images/'));
});

gulp.task('styles', function(){
  return gulp.src('assets/src/styles/**/*.scss')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest('assets/dist/styles/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('assets/dist/styles/'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task("cssmin", function() {
  return gulp.src('assets/dist/styles/' + "master.css")
  .pipe(sourcemaps.init({ loadMaps: true }))
  .pipe(rename({ suffix: ".min" }))
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest('assets/dist/styles'))
});

gulp.task('scripts', function(){
  return gulp.src('assets/src/scripts/**/*.js')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(concat('main.js'))
    .pipe(babel())
    .pipe(gulp.dest('assets/dist/scripts/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('assets/dist/scripts/'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task("watch", function() {
  livereload.listen();

  gulp.watch('assets/src/styles/**/*.scss', gulp.series("styles"));
  gulp.watch('assets/src/scripts/**/*.js', gulp.series("scripts"));
  gulp.watch('assets/src/images/*', gulp.series("images"));

  gulp.watch('assets/dist/styles/' + "master.css", gulp.series("cssmin"));

});

gulp.task("default", 
  gulp.series("styles", gulp.parallel("scripts"), "watch")
);