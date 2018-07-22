var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var include = require("gulp-include");

gulp.task('scripts', function () {
	gulp.src([
			'assets/js/plugins/**/*.js',
			'assets/js/application/main.js'
			], { base: 'assets/js' })
		.pipe(concat('scripts.js'))
		.pipe(include())
			.on('error', console.log)
		.pipe(rename({basename: "global"}))
		.pipe(uglify())
		.pipe(gulp.dest('./'))
		.pipe(notify({ message: 'Scripts task complete' }));
});
