import io from "socket.io-client"; // Correctly import the Socket.io client library

// Connect to your Socket.io server
const socket = io("http://localhost:3000"); // Replace with your actual server URL
console.log("start");
// Once the connection is established
socket.on("connect", () => {
  console.log("Connected to server");

  // Emit the deleteImage event with an image ID
  socket.emit("deleteImage", 1); // Replace '1' with the image ID you want to delete

  // Listen for the server's response
  socket.on("deleteImageResponse", (data) => {
    console.log("Response from server:", data); // Output the response
    socket.disconnect(); // Close the connection after receiving the response
  });
});

// Handle disconnection
socket.on("disconnect", () => {
  console.log("Disconnected from server");
});
