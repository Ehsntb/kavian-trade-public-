const express = require("express");
const router = express.Router();

const aboutusController = require("../controllers/aboutusController");

module.exports = router.get("/aqw", aboutusController.aboutUsHeader);
