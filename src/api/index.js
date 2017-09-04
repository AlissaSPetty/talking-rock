import promise from 'es6-promise';
import fetch from 'isomorphic-fetch';
promise.polyfill();

function fetchContent(opts) {
  return new promise(function (resolve, reject) {
    let endpoint = selectEndpoint(opts);
    // Local testing garbage to delete
    if (endpoint == 'localtest') {
      resolve(testData);
    }
    else {
      // TODO: Add more options in/ POST, params etc.
      fetch(endpoint)
        .then(function(response) {
          return response.json();
        })
        .then(function(response) {
          resolve(response);
        });
    }
  });
}

export default {
  fetchContent,
};