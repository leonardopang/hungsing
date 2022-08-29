const path = require('path');
const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserPlugin = require('terser-webpack-plugin');
const PROD = (process.env.NODE_ENV === 'production') ? true : false;

//const mainStyle = new MiniCssExtractPlugin({ filename: (process.env.NODE_ENV === 'production') ? '../css/main.min.css' : '../css/main.css' });
const mainStyle = new MiniCssExtractPlugin({ filename: '../css/main.css' });
//const inlineStyle = new MiniCssExtractPlugin({ filename: (process.env.NODE_ENV === 'production') ? '../css/inline.min.css' : '../css/inline.css' });


module.exports = {
  mode: 'development',
  context: path.resolve(__dirname, '.'),
  entry: {
    app: './webpack/js/app.js',
  },
  output: {
    path: path.resolve(__dirname, './public/js'),
    filename: (process.env.NODE_ENV === 'production') ? '[name].min.js' : '[name].js',
  },
  resolve: {
    modules: [path.resolve(__dirname, './src'), 'node_modules'],
  },
  devtool: "source-map",
  module: {
    rules: [
      {
        test: /\.(sass|scss)$/,
        include: path.resolve(__dirname, './webpack/css/sass/main.scss'),
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              url: false,
              sourceMap: true,
              minimize: (process.env.NODE_ENV === 'production') ? true : false
            }
          },
          {
            loader: 'postcss-sass-loader',
            options: {
              plugins: () => [require('autoprefixer')({
                'browsers': ['> 1%', 'last 2 versions']
              })],
            }
          },
          {
            loader: 'sass-loader',
            options: { sourceMap: true }
          }
        ]
      },
      /*{
        test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: './fonts/[name].[ext]',
            // outputPath: 'assets/fonts/',
            // publicPath: '../fonts/'
          }
        }]
      },*/
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: [
                'es2015',
              ]
            }
          }
        ],
      }
    ]
  },
  watchOptions: {
    poll: true
  },
  plugins: [
    mainStyle,
  ],
  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({ parallel: true })
    ]
  }
};
