/*
 * Npm import
 */
import { applyMiddleware, compose, createStore } from 'redux';


/*
 * Local import
 */
import reducers from './reducers';
import socket from './socket';


/*
 * Code
 */
// Redux DevTools extension
let devTools = [];
if (window.devToolsExtension) {
  devTools = [window.devToolsExtension()];
}

// Middlewares
const socketMiddleware = applyMiddleware(socket);
const middlewares = compose(socketMiddleware, ...devTools);

// Store
const store = createStore(reducers, middlewares);


/*
 * Export default
 */
export default store;
