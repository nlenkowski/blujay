// Plugins
var argv         = require('minimist')(process.argv.slice(2));
var autoprefixer = require('gulp-autoprefixer');
var babel        = require('gulp-babel');
var browsersync  = require('browser-sync');
var changed      = require('gulp-changed');
var concat       = require('gulp-concat');
var cssnano      = require('gulp-cssnano');
var del          = require('del');
var eslint       = require('gulp-eslint');
var flatten      = require('gulp-flatten');
var gulp         = require('gulp');
var gulpif       = require('gulp-if');
var imagemin     = require('gulp-imagemin');
var imageminJpg  = require('imagemin-jpeg-recompress');
var imageminPng  = require('imagemin-pngquant');
var notify       = require('gulp-notify');
var plumber      = require('gulp-plumber');
var rename       = require('gulp-rename');
var runSequence  = require('run-sequence');
var sass         = require('gulp-sass');
var sourcemaps   = require('gulp-sourcemaps');
var uglify       = require('gulp-uglify');

// Get project config
var config = require('./config.json'),
    path  = config.path,
    manifest = config.manifest;

// Command line options
var enabled = {

    // Enable production build
    production: argv.production
};

// Custom error handler to send native notifications
var onError = function(err) {
    notify.onError({
        title: "Gulp",
        message: "<%= error.message %>"
    })(err);
    this.emit('end');
};

var plumberOptions = {
    errorHandler: onError,
};

//
// Tasks
//

// ## Scripts
// 'gulp scripts' - Lints, combines, minifies and adds source maps for scripts
gulp.task('scripts', ['lint'], function() {
    return gulp.src(manifest.scripts)
        .pipe(plumber(plumberOptions))
        .pipe(gulpif(!enabled.production, sourcemaps.init()))
        .pipe(concat('main.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(babel({
			presets: ['es2015']
		}))
        .pipe(uglify())
        .pipe(gulpif(!enabled.production, sourcemaps.write()))
        .pipe(gulp.dest(path.dist + 'scripts'))
        .pipe(browsersync.stream());
});

// ## Styles
// 'gulp styles' - Compiles, autoprefixes, minifies and adds source maps for styles
gulp.task('styles', function() {
    return gulp.src(manifest.styles)
        .pipe(plumber(plumberOptions))
        .pipe(gulpif(!enabled.production, sourcemaps.init()))
        .pipe(concat('main.css'))
        .pipe(rename({suffix: '.min'}))
        .pipe(sass({
            outputStyle: 'nested',
        }))
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(cssnano())
        .pipe(gulpif(!enabled.production, sourcemaps.write()))
        .pipe(gulp.dest(path.dist + 'styles'))
        .pipe(browsersync.stream());
});

// ## Images
// 'gulp images' - Optimizes image assets and outputs to dist
gulp.task('images', function() {
    return gulp.src(path.assets + 'images/**/*')
        .pipe(changed(path.dist + 'images'))
        .pipe(imagemin(
            [imageminPng(), imageminJpg()],
            {verbose: true}
        ))
        .pipe(gulp.dest(path.dist + 'images'))
        .pipe(browsersync.stream());
});

// ## Fonts
// 'gulp fonts' - Outputs font assets to dist in a flattened directory structure
gulp.task('fonts', function() {
    return gulp.src([
        path.assets + 'fonts/**/*.eot',
        path.assets + 'fonts/**/*.svg',
        path.assets + 'fonts/**/*.ttf',
        path.assets + 'fonts/**/*.woff',
        path.assets + 'fonts/**/*.woff2'
        ])
        .pipe(flatten())
        .pipe(gulp.dest(path.dist + 'fonts'))
        .pipe(browsersync.stream());
});

// ## Lint
// 'gulp lint' - Lints main project scripts with eslint
gulp.task('lint', function() {
    return gulp.src(path.assets + 'scripts/**/*.js')
        .pipe(plumber(plumberOptions))
        .pipe(eslint())
        .pipe(eslint.format())
        .pipe(eslint.failAfterError());
});

// ## Clean
// 'gulp clean' - Deletes the dist directory
gulp.task('clean', del.bind(null, [path.dist]));

// ## Reload
// 'gulp reload' - Forces a manual browser reload
gulp.task('reload', function() {
    browsersync.reload();
});

// ## Watch
// 'gulp watch' - Use BrowserSync to proxy your local development server and
// synchronize code changes across devices. Specify your development server
// hostname in config.json. See http://browsersync.io for details.
gulp.task('watch', function() {
    browsersync.init({
        proxy: config.devUrl,
        snippetOptions: {
            whitelist: ['/wp-admin/admin-ajax.php'],
            blacklist: ['/wp-admin/**']
        }
    });
    gulp.watch(['**/*.php'], ['reload']);
    gulp.watch([path.assets + 'scripts/**/*'], ['scripts']);
    gulp.watch([path.assets + 'styles/**/*'], ['styles']);
    gulp.watch([path.assets + 'fonts/**/*'], ['fonts']);
    gulp.watch([path.assets + 'images/**/*'], ['images']);
});

// ### Build
// 'gulp build' - Compiles all assets, but doesn't clean up dist directory first
gulp.task('build', function() {
    require('gulp-stats')(gulp);
    runSequence('styles', 'scripts', ['fonts', 'images']);
});

// ## Gulp
// 'gulp' - Compiles all assets for development
// 'gulp --production' - Compiles all assets for production (disables source maps)
gulp.task('default', function() {
    require('gulp-stats')(gulp);
    runSequence('clean', 'scripts', 'styles', ['fonts', 'images']);
});
