// webpack.mix.js
const mix = require("laravel-mix");

// js compile
mix.js("src/js/main.js", "public/js/main.js");

// scss compile
mix.sass("src/scss/style.scss", "public/css/style.css");
