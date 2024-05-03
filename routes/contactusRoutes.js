const express = require('express');
const router = express.Router();

const contactusController = require('../controllers/contactusController');

// Users Endpoint
// module.exports = router.get(
//   '/category/',
//   categoryController.category,
//   async (req, res) => {
//     res.json();
//   }
// );

module.exports = router.get('/contact_us', contactusController.contactUsHeader); // GET request
module.exports = router.post('/contact_us', contactusController.submitContact); // POST request
