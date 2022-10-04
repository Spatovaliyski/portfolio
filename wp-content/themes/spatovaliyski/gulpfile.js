var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var autoPrefixer = require('gulp-autoprefixer');
//if node version is lower than v.0.1.2
require('es6-promise').polyfill();
var cssComb = require('gulp-csscomb');
var cmq = require('gulp-merge-media-queries');
var cleanCss = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var notify = require('gulp-notify');

gulp.task('sass',function(){
	gulp.src(['assets/src/sass/**/*.sass'])
		.pipe(plumber({
			handleError: function (err) {
				console.log(err);
				this.emit('end');
			}
		}))
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(autoPrefixer())
		.pipe(cssComb())
		.pipe(cmq({log:true}))
		.pipe(gulp.dest('assets/dist/css'))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(cleanCss())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('assets/dist/css'))
		.pipe(notify('css task finished'))
});

gulp.task('js',function(){
	gulp.src(['assets/src/scripts/**/*.js'])
		.pipe(plumber({
			handleError: function (err) {
				console.log(err);
				this.emit('end');
			}
		}))
		.pipe(concat('main.js'))
		.pipe(gulp.dest('assets/dist/scripts'))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(uglify())
		.pipe(gulp.dest('assets/dist/scripts'))
		  .pipe(notify('js task finished'))
});

gulp.task('html',function(){
	gulp.src(['html/**/*.html'])
		.pipe(plumber({
			handleError: function (err) {
				console.log(err);
				this.emit('end');
			}
		}))
		.pipe(gulp.dest('./'))
		.pipe(notify('html task finished'))
});

gulp.task('default',function(){
	gulp.watch('assets/src/scripts/**/*.js',['js']);
	gulp.watch('assets/src/sass/**/*.sass',['sass']);
	gulp.watch('html/**/*.html',['html']);
});
