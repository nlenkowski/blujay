const mix = require("laravel-mix");

mix
  .js("assets/scripts/main.js", "dist/scripts")
  .sass("assets/styles/main.scss", "dist/styles")
  .browserSync({
    proxy: "https://blujay.test",
    snippetOptions: {
      ignorePaths: ["admin/**"]
    }
  });
