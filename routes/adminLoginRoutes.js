const express = require('express');
const router = express.Router();
const adminLoginController = require('../controllers/adminLoginController');

// Users Endpoint
// module.exports = router.get(
//   '/api/adminLogin/',
//   adminLoginController.authAdmin,
//   async (req, res) => {
//     const { username } = req.body;
//     res.json(username);
//   }
// );

module.exports = router.get('/test', adminLoginController.authAdmin); // GET request for checking if user is authenticated
