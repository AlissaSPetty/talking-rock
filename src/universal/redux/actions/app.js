import api from 'api';

export const GET_INFO_ASYNC_START = 'GET_INFO_ASYNC_START';
export const GET_INFO_ASYNC_ERROR = 'GET_INFO_ASYNC_ERROR';
export const GET_INFO_ASYNC_SUCCESS = 'GET_INFO_ASYNC_SUCCESS';

//Async actions
function getInfoAsyncStart() {
  return {
    type: GET_INFO_ASYNC_START,
  };
}

function getInfoAsyncSuccess(data) {
  return {
    type: GET_INFO_ASYNC_SUCCESS,
    data,
  };
}

function getInfoAsyncError(error) {
  return {
    type: GET_INFO_ASYNC_ERROR,
    error,
  };
}

export function clearData() {
  return function(dispatch) {
    dispatch(getInfoAsyncSuccess(null));
  }
}

export function getInfoAsync(opts) {
  return function(dispatch){
    dispatch(getInfoAsyncStart(opts));

    api.fetchContent(opts)
      .then(data => dispatch(getInfoAsyncSuccess(data)))
      .catch(data => dispatch(getInfoAsyncError(data)));
  }
}