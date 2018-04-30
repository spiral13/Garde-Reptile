/**
 * Npm import
 */
import React from 'react';

/**
 * Local import
 */
import Messages from 'src/containers/Messages';
import Settings from 'src/containers/Settings';
import Form from 'src/containers/Form';


/**
 * Code
 */
const App = () => (
  <div id="app">
    <h1 id="app-title">Chatroom <Settings /> </h1>
    <Messages />
    <Form />
  </div>
);

/**
 * Export
 */
export default App;
