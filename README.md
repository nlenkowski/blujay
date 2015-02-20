# Blujay

A lightweight, responsive starter theme for WordPress.

## Overview

Blujay provides a simple starter theme built with modern web development tools. Use it to bootstrap your next responsive WordPress theme and make it your own. Blujay was inspired by and borrows from the excellent [Roots](http://roots.io/starter-theme/) starter theme by Ben Ward. [See the theme in action here](http://blujay.blueberryln.com).

## Features

- Very minimal starter theme
- Built with [Sass](http://sass-lang.com/)
- Flexible responsive grid provided by [Susy](http://susy.oddbird.net/)
- Named media queries handled by [Breakpoint](http://breakpoint-sass.com/)
- [Grunt](http://gruntjs.com/) build process takes the pain out of deployment tasks
- [Bower](http://bower.io/) support for quickly incorporating new tools
- Custom theme activation script for automating common post-install tasks
- Optional automated installation of a select few WordPress plugins
- jQuery loaded by CDN with local fallback
- Shortcodes for columns, buttons and Youtube and Vimeo embedding. See the [shortcode demo page](http://blujay.blueberryln.com/shortcodes) for details.
- Responsive video support by [Fitvids.js](http://fitvidsjs.com/)
- Icon font library support by [Font Awesome](http://fortawesome.github.io/Font-Awesome/)
- Responsive images done right via [Picturefill](http://scottjehl.github.io/picturefill/)
- Html5shiv, respond.js and legacy stylesheet conditionally included for legacy browser support
- Just the right amount of commenting

## Whats not included

- Sass libraries like Compass or Bourbon
- Heavy frontend frameworks like Bootstrap
- Unnecessary jQuery plugins
- The kitchen sink

## Plugin Activation
Over time we found ourselves using a core set of useful plugins for each new WordPress project. Installing them manually is a pain, so now you don't have to. When you activate the theme you'll be asked if you'd like to optionally install the following:

- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
- [Custom Post Typer Maker](https://wordpress.org/plugins/custom-post-type-maker/)
- [WP Migrate DB](https://wordpress.org/plugins/wp-migrate-db/)
- [WP Retina 2x](https://wordpress.org/plugins/wp-retina-2x/)

We own pro versions of these awesome plugins, they're well worth the cost.

## Theme Initialization

The theme is initialized via functions.php, which loads several additional scripts:

- **/lib/init.php** Registers custom constants, menus, sidebars, widget areas, etc
- **/lib/activation.php** Handles theme activation
- **/lib/tgmpa.php** Handles automated plugin activation
- **/lib/plugins.php** Contains the list of plugins to automatically install
- **/lib/shortcodes.php** Adds custom shortcodes
- **/lib/utilities.php** Adds some useful PHP and WordPress utilities
- **/lib/scripts.php** Loads jQuery and the main application script and legacy browser support scripts
- **/lib/styles.php** Loads the theme stylesheets and fonts
- **/lib/custom.php** Contains functions specific to your theme. What you would normally add to functions.php should be added to /lib/custom.php instead.

## Grunt

We use [Grunt](http://gruntjs.com/) for automating common deployment tasks. Our build process consists of the following:

- Watch sass, js and theme files for changes
- Compile, autoprefix and minify /sass/main.scss into /css/main.min.css with [libSass](https://github.com/sindresorhus/grunt-sass)
- Concatenate and minify /js/app.js and /js/plugins/* into /js/app.min.js with [UglifyJS](https://github.com/gruntjs/grunt-contrib-uglify)
- Lint /js/app.js with [jSHint](https://github.com/gruntjs/grunt-contrib-jshint)
- Enable live reloading via browser plugins available for [Chrome](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?hl=en) and [Firefox](https://addons.mozilla.org/en-US/firefox/addon/livereload/)
- Provide build feedback via Mac notification center

## Bower

Using [Bower](http://bower.io/) for package management is entirely optional. We don't reference any assets directly from the /bower\_components directory, rather we use Bower to quickly pull down assets and then manually install them into the appropriate /assets subdirectory. If you prefer to reference your Bower assets directly from /bower_components by all means feel free!

## Build process

Step by step instructions to begin theme evelopment and/or prepare the site for deployment.

#### Clone repository:

```
git clone git@bitbucket.org:blueberryln/blujay.git
```

#### Install Node and npm

Download and install Node for your development environment from [nodejs.org](http://nodejs.org). Node can also be installed using [Homebrew](http://brew.sh/) if you swing that way.

#### Install Grunt and Bower

```
npm install -g grunt-cli
npm install -g bower
```

#### Install Grunt dependencies

```
npm install
```

#### Run Grunt

```
grunt watch
```

#### And you're off!
