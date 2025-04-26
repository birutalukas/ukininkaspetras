/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      container: {
        center: true,
      },
      fontFamily: {
        mulish: ['Mulish', 'sans-serif'],
        iskry: ['"Iskry Regular"', 'serif'],
      },

      colors: {
        'brown-50': '#f9f4ec',
        'brown-200': '#e5d2b1',
        'brown-400': '#bf9e5c',
      }, // Extend Tailwind's default colors
    },
  },
  plugins: [],
};

export default config;
