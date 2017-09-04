// Libraries
import React, { Component } from  'react';
import {Route, Redirect, Switch} from 'react-router';
import PropTypes from 'prop-types';

// Routes
// For Development only
// import * as RouteMap from '../routes/static.js';

// This is used in production for code splitting via `wepback.config.server.js`
import * as RouteMap from 'universal/routes/async.js';

// Containers
import AppContainer from 'universal/views/App/AppContainer.js';
// import PrivateRouteContainer from 'universal/containers/PrivateRoute/PrivateRouteContainer.js';

class Routes extends Component {
  render () {
    const {
      location
    } = this.props;

    return (
      <AppContainer>
        <Switch>
          <Route exact location={location} path='/' component={RouteMap.Home} />
        </Switch>
      </AppContainer>
    );
  }
}

export default Routes;
