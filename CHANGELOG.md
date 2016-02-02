### 1.2.2 - 2016-02-02

* Removed Font Awesome, better to use [Better Font Awesome](https://wordpress.org/plugins/better-font-awesome/) plugin instead

### 1.2.1 - 2016-02-01

* Added dist directory to repo to simplify git deployment
* Fixed copy in readme that was causing wp-migrate-db find/replace issues
* Minor style and typography improvements

### 1.2.0 - 2016-01-28
* Switched task runner from Grunt to Gulp
* Replaced LiveReload with BrowserSync
* Refactored and improved main styles and scripts
* Relocated assets and build directories
* Removed theme and plugin activation scripts that were causing problems in some environments
* Removed legacy browser support (IE8/9/10 are finally officially dead)
* Removed unneeded video embed shortcodes (oEmbed now handles this)
* Added new theme utilities to cleanup header and move all scripts to footer
* Changed theme font from Museo to Roboto Slab
* Improved comments

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
