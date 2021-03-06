module.exports = {
  purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      spacing: {
        '128': '32rem',
      },
      gridTemplateColumns: {
        'weather': '2fr 8fr 2fr',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
