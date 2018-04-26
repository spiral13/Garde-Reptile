/**
 * Npm import
 */


/**
 * Local import
 */


/**
 * Code
 */
import { receiveMessage } from './reducers/messages';
import { SEND_MESSAGE } from './reducers/form';

const WEBSOCKET_CONNECT = 'WEBSOCKET_CONNECT';

let socket;

const socketMiddleware = store => next => (action) => {
  switch (action.type) {
    case WEBSOCKET_CONNECT:
      socket = window.io();
      socket.on('send_message', (message) => {
        store.dispatch(receiveMessage(message));
      });
      break;

    case SEND_MESSAGE: {
      const state = store.getState();

      const content = state.form.input.trim();

      if (content !== '') {
        const message = {
          username: state.settings.username,
          content,
        };
        socket.emit('send_message', message);
      }
    }
      break;
    default:
      break;
  }

  // Passe au suivant
  next(action);
};

export const wsConnect = () => ({
  type: WEBSOCKET_CONNECT,
});

/**
 * Export
 */
export default socketMiddleware;
