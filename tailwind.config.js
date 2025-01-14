/** @type {import('tailwindcss').Config} */
module.exports = {
  plugins: [require('prettier-plugin-tailwindcss')],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: { },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
],
}

