/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // "text-halipro": "rgb(30,204,92)",
        "halipro-blue": "#30C4EE",
        "halipro-green": "#A6CE39"
      },
    },
  },
  plugins: [],
}

