import React, { Component } from 'react';
import App from 'universal/components/App/App';
import PropTypes from 'prop-types';

class AppContainer extends Component {
  static propTypes = {
    children: PropTypes.element.isRequired
  };

  render () {
    return (
      <App {...this.props}/>
    );
  }
}

export default AppContainer;
