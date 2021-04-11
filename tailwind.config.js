var zIndexes = {'auto':'auto'};
for (let i = 0; i < 100; i++) {
    zIndexes[i] = i;
}

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
    zIndex: zIndexes
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
