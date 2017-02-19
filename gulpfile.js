var gulp    = require('gulp'),
    sass    = require('gulp-sass'),
    strip   = require('gulp-strip-css-comments'),
    useref  = require('gulp-useref'),
    uglify  = require('gulp-uglify'),
    gulpIf  = require('gulp-if'),
    eslint  = require('gulp-eslint'),
    concat  = require('gulp-concat'),
    cssnano = require('gulp-cssnano'),
    sequence= require('run-sequence');


///////////////////////////////////////////////////////
//////////////////////////////////////////////////////
////////////////////// ADMIN ////////////////////////
gulp.task('admin-sass', function() {
    return gulp.src('resources/assets/sass/admin.scss')
    .pipe(sass())
    .pipe(concat('app.min.css'))
    .pipe(strip())
    .pipe(cssnano())
    .pipe(gulp.dest('public/backend/css'))
});

gulp.task('admin-js', function() {
    var source = require('./adminjs.json');
    return gulp.src(source)
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/backend/js'))
});

gulp.task('admin', ['admin-js', 'admin-sass'], function() {
    gulp.watch('resources/assets/sass/**/*.scss', ['admin-sass']);
});
