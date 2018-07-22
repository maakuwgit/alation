var gulp = require('gulp');
var jshint = require('gulp-jshint');

var scripts = ['assets/js/**/*.js', '!assets/js/widgets/*.js', '!assets/js/external/**/*.js', '!assets/js/plugins/**/*.js'];

gulp.task('jshint', function () {
    gulp.src(scripts)
        .pipe(jshint('.jshintrc'))
        .pipe(jshint.reporter('jshint-stylish'));
});
