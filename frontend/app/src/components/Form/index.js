/**
 * Npm import
 */
import React from 'react';
import PropTypes from 'prop-types';

/**
 * Local import
 */


/**
 * Code
 */
/* eslint-disable */
class Form extends React.Component {
  static propTypes = {
    inputValue: PropTypes.string.isRequired,
    actions: PropTypes.objectOf(PropTypes.func.isRequired).isRequired,
  };

  handleChange = (evt) => {
    // Je recup la value depuis la cible de l'event
    const { value } = evt.target;
    // j'exécute la fonction fournie en passant la value
    this.props.actions.changeInputForm(value);
  }

  handleSubmit = (evt) => {
    // J'empeche le comportement par défaut
    evt.preventDefault();
    // J'exécute la fonction fournie par les props
    this.props.actions.sendMessage();
  }

  render() {
    const { inputValue } = this.props;
    return (
      <form id="form" onSubmit={this.handleSubmit}>
        <input
          type="text"
          id="form-input"
          placeholder="votre message"
          value={inputValue}
          onChange={this.handleChange}
        />
      </form>
    );
  }
}

/**
 * Export
 */
export default Form;
