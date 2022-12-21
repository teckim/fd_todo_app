const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./resources/js/**/*.{js,jsx,ts,tsx,vue}'],
  theme: {
    container: {
      center: true,
      padding: '1rem'
    },
    extend: {
      colors: {
        primary: colors.indigo,
        secondary: colors.pink
      },
      fontFamily: {
        'sans': ['Nunito', ...defaultTheme.fontFamily.sans],
        'hand': ['Dekko', ...defaultTheme.fontFamily.sans]
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
