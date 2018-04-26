/*
 * Import NPM
 */
import { combineReducers } from 'redux';

/*
 * Local import
 */
import settings from 'src/store/reducers/settings';
import form from 'src/store/reducers/form';
import messages from 'src/store/reducers/messages';

/*
 * Code
 */
const reducers = combineReducers({
  settings,
  form,
  messages,
});

/*
 * Export
 */
export default reducers;
