import React from 'react';
import {render} from 'react-dom';
import { AppContainer } from 'react-hot-loader';

// Components
import App from './views/AppContainer.js';

// Redux
import { Provider } from 'react-redux';
import createStore from '../universal/redux/createStore.js';
import createHistory from 'history/createBrowserHistory';

//Cookies
import { CookiesProvider } from 'react-cookie';

const history = createHistory();
const store = createStore(history);

const renderApp = (Component) => {
    render(
        <CookiesProvider>
          <AppContainer>
            <Provider store={store}>
              <Component history={history} />
            </Provider>
          </AppContainer>
        </CookiesProvider>,
      document.getElementById('root')
    );
}

renderApp(App);

if (module.hot) {
  module.hot.accept('./views/AppContainer.js', () => {
    const nextApp = require('./views/AppContainer.js');
    renderApp(nextApp);
  });
}
