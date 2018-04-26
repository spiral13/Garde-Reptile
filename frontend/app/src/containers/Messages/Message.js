/**
 * Npm import
 */
import { connect } from 'react-redux';

/**
 * Local import
 */
import Message from 'src/components/Messages/Message';

/**
 * Code
 */
// Données
const mapStateToProps = (state, ownProps) => ({
  ...state.messages.list[ownProps.id],
  myself: state.settings.username === state.messages.list[ownProps.id].username,
});

// Actions
const mapDispatchToProps = {};

// Container
const MessageContainer = connect(mapStateToProps, mapDispatchToProps)(Message);

/**
 * Export
 */
export default MessageContainer;
