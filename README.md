# Talking Rock

The Basic setup goes like this...

An express server handles a request, renders the that page on the server and sends
it back to the client. The code is bundled into chunks on build time which are requested
by the client when needed for that route.

When in development mode the express server handles a request and uses the `webpack.config.development.js`
configuration as middleware to listen for file changes, build then and push them to the client.

---

This project is an updated version of [this project](https://github.com/Alex-ray/v2-universal-js-hmr-ssr-react-redux). It also combines the thunk/redux implentation of [this](https://github.com/workco/marvin), rather than using the ducks redux style originally put into the v2 unversal boilerplate.

Note: HMR 3 does not work in IE10. You will have to develop this on a more modern browser. 

The main goal of this project remains the same; A simple and no BS approach to a
Universal JS, Server Side Rendering, Code Splitting and Hot Module Reloading using
the following technologies.

- React
- Redux with Thunk async middleware
- React Router 4
- Webpack 2
- Hot Module Reloader 3
- Babel
- Express
- webpack-dev-middleware
- webpack-hot-middleware
- immutablejs
- react-cookies / universal-cookie
- Isomorphic webpack tools to load locally hosted fonts and graphics

## 🛠 Setup
First install the dependencies, in the root directory of this project run.
`npm install`

## 🤖 Running
For **Development** run `npm run development`

This will start a development server on `localhost:3000` that utilizes hot module
reloading for both React components and redux reducers.

For **Production** run `npm run build && npm run production`.

This will build all your assets and write them to a `/build` file in the root directory of this project. The script will then start up a express server on `localhost:3000` that will utilize server side rendering and route based code splitting.

![hmr-ssr](https://cloud.githubusercontent.com/assets/2454928/18360529/39573fe2-75b3-11e6-8a06-75bc2664e98d.gif)

## 🗒 Notes

Hot Module Reloading does not work with `System.import`, as such there are two route sources.
- The first one `src/universal/routes/static.js` is for static routes (no code splitting) that is for the development environment to work nicely with [React Hot Loader 3](https://github.com/gaearon/react-hot-loader)
- The second route source `src/universal/routes/async.js` is for asynchronous routes (Code splitting using System.import).

### Setup

Tested with node 6.x and 7.x

```
$ npm install
```

### Running in dev mode

```
$ npm start
```

Visit `http://localhost:3000/` from your browser of choice.
Server is visible from the local network as well.

![Running in the iTerm2](http://i.imgur.com/IxamMBh.png)

It is using [webpack dashboard](https://github.com/FormidableLabs/webpack-dashboard), so please note the following:

**OS X Terminal.app users:** Make sure that **View → Allow Mouse Reporting** is enabled, otherwise scrolling through logs and modules won't work. If your version of Terminal.app doesn't have this feature, you may want to check out an alternative such as [iTerm2](https://www.iterm2.com/).

### Translation process

You will need to run `npm install i18next-parser -g` to do a global install of the extractor tool.

### Build (production)

Build will be placed in the `build` folder.

```
$ npm run build
```

If your app is not running on the server root you should change `publicPath` at two places.

In `webpack.config.js` (ATM line 147):

```
output: {
  path: buildPath,
  publicPath: '/your-app/',
  filename: 'app-[hash].js',
},
```

and in `source/js/routes` (ATM line 9):

```
const publicPath = '/your-app/';
```

Don't forget the trailing slash (`/`). In development visit `http://localhost:3000/your-app/`.

### Running in preview production mode

This command will start webpack dev server, but with `NODE_ENV` set to `production`.
Everything will be minified and served.
Hot reload will not work, so you need to refresh the page manually after changing the code.

```
npm run preview
```

### Linting

For linting I'm using [eslint-config-airbnb](https://www.npmjs.com/package/eslint-config-airbnb),
but some options are overridden to my personal preferences.

```
$ npm run lint
```

### Git hooks

Linting pre-push hook is not enabled by default.
It will prevent the push if lint task fails,
but you need to add it manually by running:

```
npm run hook-add
```

To remove it, run this task:

```
npm run hook-remove
```


