// Globals
var argv         = require('minimist')(process.argv.slice(2));
var autoprefixer = require('gulp-autoprefixer');
var browserSync  = require('browser-sync');
var concat       = require('gulp-concat');
var cssnano      = require('gulp-cssnano');
var del          = require('del');
var gulp         = require('gulp');
var gulpif       = require('gulp-if');
var jshint       = require('gulp-jshint');
var notify       = require('gulp-notify');
var plumber      = require('gulp-plumber');
var rename       = require('gulp-rename');
var runSequence  = require('run-sequence');
var sass         = require('gulp-sass');
var stripDebug   = require('gulp-strip-debug');
var uglify       = require('gulp-uglify');

// Config
var config = {

    // Specify the hostname of your dev server to enable BrowserSync during development
    devUrl: 'http://blujay.dev',

    // Configure your asset and build paths
    assetsPath: 'assets/',
    distPath: 'dist/'
};

// CLI Options
var enabled = {

    // Combine and minify production assets when running 'gulp --production'
    production : argv.production
};

// ### JSHint
// 'gulp jshint' - Lints project scripts
gulp.task('jshint', function() {
    return gulp.src([
        config.assetsPath + 'scripts/main.js'
    ])
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(notify(function (file) {
        if (file.jshint.success) {
            return false;
        }
        var errors = file.jshint.results.map(function (data) {
            if (data.error) {
                return '(' + data.error.line + ':' + data.error.character + ') ' + data.error.reason;
            }
        }).join('\n');
        return file.relative + ' (' + file.jshint.results.length + ' errors)\n' + errors;
    }));
});

// ### Scripts
// 'gulp scripts' - Lints, combines and minimizes app and vendor scripts
gulp.task('scripts', ['jshint'], function() {

    // App
    return gulp.src([
        config.assetsPath + 'scripts/main.js'
    ])
    .pipe(concat('main.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulpif(enabled.production, stripDebug()))
    .pipe(gulpif(enabled.production, uglify()))
    .pipe(gulp.dest(config.distPath + '/scripts/')),

    // Vendor
    gulp.src([
        config.assetsPath + 'scripts/vendor/*.js',
    ])
    .pipe(concat('vendor.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulpif(enabled.production, uglify()))
    .pipe(gulp.dest(config.distPath + '/scripts/'));
});

// ### Styles
// 'gulp styles' - Compiles, combines, and autoprefixes project styles
gulp.task('styles', function () {
    return gulp.src([
        config.assetsPath + 'styles/main.scss'
    ])
    .pipe(plumber({
        errorHandler: function(err) {
            notify().write(err);
            console.log(err);
            this.emit('end');
        }
    }))
    .pipe(sass({
        outputStyle: 'nested'
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe(autoprefixer({
        browsers: ['last 2 versions']
    }))
    .pipe(gulpif(enabled.production, cssnano()))
    .pipe(gulp.dest(config.distPath + '/styles/'))
    .pipe(browserSync.stream());
});

// ### BrowserSync Init
gulp.task('browsersync', function() {
    browserSync.init({
        proxy: config.devUrl
    });
});

// ### BrowserSync Reload
gulp.task('reload', function () {
    browserSync.reload();
});

// ### Clean
// 'gulp clean' - Deletes the build folder entirely
gulp.task('clean', del.bind(null, [config.distPath]));

// ### Watch
// 'gulp watch' - Watch files for changes and use BrowserSync to synchronize code changes across devices
gulp.task('watch', ['scripts', 'styles', 'browsersync'], function () {
    gulp.watch(['assets/styles/**/*'], ['styles']);
    gulp.watch(['assets/scripts/**/*'], ['scripts', 'reload']);
    gulp.watch(['**/*.php'], ['reload']);
});

// ### Gulp
// 'gulp' - Run a complete build. To compile for production run 'gulp --production'
gulp.task('default', function () {
    runSequence('clean', 'styles', 'scripts', 'reload');
});
