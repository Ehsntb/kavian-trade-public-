const { randomInt } = require("crypto");
const multer = require("multer");
const path = require("path");

// Set up storage engine
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, "/views/images/productsImages");
  },
  filename: function (req, file, cb) {
    cb(null, Date.now() + path.extname(file.originalname) + randomInt);
  },
});

// Initialize upload
module.exports = multer({
  storage: storage,
  limits: { fileSize: 5000000 }, // Limit file size to 1MB
  fileFilter: function (req, file, cb) {
    checkFileType(file, cb);
  },
});

// Check file type
function checkFileType(file, cb) {
  const filetypes = /jpeg|jpg|png/;
  const extname = filetypes.test(path.extname(file.originalname).toLowerCase());
  const mimetype = filetypes.test(file.mimetype);

  if (mimetype && extname) {
    return cb(null, true);
  } else {
    cb("Error: Images Only!");
  }
}
