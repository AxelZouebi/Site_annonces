module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
      backgroundImage: theme => ({
      'img-map': "url('{{ asset('uploads/add/map.jpg') }}')",
     })},
  },
  variants: {},
  plugins: [],
}
