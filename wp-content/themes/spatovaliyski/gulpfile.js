let gulp = require('gulp'),
		plumber = require('gulp-plumber'),
		rename = require('gulp-rename'),
		autoprefixer = require('gulp-autoprefixer'),
		babel = require('gulp-babel'),
		concat = require('gulp-concat'),
		uglify = require('gulp-uglify'),
		imagemin = require('gulp-imagemin'),
		cache = require('gulp-cache'),
		cleanCSS = require("gulp-clean-css"),
		sass = require('gulp-sass'),
		browserSync = require('browser-sync'),
		livereload = require('gulp-livereload'),
		sourcemaps = require("gulp-sourcemaps");


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
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(autoprefixer('last 2 versions'))
		.pipe(sourcemaps.write("./"))
		.pipe(gulp.dest('assets/dist/styles/'))
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('assets/dist/styles/'))
		.pipe(browserSync.reload({stream:true}))
});

gulp.task("cssmin", function() {
	return gulp.src('assets/dist/styles/' + "style.css")
	.pipe(sourcemaps.init({ loadMaps: true }))
	.pipe(cleanCSS({ compatibility: "ie8" }))
	.pipe(rename({ suffix: ".min" }))
	.pipe(sourcemaps.write("./"))
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

	gulp.watch('assets/dist/styles/' + "style.css", gulp.series("cssmin"));

});

gulp.task(
	"default", 
	gulp.series(
		"styles", 
		gulp.parallel("scripts", "cssmin"), 
		"watch"
	)
);