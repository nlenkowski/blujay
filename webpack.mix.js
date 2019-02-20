// eslint-disable-next-line no-undef
const mix = require('laravel-mix');

mix
  .js('assets/scripts/main.js', 'dist/scripts')
  .sass('assets/styles/main.scss', 'dist/styles')
  .copyDirectory('assets/fonts', 'dist/fonts')
  .copyDirectory('assets/images', 'dist/images');

// Enable Browsersync and source maps for development builds only
if (!mix.inProduction()) {
  mix.webpackConfig({ devtool: 'inline-source-map' });
  mix.browserSync({
    proxy: 'https://blujay.test',
    open: false,
    notify: false,
    files: ['dist/styles/**/*.css', 'dist/scripts/**/*.js', '**/*.php'],
    snippetOptions: {
      ignorePaths: ['admin/**'],
    },
  });
}
