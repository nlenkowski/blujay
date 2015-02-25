# Blujay
### A modern starter theme for WordPress

Blujay is a minimal, responsive starter theme built with modern web development tools. Use it to bootstrap your next responsive WordPress project and make it your own! Blujay was inspired by the excellent [Roots](http://roots.io/starter-theme/) starter theme by Ben Ward. 

* [Website](http://blujay.blueberryln.com)
* [Demo](http://blujay.blueberryln.com/demo)
* [Download](http://blujay.blueberryln.com/demo)
* [Github](https://github.com/nlenkowski/blujay)

## Features

* Minimal responsive starter theme
* Built with [Sass](http://sass-lang.com/)
* [Susy](http://susy.oddbird.net/) flexible responsive grid
* [Breakpoint](http://breakpoint-sass.com/) named media query support
* [Grunt](http://gruntjs.com/) build process automates development and deployment tasks
* [Bower](http://bower.io/) package manager support
* [jQuery](http://jquery.com/) loaded by CDN with local fallback
* [Fitvids.js](http://fitvidsjs.com/) for responsive videos
* [Picturefill](http://picturefill.com/) for responsive images done right
* [Font Awesome](http://fortawesome.github.io/Font-Awesome/) icon font library
* [Html5shiv](https://github.com/aFarkas/html5shiv) and [respond.js](https://github.com/scottjehl/Respond) conditionally loaded for legacy browser support
* [Custom shortcodes](http://blujay.blueberryln.com/demo/shortcodes) for columns, buttons and video embeds
* Custom theme activation script for common post-install tasks
* Optional automated plugin installation
* Just the right amount of commenting

## Whats not included

* Sass libraries like [Compass](http://compass-style.org/) or [Bourbon](http://bourbon.io/)
* Heavy frontend frameworks like [Bootstrap](http://getbootstrap.com/)
* [jQueryUI](http://jqueryui.com/) and other bulky jQuery plugins
* [The kitchen sink](http://goo.gl/IgPH41)

## Plugin Activation
If you do a lot of WordPress work you probably find yourself installing the same plugins every time you start a new project. Now you can automate plugin installation via the excellent [TGMPA library](http://tgmpluginactivation.com/). When you activate the theme for the first time you'll be asked if you'd like to (optionally) install the following recommended plugins:

* [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
* [Custom Post Typer Maker](https://wordpress.org/plugins/custom-post-type-maker/)
* [WP Migrate DB](https://wordpress.org/plugins/wp-migrate-db/)

> These plugins are hands down the most useful in our WordPress toolbox and we own pro versions of ACF and WP Migrate DB. They're well worth the cost. If you find you don't need them or want to add your own plugins to the install list take a look at /lib/plugins.php

## Theme Initialization

The theme is initialized via /functions.php, which acts as a loader for the following:

* **/lib/init.php** Registers custom constants, menus, sidebars, widget areas, etc.
* **/lib/activation.php** Handles theme activation
* **/lib/tgmpa.php** Provides automated plugin installation functionality
* **/lib/plugins.php** Contains a configurable list of plugins to install
* **/lib/shortcodes.php** Adds custom shortcodes
* **/lib/utilities.php** Adds some useful PHP and WordPress utilities
* **/lib/scripts.php** Loads jQuery and the main application JavaScript and legacy browser support scripts
* **/lib/styles.php** Loads the theme stylesheets and fonts
* **/lib/custom.php** Contains functions specific to your theme. What you would normally add to /functions.php should be added to /lib/custom.php instead.

## Theme Assets

Theme assets live in the /assets directory.

* **/assets/css** Sass styles are compiled for deployment into this directory
* **/assets/fonts** Font assets
* **/assets/img** Image assets
* **/assets/js** Contains the main application script and minified JavaScript assets for deployment
* **/assets/js/lib** JavaScript libraries and scripts manually included via /lib/scripts.php
* **/assets/js/plugins** Scripts and plugins automatically compiled during the build process
* **/assets/sass** Main Sass styles
* **/assets/sass/lib** Sass dependencies and extensions

## Build Process

We use [Grunt](http://gruntjs.com/) for automating development and deployment tasks. The build script does the following:

* Compile, autoprefix and minify /sass/main.scss into /css/main.min.css with [libSass](https://github.com/sindresorhus/grunt-sass)
* Concatenate and minify /js/app.js and /js/plugins/* into /js/app.min.js with [UglifyJS](https://github.com/gruntjs/grunt-contrib-uglify)
* Lint /js/app.js with [jSHint](https://github.com/gruntjs/grunt-contrib-jshint)
* Enable [Livereload](http://livereload.com/) support
* Watch Sass, JavaScript and theme files for changes
* Provide build feedback via Mac notification center

## Package Management

Using [Bower](http://bower.io/) for package management is entirely optional. We don't reference any Bower components directly, rather we use Bower to quickly pull down componenets and then manually install just the files we need into the appropriate /assets directory.

>  If you prefer to reference your Bower components directly or even change where they are installed via .bowerrc feel free!

## Development and Deployment

#### Install Node

Download and install Node for your development environment from [http://nodejs.org](http://nodejs.org). 

> Node can also be [installed using Homebrew](http://thechangelog.com/install-node-js-with-homebrew-on-os-x/) if you swing that way.

#### Install Grunt

```
npm install -g grunt-cli
```

#### Clone the repository

```
git clone git@github.com:nlenkowski/blujay.git
```

#### Change to project directory
```
cd blujay
```

#### Install Grunt dependencies

```
npm install
```

#### Run Grunt

```
grunt watch
```
