/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'dark-blue': '#00427B',
        'gray-white':'#F5F7F8',
        'button-blue': '#00427B'
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        'title-content': ['Nunito', 'sans-serif'],
      },
    },
  },
  plugins: [],
}