/**
 * Npm import
 */
import React from 'react';
import PropTypes from 'prop-types';

/**
 * Local import
 */
import Message from 'src/containers/Messages/Message';

/**
 * Code
 */
const Messages = ({ messagesIds }) => (
  <div id="messages">
    {messagesIds.map(id => (
      <Message
        key={id}
        id={id}
      />
    ))}
  </div>
);

Messages.propTypes = {
  messagesIds: PropTypes.arrayOf(PropTypes.number.isRequired).isRequired,
};
/**
 * Export
 */
export default Messages;
