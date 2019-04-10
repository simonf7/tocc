var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();
var autoprefixer = require('gulp-autoprefixer');

// compile sass into css
gulp.task('sass', function() {
  return gulp
    .src('dev/scss/**/*.scss')
    .pipe(sass())
    .pipe(concat('styles.css'))
    .pipe(
      autoprefixer({
        browsers: ['last 3 versions'],
        cascade: false
      })
    )
    .pipe(gulp.dest('dev'))
    .pipe(browserSync.stream());
});

// watch for changes to any files
gulp.task(
  'watch',
  gulp.parallel('sass', function() {
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

// copy the required files from the dev folder to dist
gulp.task(
  'dist',
  gulp.series('sass', function() {
    return gulp.src(['dev/*.css', 'dev/*.html']).pipe(gulp.dest('dist'));
  })
);
