import path from 'path';
import webpack from 'webpack';
import qs from 'querystring';

import autoprefixer from 'autoprefixer';
import AssetsPlugin from 'assets-webpack-plugin';
import ExtractTextPlugin from 'extract-text-webpack-plugin';
import CleanWebpackPlugin from 'clean-webpack-plugin';

var WebpackIsomorphicToolsPlugin = require('webpack-isomorphic-tools/plugin');
var webpackIsomorphicToolsPlugin = new WebpackIsomorphicToolsPlugin(require('./webpack-isomorphic-tools-configuration'));
var OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');

const root = process.cwd();
const src  = path.join(root, 'src');
const imgPath = path.join(__dirname, './src/assets/img');
const fontPath = path.join(__dirname, './src/assets/fonts');
const build = path.join(root, 'build');

const clientSrc    = path.join(src, 'client');
const universalSrc = path.join(src, 'universal');
const api = path.join(src, 'api');

const sassSrc = path.join(universalSrc, 'scss');

const clientInclude = [clientSrc, universalSrc, api];

//Loading images on the client and server

// Cache vendor && client javascript on CDN...
const vendor = [
  'react',
  'react-dom',
  'react-router',
  'react-redux',
  'redux'
];

// the path(s) that should be cleaned
let pathsToClean = [
  'build'
]

// the clean options to use
let cleanOptions = {
  root: root,
  verbose:  true,
  dry:      false
}

export default {
  context: src,
  entry: {
    app: [
      'babel-polyfill/dist/polyfill.js',
      './client/client.js'
    ],
    vendor
  },
  output: {
    filename: '[name]_[chunkhash].js',
    chunkFilename: '[name]_[chunkhash].js',
    path: build,
    publicPath: '/static/'
  },
  resolve: {
    extensions: ['.js', '.jsx'],
    modules: [src, 'node_modules'],
    unsafeCache: true
  },
  node: {
    dns: 'mock',
    net: 'mock'
  },
  plugins: [
   new webpack.NormalModuleReplacementPlugin(
    /\/iconv-loader$/, 'node-noop',
   ),
   new webpack.IgnorePlugin(/vertx/),
   new CleanWebpackPlugin(pathsToClean, cleanOptions),
   new webpack.NamedModulesPlugin(),
   new ExtractTextPlugin('[name].css'),
   new OptimizeCssAssetsPlugin({
      assetNameRegExp: /\.css$/g,
      cssProcessor: require('cssnano'),
      cssProcessorOptions: { discardComments: {removeAll: true } },
      canPrint: true
   }),
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
   new webpack.NormalModuleReplacementPlugin(/\.\.\/routes\/static/, '../routes/async'),
   new webpack.optimize.CommonsChunkPlugin({
     names: ['vendor', 'manifest'],
     minChunks: Infinity
   }),
   new webpack.optimize.AggressiveMergingPlugin(),
   /* minChunkSize should be 50000 for production apps
    * 10 is for this example */
   new webpack.optimize.MinChunkSizePlugin({minChunkSize: 10}),
   new webpack.optimize.UglifyJsPlugin({
    compress: {
      warnings: false,
      screw_ie8: true,
      conditionals: true,
      unused: true,
      comparisons: true,
      sequences: true,
      dead_code: true,
      evaluate: true,
      if_return: true,
      join_vars: true,
    },
    output: {
      comments: false
    }
  }),
   new AssetsPlugin({path: build, filename: 'assets.json'}),
   new webpack.NoEmitOnErrorsPlugin(),
   new webpack.DefinePlugin({
     '__CLIENT__': true,
     '__PRODUCTION__': true,
     'process.env.NODE_ENV': JSON.stringify('production')
   }),
   webpackIsomorphicToolsPlugin,
 ],
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
     // JavaScript
     {test: /\.(js|jsx)$/,
       loader: 'babel-loader',
       query: {compact: false},
       include: clientInclude
     },

     // CSS
     {
      test: /\.scss$/,
      loader: ExtractTextPlugin.extract({
        fallback: 'style-loader',
        use: 'css-loader?sourceMap!postcss-loader?sourceMap!sass-loader?sourceMap',
      }),
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
