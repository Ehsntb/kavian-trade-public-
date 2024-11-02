// middlewares/socketMiddleware.js
const ProductController = require("../controllers/productController");

function socketMiddleware(io) {
  // Handle socket connection
  io.on("connection", (socket) => {
    console.log("A user connected");

    // Use the middleware to handle the 'deleteImage' event
    socket.on("deleteImage", (imageId) => {
      ProductController.deleteImage(socket, imageId);
    });

    socket.on("disconnect", () => {
      console.log("User disconnected");
    });
  });
}

module.exports = socketMiddleware;
