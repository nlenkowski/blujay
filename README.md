# Blujay
### A modern starter theme for WordPress

Blujay is a minimal, responsive starter theme built with modern web development tools. Use it to bootstrap your next responsive WordPress project and [make it your own!](https://github.com/nlenkowski/blujay/fork)

* Homepage: [http://blujay.blueberryln.com](http://blujay.blueberryln.com)
* Demo: [http://blujay.blueberryln.com/demo](http://blujay.blueberryln.com/demo)
* Download: [https://github.com/nlenkowski/blujay/releases/latest](https://github.com/nlenkowski/blujay/releases/latest)
* Source: [https://github.com/nlenkowski/blujay](https://github.com/nlenkowski/blujay)

## Features

* Minimal responsive starter theme built with [Sass](http://sass-lang.com/)
* [Gulp](http://gulpjs.com/) build system automates common development and deployment tasks
* [Bower](http://bower.io/) front end package management
* [Browsersync](browsersync.io) synchronizes browser testing and injects file changes while you're developing
* [Susy](http://susy.oddbird.net/) responsive grid for Sass
* [Breakpoint](http://breakpoint-sass.com/) named media queries for Sass
* [Picturefill](http://picturefill.com/) responsive image polyfill
* [Font Awesome](http://fortawesome.github.io/Font-Awesome/) iconography
* A few useful [shortcodes](http://blujay.blueberryln.com/demo/shortcodes) and Sass mixins
* Several handy WordPress utility functions

> Most features are optional and can be disabled easily. For example, if you don't want to use Susy or Breakpoint in your theme, just comment out their includes and bake your own solutions instead.

## Not Featuring

* Heavy front end frameworks and Sass libraries like [Bootstrap](http://getbootstrap.com/) and [Compass](http://compass-style.org/)
* [jQueryUI](http://jqueryui.com/) and other bulky plugins
* The kitchen sink

## Build System

Blujay uses [Gulp](http://gulpjs.com/) to automate common development and deployment tasks:

* Compiles, autoprefixes and minifies `styles/main.scss` into `dist/main.min.css` with [gulp-sass](https://www.npmjs.com/package/gulp-sass)
* Compiles and minifies `scripts/lib/*` and `scripts/main.js` into `dist/main.min.js` with [UglifyJS](https://github.com/gruntjs/grunt-contrib-uglify)
* Lints scripts with [jSHint](https://github.com/gruntjs/grunt-contrib-jshint)
* Synchronizes browser testing and injects styles and scripts during development with [BrowserSync](http://browsersync.io/)
* Watches styles, scripts and theme files for changes
* Pipes build feedback and errors to the Mac notification center

## Package Management

Using [Bower](http://bower.io/) for front end package management is entirely optional. We don't reference any Bower components directly in the theme, we prefer to keep our front end assets as lean and organized as possible. Rather we use Bower to quickly download our components and manually install only the files we need from each package into `assets/styles/lib` and `assets/scripts/lib`. That said, if you prefer to reference your Bower components directly from the `bower_components` directory nothing is stopping you!

> Perhaps when all Bower packages are someday required to specify their dependencies and main files accurately we'll integrate [wiredep](https://github.com/taptapship/wiredep) into the build process, but for now its just too much hassle.

## Theme Functions

The theme functions are located in the `lib` directory and are initialized via `functions.php`, which acts as a loader for the following:

* `lib/setup.php` — Register constants, menus, sidebars, widget areas, etc
* `lib/assets.php` — Loads scripts, styles and fonts
* `lib/shortcodes.php` — Adds custom shortcodes
* `lib/utilities.php` — Adds some useful WordPress utilities
* `lib/custom.php` — Your custom theme functions go here instead of in `functions.php`

## Theme Assets

Theme assets reside in the `assets` directory:

* `assets/fonts` — Font source files
* `assets/images` — Image source files
* `assets/scripts` — JavaScript source files
* `assets/scripts/lib` — JavaScript libraries
* `assets/styles` — Sass source files
* `assets/styles/lib` — Sass libraries
* `assets/styles/common` — Styles common to all pages; variables, typography, utilities, etc.
* `assets/styles/components` — Component styles for buttons, columns, etc.
* `assets/styles/layouts` — Layout styles for header, footer, pages, posts, etc.

## Theme Installation

From the command line:

### Install Node

Download and install Node for your local development environment from [http://nodejs.org/download/](http://nodejs.org/download/)

### Install Gulp and Bower

Blujay uses [Gulp](http://gulpjs.com/) as its build system and [Bower](http://bower.io/) to manage front end packages.

```
npm install -g gulp bower
```

> Installing Bower is optional, see "Package Management" above.

### Install Theme

Clone the Git repository and change to the theme directory:

```
git clone git@github.com:nlenkowski/blujay.git && cd blujay
```

> Now is a good time to rename the theme directory to reflect your project name

### Configure Theme

Edit `lib/setup.php` to enable or disable theme features, setup navigation menus, custom image sizes, post formats, sidebars, etc.

Edit `lib/utilities.php` to enable or disable theme utilities such as cleaning up the header, moving all JS to the footer, etc.

### Configure BrowserSync

To use BrowserSync during `gulp watch` you need to update your `devUrl` in `gulpfile.js` to reflect your local development hostname.

For example, if your local development URL is `http://blujay.dev` you would update the file to read:

```
var config = {

  devUrl: 'http://blujay.dev'
}
```

### Gulp Commands

* `gulp` — Compile assets for development
* `gulp watch` — Compile assets for development when file changes are detected
* `gulp --production` — Compile and compress assets for production, strip debugging, etc.

## Thanks

Blujay was inspired by the excellent [Sage](https://roots.io/sage/) starter theme from [the Roots team](https://roots.io/). I've learned much about WordPress development from following it's development, thanks Roots team!
