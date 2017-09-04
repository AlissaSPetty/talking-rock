import path from 'path';
import webpack from 'webpack';
import qs from 'querystring';
import autoprefixer from 'autoprefixer';

var WebpackIsomorphicToolsPlugin = require('webpack-isomorphic-tools/plugin');
var webpackIsomorphicToolsPlugin = new WebpackIsomorphicToolsPlugin(require('./webpack-isomorphic-tools-configuration')).development();
var DashboardPlugin = require('webpack-dashboard/plugin');

const root = process.cwd();
const src  = path.join(root, 'src');

const clientSrc    = path.join(src, 'client');
const universalSrc = path.join(src, 'universal');
const imgPath = path.join(__dirname, './src/assets/img');
const fontPath = path.join(__dirname, './src/assets/fonts');
const sassSrc = path.join(universalSrc, 'scss');

const clientInclude = [clientSrc, universalSrc];


const babelQuery = {
  "presets": [
    "react",
    ["es2015", { "modules": false }],
    "stage-0"
  ],
  compact: false,
  "plugins": [
    "transform-decorators-legacy",
    "react-hot-loader/babel"
  ]
};

export default {
  devtool: 'eval',
  context: src,
  entry: {
    app: [
      'babel-polyfill/dist/polyfill.js',
      'react-hot-loader/patch',
      'webpack-hot-middleware/client?noInfo=false',
      './client/client.js'
    ]
  },
  output: {
    filename: 'app.js',
    chunkFilename: '[name]_[chunkhash].js',
    path: path.join(root, 'build'),
    publicPath: '/static/'
  },
  plugins: [
    new webpack.NormalModuleReplacementPlugin(
     /\/iconv-loader$/, 'node-noop',
    ),
    new webpack.IgnorePlugin(/vertx/),
    new webpack.optimize.OccurrenceOrderPlugin(),
    new webpack.LoaderOptionsPlugin({
    options: {
      postcss: [
        autoprefixer({
          browsers: [
            'last 3 version',
            'ie >= 10',
          ],
        }),
      ],
      context: src,
    },
  }),
    new webpack.HotModuleReplacementPlugin(),
    new webpack.NoEmitOnErrorsPlugin(),
    new DashboardPlugin(),
    new webpack.DefinePlugin({
      '__CLIENT__': true,
      '__PRODUCTION__': false,
      'process.env.NODE_ENV': JSON.stringify('development')
    }),
    webpackIsomorphicToolsPlugin,
  ],
  resolve: {
    extensions: ['.js'],
    modules: [src, 'node_modules']
  },
  module: {
    loaders: [
      {
        test: /\.(png|gif|jpg|svg)$/,
        include: imgPath,
        use: 'url-loader?limit=20480&name=assets/[name]-[hash].[ext]',
      },
      {
        test: /\.(eot|ttf|woff|woff2)(\?v=\d+\.\d+\.\d+)?$/,
        include: fontPath,
        use: {
          loader: 'file-loader',
        },
      },

      // Javascript
      {test: /\.(js|jsx)$/,
       loader: 'babel-loader',
       query: babelQuery,
       include: clientInclude
      },
      { test: /\.json$/, loader: "json-loader" },
      // CSS
      {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [
          'style-loader',
          // Using source maps breaks urls in the CSS loader
          // https://github.com/webpack/css-loader/issues/232
          // This comment solves it, but breaks testing from a local network
          // https://github.com/webpack/css-loader/issues/232#issuecomment-240449998
          // 'css-loader?sourceMap',
          'css-loader?sourceMap',
          'postcss-loader?sourceMap',
          'sass-loader?sourceMap',
        ],
      },
      {
        test: webpackIsomorphicToolsPlugin.regular_expression('images'),
        loader: 'url-loader?limit=10240',
      },
      {
        test: webpackIsomorphicToolsPlugin.regular_expression('fonts'),
        loader: 'file-loader',
      }
    ]
  }
};
