const express = require("express");
const router = express.Router();

const categoryController = require("../controllers/categoryController");

// Users Endpoint
// module.exports = router.get(
//   '/category/',
//   categoryController.category,
//   async (req, res) => {
//     res.json();
//   }
// );

module.exports = router.get("/", categoryController.getAllCategories); // GET request
