/**
 * Npm import
 */
import React from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames';
import { Formatizer } from 'formatizer';

/**
 * Local import
 */


/**
 * Code
 */
const Message = ({ username, content, myself }) => (
  <div className={classNames(
    'message',
    {
      'message--own': myself,
    },
  )}
  >
    <div className="message-user">{username}</div>
    <div className="message-content">
      <Formatizer>
        {content}
      </Formatizer>
    </div>
  </div>
);

Message.propTypes = {
  username: PropTypes.string.isRequired,
  content: PropTypes.string.isRequired,
  myself: PropTypes.bool.isRequired,
};

/**
 * Export
 */
export default Message;
