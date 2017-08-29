import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import {BrowserRouter as Router, Route} from 'react-router-dom';

class Test extends React.Component {
  render() {
    return (
      <ReactRouter.Router>
        <h1>hi</h1>
      </ReactRouter.Router>  
    );
  }
}

ReactDOM.render(<Test />, document.querySelector('#app'));