/*
 * InitialState
 */
const initialState = {
  username: 'anonymous',
  open: false,
  input: '',
};

/*
 * Types
 */
// Settings
const SETTINGS_TOGGLE = 'SETTINGS_TOGGLE';
const SETTINGS_CHANGE_INPUT = 'SETTINGS_CHANGE_INPUT';
const SETTINGS_SET_USERNAME = 'SETTINGS_SET_USERNAME';

/*
 * Reducer
 */
const reducer = (state = initialState, action = {}) => {
  switch (action.type) {
    // Settings
    case SETTINGS_TOGGLE:
      return {
        ...state,
        open: !state.open,
      };
    case SETTINGS_CHANGE_INPUT:
      return {
        ...state,
        input: action.value,
      };
    case SETTINGS_SET_USERNAME:
      return {
        ...state,
        username: state.input,
        input: '',
        open: false,
      };
    default:
      return state;
  }
};

/*
 * actionCreators
 */
// Settings
export const toggleSettings = () => ({
  type: SETTINGS_TOGGLE,
});

export const changeInputSettings = value => ({
  type: SETTINGS_CHANGE_INPUT,
  value,
});

export const setUsername = () => ({
  type: SETTINGS_SET_USERNAME,
});

/*
 * Export
 */
export default reducer;
