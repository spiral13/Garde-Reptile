/**
 * Npm import
 */
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';

/**
 * Local import
 */
import Form from 'src/components/Form';

import { sendMessage, changeInputForm } from 'src/store/reducers/form';

/**
 * Code
 */
// Données
const mapStateToProps = state => ({
  inputValue: state.form.input,
});

// Actions
// const mapDispatchToProps = dispatch => ({
//   toggleSettings: () => {
//     dispatch(toggleSettings());
//   },
// });
const mapDispatchToProps = dispatch => ({
  actions: bindActionCreators({ sendMessage, changeInputForm }, dispatch),
});

// Container
const FormContainer = connect(mapStateToProps, mapDispatchToProps)(Form);

/**
 * Export
 */
export default FormContainer;
