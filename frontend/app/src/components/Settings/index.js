/**
 * Npm import
 */
import React from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames';


/**
 * Local import
 */


/**
 * Code
 */
class Settings extends React.Component {
  static propTypes = {
    open: PropTypes.bool.isRequired,
    inputValue: PropTypes.string.isRequired,
    actions: PropTypes.objectOf(PropTypes.func.isRequired).isRequired,
  };


  handleChange = (evt) => {
    // Je recup la value depuis la cible de l'event
    const { value } = evt.target;
    // j'exécute la fonction fournie en passant la value
    this.props.actions.changeInputSettings(value);
  }

  handleSubmit = (evt) => {
    // J'empeche le comportement par défaut
    evt.preventDefault();
    // J'exécute la fonction fournie par les props
    this.props.actions.setUsername();
  }

  render() {
    const { actions, open, inputValue } = this.props;
    return (
      <div
        id="settings"
        className={
          classNames({
            'settings--open': open,
          })
        }
      >
        <div id="settings-toggle" onClick={actions.toggleSettings} />
        <form id="settings-form" onSubmit={this.handleSubmit}>
          <input
            type="text"
            id="settings-input"
            placeholder="username"
            value={inputValue}
            onChange={this.handleChange}
          />
          <button id="settings-submit">ok</button>
        </form>
      </div>
    );
  }
}

/**
 * Export
 */
export default Settings;
