exports.config = {
  paths: {
    public: '../web/rAssets',
  },
  files: {
    stylesheets: {
      joinTo: 'css/app.css',
      order: {
        before: 'app/styles/reset.css'
      },
    },
    javascripts: {
      joinTo: 'js/app.js'
    }
  },
  plugins: {
    postcss: {
      processors: [require('autoprefixer')]
    }
  }
};

exports.module = {
  plugins: {
    stylus: {
      includeCss: true
    }
  }
};
