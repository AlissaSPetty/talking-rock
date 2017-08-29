var React = require("react");
var ReactDOM = require("react-dom");
var App = require('./components/App');
var ReactRouter = require("react-router-dom");

ReactDOM.render(
  <ReactRouter.Router>
    <App />,
  </ReactRouter.Router>,
  document.querySelector('#app')
);