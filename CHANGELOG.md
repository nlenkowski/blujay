### 1.3.0 - 2016-07-07
* Switch from Bower to npm for frontend dependencies
* Add asset configuration file for managing paths and dependencies
* Add ES6 support with Babel to scripts build task
* Switch scripts linter from jshint to eslint
* Add font and image optimization build tasks
* Add source maps generation to styles and scripts build tasks
* Remove dist directory from version control
* Improve theme directory structure
* Combine and simplify theme libs
* Move utilities lib inits to setup lib
* Add archive and search templates
* Add custom page template example
* Improve styles and typography
* Add grid and pager components
* Remove button component
* Improve adherence to WordPress coding standards
* Improve indentation and comments
* Upgrade vendor dependencies

### 1.2.2 - 2016-02-02

* Remove Font Awesome

### 1.2.1 - 2016-02-01

* Add dist directory to repo to simplify git deployment
* Fix copy in readme that was causing wp-migrate-db find/replace issues
* Minor style and typography improvements

### 1.2.0 - 2016-01-28
* Switch task runner from Grunt to Gulp
* Replace LiveReload with BrowserSync
* Refactor and improve main styles and scripts
* Relocate assets and build directories
* Remove theme and plugin activation scripts that were causing issues in some environments
* Remove legacy browser support
* Remove unneeded video embed shortcodes (oEmbed now handles this)
* Add new theme utilities to cleanup header and move all scripts to footer
* Change theme font from Museo to Roboto Slab
* Improve comments

### 1.1.0 - 2015-02-24
* Convert theme from Less to Sass
* Integrate Susy grid Sass extension
* Integrate Breakpoint named media query Sass extension
* Convert old school responsive styles to named media queries
* Improve Grunt build process performance by changing Sass compiler to libsass
* Add Autoprefixer to build process
* Add Bower integration
* Move all assets to common assets directory
* Add conditionally loaded alternate stylesheet for legacy browsers
* Upgrade jQuery and plugins
* Make custom image sizes available to the media library
* Integrate Font Awesome
* Integrate Fitvids
* Integrate Picturefill
* Add shortcode support for buttons, videos and columns
* Refine template tags and theme files
* Improve blog styles
* Remove extraneous theme styles
* Add shortcode documentation page
* Improve comments
* Improve documentation
* Rename theme to Blujay
* Update favicon and touch icon

### 1.0.0 - 2014-05-27
* Clone Roots theme
* Remove bootstrap
* Remove custom template loader
* Disable unneeded web fonts
* Add local jQuery fallback
* Integrate Semantic Grid System
* Integrate Less Elements
* Add column shortcodes
* Improve default styles and templates
* Moved content templates to /templates directory
* Add legacy browser support via htmlshiv and respond.js
* Add automated plugin installation functionality
* Upgrade Grunt and dependencies
* Clean up comments
* Add favicons
