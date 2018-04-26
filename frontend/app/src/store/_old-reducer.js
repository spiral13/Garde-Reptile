/*
 * InitialState
 */
const initialState = {
  // Messages
  messages: [],

  // Settings
  username: 'anonymous',
  settingsOpen: false,
  settingsInput: '',

  // Form
  formInput: '',
};

/*
 * Types
 */
// Settings
const SETTINGS_TOGGLE = 'SETTINGS_TOGGLE';
const SETTINGS_CHANGE_INPUT = 'SETTINGS_CHANGE_INPUT';
const SETTINGS_SET_USERNAME = 'SETTINGS_SET_USERNAME';

// Form
const FORM_CHANGE_INPUT = 'FORM_CHANGE_INPUT';

export const SEND_MESSAGE = 'SEND_MESSAGE';

const ADD_MESSAGE = 'ADD_MESSAGE';

/*
 * Reducer
 */
const reducer = (state = initialState, action = {}) => {
  switch (action.type) {
    // Settings
    case SETTINGS_TOGGLE:
      return {
        ...state,
        settingsOpen: !state.settingsOpen,
      };
    case SETTINGS_CHANGE_INPUT:
      return {
        ...state,
        settingsInput: action.value,
      };
    case SETTINGS_SET_USERNAME:
      return {
        ...state,
        username: state.settingsInput,
        settingsInput: '',
        settingsOpen: false,
      };

    // Form
    case FORM_CHANGE_INPUT:
      return {
        ...state,
        formInput: action.value,
      };

    case SEND_MESSAGE:
      return {
        ...state,
        formInput: '',
      };

    case ADD_MESSAGE:
      return {
        ...state,
        messages: [...state.messages, action.message],
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

// Form
export const changeInputForm = value => ({
  type: FORM_CHANGE_INPUT,
  value,
});

export const sendMessage = () => ({
  type: SEND_MESSAGE,
});

export const receiveMessage = message => ({
  type: ADD_MESSAGE,
  message,
});

/*
 * Selectors
 */


/*
 * Export
 */
export default reducer;
