/*
 * Require
 */
const express = require('express');
const join = require('path').join;
const Server = require('http').Server;
const socket = require('socket.io');


/*
 * Vars
 */
const app = express();
const server = Server(app);
const io = socket(server);

const indexPath = join(__dirname, '/rAssets/index.html');
const assetsPath = join(__dirname, 'rAssets');


/*
 * Express
 */
// Static files
app.use(express.static(assetsPath, { index: false }));

// Route
app.get('/', (req, res) => {
  res.sendFile(indexPath);
});


/*
 * Socket.io
 */
let id = 0;
io.on('connection', (socket) => {
  socket.on('send_message', (message) => {
    message.id = ++id;
    io.emit('send_message', message);
  });
});


/*
 * Server
 */
server.listen(3000, () => {
  console.log('listening on *:3000');
});
