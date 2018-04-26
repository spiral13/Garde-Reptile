/**
 * Npm import
 */
import { connect } from 'react-redux';

/**
 * Local import
 */
import Messages from 'src/components/Messages';

/**
 * Code
 */
// Données
const mapStateToProps = state => ({
  messagesIds: state.messages.ids,
});

// Actions
const mapDispatchToProps = {};

// Container
const MessagesContainer = connect(mapStateToProps, mapDispatchToProps)(Messages);

/**
 * Export
 */
export default MessagesContainer;
