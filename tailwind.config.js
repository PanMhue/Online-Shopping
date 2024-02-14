/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,js,php,css}",
    "./**/*.{html,js,php,css}",
    "./admin/*.{html,js,php,css}",
    "./admin/**/*.{html,js,php,css}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}