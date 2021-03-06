var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cleanCss = require('gulp-clean-css');
var combineMq = require('gulp-combine-mq');
var notify = require('gulp-notify');
var rename = require('gulp-rename');

gulp.task('styles', function() {
    return gulp.src('assets/scss/master.scss')
        .pipe(sass().on('error', sass.logError) )
        .pipe(autoprefixer('last 2 versions', {map: false }))
        .pipe(combineMq({beautify: false}))
        .pipe(cleanCss())
        .pipe(rename('style.css'))
        .pipe(gulp.dest('./'))
        .pipe(notify({ message: 'Styles task complete' }));
});
