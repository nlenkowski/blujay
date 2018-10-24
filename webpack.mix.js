const mix = require("laravel-mix");

mix
  .js("assets/scripts/main.js", "dist/scripts")
  .sass("assets/styles/main.scss", "dist/styles")
  .copyDirectory("assets/fonts", "dist/fonts")
  .copyDirectory("assets/images", "dist/images")
  .browserSync({
    proxy: "https://blujay.test",
    snippetOptions: {
      ignorePaths: ["admin/**"]
    }
  });
