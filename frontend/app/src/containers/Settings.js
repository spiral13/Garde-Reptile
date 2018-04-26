/**
 * Npm import
 */
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';

/**
 * Local import
 */
import Settings from 'src/components/Settings';

import { toggleSettings, changeInputSettings, setUsername } from 'src/store/reducers/settings';

/**
 * Code
 */
// Données
const mapStateToProps = state => ({
  open: state.settings.open,
  inputValue: state.settings.input,
});

// Actions
// const mapDispatchToProps = dispatch => ({
//   toggleSettings: () => {
//     dispatch(toggleSettings());
//   },
// });
const mapDispatchToProps = dispatch => ({
  actions: bindActionCreators({ toggleSettings, changeInputSettings, setUsername }, dispatch),
});

// Container
const SettingsContainer = connect(mapStateToProps, mapDispatchToProps)(Settings);

/**
 * Export
 */
export default SettingsContainer;
