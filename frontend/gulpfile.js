var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();

// compile sass into css
gulp.task('sass', function() {
  return gulp
    .src('dev/scss/**/*.scss')
    .pipe(sass())
    .pipe(concat('styles.css'))
    .pipe(gulp.dest('dev'))
    .pipe(browserSync.stream());
});

// watch for changes to any files
gulp.task(
  'watch',
  gulp.series(function() {
    browserSync.init({
      server: {
        baseDir: 'dev'
      }
    });

    gulp.watch('dev/scss/**/*.scss', null, gulp.parallel('sass'));
    gulp.watch('dev/**/*.html').on('change', function() {
      browserSync.reload();
    });
  })
);