# Blujay
### A modern starter theme for WordPress

Blujay is a minimal, responsive starter theme with modern tooling.

* [Homepage](http://blujay.littlebiglab.com)
* [Demo](http://blujay.littlebiglab.com/demo)
* [Download](https://github.com/nlenkowski/blujay/releases/latest)
* [Source](https://github.com/nlenkowski/blujay)

## Features

* [Gulp](http://gulpjs.com) build system automates common development tasks
* [Browsersync](http://browsersync.io) enables synchronized browser testing and live reloading
* Front-end package management with [npm](https://www.npmjs.com)
* [ES6](https://babeljs.io/docs/learn-es2015) support with [Babel](https://babeljs.io)
* Built with [Sass](http://sass-lang.com)
* [Susy](http://susy.oddbird.net) grid system
* [Breakpoint](http://breakpoint-sass.com) named media queries
* [Picturefill](http://picturefill.com) responsive images polyfill
* Handy theme [utilities](https://github.com/nlenkowski/blujay/blob/master/lib/utilities.php) for cleaning up the header, moving scripts to the footer, etc.
* A few useful [shortcodes](https://github.com/nlenkowski/blujay/blob/master/lib/shortcodes.php) and [mixins](https://github.com/nlenkowski/blujay/blob/master/assets/styles/common/_utilities.scss)

> Most features are optional and can be easily disabled. If you don't need Susy or Breakpoint just comment out their includes and bake your own solutions.

## Theme installation


Install Node.js from [https://nodejs.org](https://nodejs.org).

### Install gulp


```
npm install -g gulp
```

### Install theme

```
git clone git@github.com:nlenkowski/blujay.git theme-name && cd theme-name
```

### Install dependencies
```
npm install
```

### Build assets
```
gulp
```

### Configure theme

Edit `lib/setup.php` to enable theme features and utilities and register assets, menus, image sizes, sidebars, etc.

### Configure Browsersync

Edit `assets/config.json` and update your `devUrl` to reflect your local development hostname.

For example:

```
"devUrl": "http://project-name.dev"
```

## Theme development

Blujay uses [gulp](http://gulpjs.com/) as a build tool.

### Development tasks

* `gulp watch` monitors theme files and assets for changes and live reloads with [Browsersync](http://browsersync.io)

### Build tasks

Use the following to compile your theme assets to the `dist` directory.


* `gulp styles` — Compiles Sass, autoprefixes, minifies and generates source maps for styles

* `gulp scripts` — Lints, transpiles ES6, combines, minifies and generates source maps for scripts

* `gulp images` — Optimizes images

* `gulp fonts` — Gathers font files and outputs to flat directory structure

* `gulp` — Builds all assets

* `gulp --production` — Builds all assets for production (no source maps) 

## Package management

Blujay uses [npm](https://www.npmjs.com) for front-end package management. 

### To install a new package

```
npm i -D picturefill
```

### Register the package dependency

Edit `assets/config.json` and add the full path to the package's main styles and/or scripts:

```
"dependencies": {
    "scripts": [
        "node_modules/picturefill/dist/picturefill.js",
        "assets/scripts/main.js"
    ],
    "styles": [
        "assets/styles/main.scss"
    ]
}
```
> Dependencies are compiled in the order they are listed.

## Theme structure

### Hierarchy

```
├── assets                # → Front-end assets
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── scripts/          # → Theme scripts
│   └── styles/           # → Theme styles
│   ├── config.json       # → Settings for compiled assets
├── dist/                 # → Built theme assets (never manually edit)
├── lib/                  # → Theme PHP libraries
├── node_modules/         # → Node.js packages (never manually edit)
├── partials/             # → Partial templates
├── templates/            # → Custom page templates
├── functions.php         # → Theme PHP loader (never manually edit)
├── gulpfile.js           # → Gulp scripts
├── package.json          # → Node.js dependencies
├── style.css             # → Theme meta information

```

### Assets

* `assets/fonts` — Font source files
* `assets/images` — Image source files
* `assets/scripts` — JavaScript source files
* `assets/styles` — Sass source files
* `assets/styles/common` — Common styles (global, variables, utilities, etc.)
* `assets/styles/components` — Component styles (comments, grid, columns, etc.)
* `assets/styles/layouts` — Styles for layouts (header, footer, pages, posts, etc.)
* `assets/styles/templates` — Styles for custom page templates
* `assets/config.json` — Compiled assets path and dependency configuration

### Lib

* `lib/setup.php` — Enables theme features and utilities and registers assets, menus, image sizes, sidebars, etc.
* `lib/shortcodes.php` — Registers shortcodes
* `lib/utilities.php` — Theme utilities for cleaning up the header, moving scripts to the footer, etc.

## Thanks

Blujay was inspired by the excellent [Sage](https://roots.io/sage/) starter theme from [the Roots team](https://roots.io/). I've learned much about WordPress from following Sage's development, thanks Roots team!
