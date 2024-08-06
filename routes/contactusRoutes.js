const express = require("express");
const router = express.Router();

const contactusController = require("../controllers/contactusController");

module.exports = router.get("/contactus", contactusController.contactUsHeader); // GET request
module.exports = router.post("/contactus", contactusController.submitContact); // POST request
