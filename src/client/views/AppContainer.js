import React, {Component} from 'react';
import { ConnectedRouter } from 'react-router-redux';
import {Route} from 'react-router';
import PropTypes from 'prop-types';
import ReactGA from 'react-ga';
// Components
import Routes from 'universal/routes/Routes.js';

ReactGA.initialize('');

class AppContainer extends Component {
  static propTypes = {
    history: PropTypes.object.isRequired
  }

  componentDidMount() {
    const { history } = this.props;

    //When the App first loads - report to GA
    ReactGA.set({ page: history.location.pathname });
    ReactGA.pageview(history.location.pathname);

    //Each time the user goes to a new route - report to GA
    history.listen((location, action) => {
      ReactGA.set({ page: location.pathname });
      ReactGA.pageview(location.pathname);
    });

  render () {
    const {
      history
    } = this.props;

    return (
      <ConnectedRouter history={history} >
        <Route render={({location}) => {
          return (<Routes location={location} />)
        }}/>
      </ConnectedRouter>
    ) ;
  }
}

export default AppContainer;
