import { Map } from 'immutable';

import {
  GET_INFO_ASYNC_START,
  GET_INFO_ASYNC_ERROR,
  GET_INFO_ASYNC_SUCCESS,
} from '../actions/app';

const initialState = Map({
  asyncData: null,
  asyncError: null,
  asyncLoading: false,
});
const actionsMap = {

  // Async action
  [GET_INFO_ASYNC_START]: (state) => {
    return state.merge({
      asyncError: null,
      asyncLoading: true

    });
  },
  [GET_INFO_ASYNC_ERROR]: (state, action) => {
    return state.merge({
      asyncError: action.data,
      asyncLoading: false,
    });
  },
  [GET_INFO_ASYNC_SUCCESS]: (state, action) => {
    return state.merge({
      asyncData: action.data,
      asyncLoading: false,
    });
  },

};

export default function reducer(state = initialState, action = {}) {
  const fn = actionsMap[action.type];
  return fn ? fn(state, action) : state;
}