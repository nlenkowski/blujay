# Blujay

[![Dependency Status](https://david-dm.org/nlenkowski/blujay.svg)](https://david-dm.org/nlenkowski/blujay#info=dependencies)
[![Build Status](https://travis-ci.org/nlenkowski/blujay.svg?branch=master)](https://travis-ci.org/nlenkowski/blujay)

A minimal starter theme for WordPress. Built with modern tooling and sensible defaults.

- [Webpage](http://blujay.littlebiglab.com)
- [Demo](http://blujay.littlebiglab.com/demo)
- [Download](https://github.com/nlenkowski/blujay/releases/latest)
- [GitHub](https://github.com/nlenkowski/blujay)

## Features

- [Webpack](https://webpack.js.org/) for modern JavaScript development
- [Laravel Mix](https://laravel-mix.com/) for easy Webpack configuration
- [Browsersync](https://browsersync.io) for synchronized browser testing
- [npm](https://www.npmjs.com/) for package management
- [Sass](https://sass-lang.com) for stylesheets, with configurable defaults for colors, typography, etc.
- [Mixins](https://github.com/nlenkowski/blujay/blob/master/assets/styles/common/_helpers.scss) for quickly defining named breakpoints in your styles
- [Shortcodes](https://github.com/nlenkowski/blujay/blob/master/lib/shortcodes.php) for using flexbox columns in page and post content
- [ESLint](https://eslint.org/) and [stylelint](https://stylelint.io/) for linting scripts and styles
- [Easy setup](https://github.com/nlenkowski/blujay/blob/master/lib/setup.php) for registering assets, menus, image sizes, sidebars, etc.
- [Helper functions](https://github.com/nlenkowski/blujay/blob/master/lib/helpers.php) for cleaning up the header, moving scripts to the footer, etc.

## Requirements

- [WordPress](https://wordpress.org/) >= 4.7
- [PHP](https://secure.php.net/) >= 7.1
- [Node](https://nodejs.org/) >= 6.14

## Theme installation

1. Download the [latest release](https://github.com/nlenkowski/blujay/releases/latest/) and unzip it into your `/wp-content/themes` directory.

2. Run `npm install` from the theme directory to install dependencies.

3. Run `npm run prod` to compile and optimize assets for production.

## Theme development

1. Edit `/lib/setup.php` to enable theme features and register assets, menus, image sizes, sidebars, etc.

2. Edit `/webpack.mix.js` and change the browserSync `proxy` to reflect your local development url.

### Build commands

Compiled assets are output to the `/dist` directory.

- `npm run watch` – Compile assets when changes are detected and start a Browsersync session

- `npm run dev` – Compile assets

- `npm run prod` – Compile assets and optimize for production

### Package management

Example of how to add 3rd party packages into your theme:

1. Install package

```sh
npm install flatpickr
```

2. Add the stylesheet entry points to `/assets/styles/main.scss`

```css
@import "~flatpickr/dist/flatpickr.css";
```

3. Add the script entry points to `/assets/scripts/main.js`

```js
import flatpickr from "flatpickr";
```

4. Run any build command to compile the imported package assets along with your own.

## Theme structure

```
/themes/blujay            # → Theme root
├── assets                # → Theme assets
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── scripts/          # → Theme scripts
│   └── styles/           # → Theme styles
├── dist/                 # → Compiled assets (never edit)
├── lib/                  # → Theme code library
├── node_modules/         # → Node packages (never edit)
├── partials/             # → Partial templates
├── functions.php         # → Theme functions
├── package.json          # → Node dependencies
├── package-lock.json     # → Dependencies lock file (never edit)
├── style.css             # → Theme meta information
├── webpack.mix.js        # → Mix/Webpack configuration
```

### Assets

- `/assets/fonts` – Font source files
- `/assets/images` – Image source files
- `/assets/scripts` – JavaScript source files
- `/assets/styles` – Sass source files
- `/assets/styles/common` – Common styles (variables, global, helpers, etc.)
- `/assets/styles/components` – Component styles (columns, comments, etc.)
- `/assets/styles/layouts` – Layouts styles (header, footer, pages, etc.)

### Lib

- `/lib/setup.php` – Enables theme features and registers assets, menus, image sizes, sidebars, etc.
- `/lib/helpers.php` – Theme utilities for cleaning up the header, moving scripts to the footer, etc.
- `/lib/shortcodes.php` – Registers shortcodes

## Thanks

Blujay was inspired by the excellent [Sage](https://roots.io/sage/) starter theme by [Roots](https://roots.io/).

Thanks Roots Team! 👍
