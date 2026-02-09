/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        'outfit': ['Outfit', 'sans-serif'],
        'opensans': ['Open Sans', 'sans-serif'],
        'sans': ['Open Sans', 'sans-serif'],
      },
      colors: {
        'darkBg': '#181a1c',
      },
    },
  },
  plugins: [],
}
