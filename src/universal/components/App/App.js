import React, { Component } from 'react';
import PropTypes from 'prop-types';

import styles from '../../scss/app.scss';

import SuperNav from '../../components/Global/SuperNav.jsx';
import Footer from '../../components/Global/Footer.jsx';

class App extends Component {
  static propTypes = {
    children: PropTypes.element.isRequired
  };

  render () {
    return (
      <div className={styles.app}>
        <SuperNav />
        {this.props.children}
        <Footer />
      </div>
    );
  }
}

export default App; 