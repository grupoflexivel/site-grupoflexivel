var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var minify = require('gulp-minify');

gulp.task('sass', function () {

	return gulp.src([
		'src/assets/scss/application.scss',
		])
	.pipe(sass({ outputStyle: 'compressed' }))
	.pipe(concat('all.css'))
	.pipe(gulp.dest("src/css"));

});

gulp.task('js', function () {

	return gulp.src([
		'src/assets/js/jquery.js',
		'src/assets/js/sweetalert.min.js',		
		'src/assets/js/moment.js',
		'src/assets/js/underscore.js',
		'src/assets/js/*.js',
		])
	.pipe(concat('all.js'))
	.pipe(minify())
	.pipe(gulp.dest("src/js"));

});


gulp.task('watch', function () {

	gulp.watch(['src/assets/scss/*.scss'], ['sass']);
	gulp.watch(['src/assets/js/*.js'], ['js']);
	
});

gulp.task('default', ['sass', 'js', 'watch']);