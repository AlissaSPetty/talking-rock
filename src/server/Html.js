// Libraries
import React, { Component } from 'react';
import {StaticRouter} from 'react-router';
import {renderToString} from 'react-dom/server';
import PropTypes from 'prop-types';
import Typekit from 'react-typekit';
import {Helmet} from "react-helmet";

// Redux
import { Provider } from 'react-redux';

//Cookies
import { CookiesProvider } from 'react-cookie';

class Html extends Component {
  static propTypes = {
    url: PropTypes.string.isRequired,
    store: PropTypes.object.isRequired,
    title: PropTypes.string.isRequired,
    assets: PropTypes.object
  }

  render () {
    const PROD = process.env.NODE_ENV === 'production';

    const {
      title,
      store,
      assets,
      url,
      context
    } = this.props;

    const {
      manifest,
      app,
      vendor
    } = assets || {};

    let state = store.getState();

    const initialState = `window.__INITIAL_STATE__ = ${JSON.stringify(state)}`;
    const Layout =  PROD ? require( '../../build/prerender.js') : () => {};

    const root = PROD && renderToString(
      <CookiesProvider>
        <Provider store={store}>
          <StaticRouter location={url} context={context}>
            <Layout />
          </StaticRouter>
        </Provider>
      </CookiesProvider>
    );

    const helmet = Helmet.renderStatic();
    const htmlAttrs = helmet.htmlAttributes.toComponent();
    const bodyAttrs = helmet.bodyAttributes.toComponent();

    return (
     <html {...htmlAttrs}>
       <head>
          <meta charSet="utf-8"/>
          <title>{title}</title>
          <meta name="description" content="" />
          <meta name="Copyright" content="Copyright &copy; Talking Rock 2017. All Rights Reserved." />  
          <meta name="viewport" content="width=device-width, initial-scale=1.0 minimal-ui" />
          <meta name="mobile-web-app-capable" content="yes" />
          <link rel="shortcut icon" sizes="1024x1024" href="" />
          <link rel="profile" href="http://gmpg.org/xfn/11" />
          <link rel="pingback" href="https://www.talkingrock.com/xmlrpc.php" />
          <link rel="dns-prefetch" href="//www.talkingrock.com" />
          <link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
          <link rel="dns-prefetch" href="//s.w.org" />
          <link rel="alternate" type="application/rss+xml" title="Talking Rock &raquo; Feed" href="https://www.talkingrock.com/feed/" />
          <link rel="alternate" type="application/rss+xml" title="Talking Rock &raquo; Comments Feed" href="https://www.talkingrock.com/comments/feed/" />
         {PROD && <link rel="stylesheet" href="/static/prerender.css" type="text/css" />}
        {helmet.title.toComponent()}
        {helmet.meta.toComponent()}
        {helmet.link.toComponent()}  
       </head>
       <body {...bodyAttrs}>
         <script dangerouslySetInnerHTML={{__html: initialState}} />
         {PROD ? <div id="root" dangerouslySetInnerHTML={{__html: root}}></div> : <div id="root"></div>}
          {PROD && <script dangerouslySetInnerHTML={{__html: manifest.text}}/>}
          {PROD && <script src={vendor.js}/>}
         <script src={PROD ? app.js : '/static/app.js'} />
       </body>
     </html>
    );
  }

}

export default Html;
