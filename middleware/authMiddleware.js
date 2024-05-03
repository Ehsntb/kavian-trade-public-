const jwt = require('jsonwebtoken');
require('dotenv').config();

module.exports = (req, res, next) => {
  try {
    const token = req.headers.authorization;
    const decodedToken = jwt.verify(token, process.env.SECRET_KEY);
    const username = decodedToken.username;
    if (req.body.username && req.body.username !== username) {
      res.status(401);
    } else {
      next();
    }
  } catch (err) {
    console.log(err);
    res.status(401).json({
      error: new Error('Invalid request!'),
    });
  }
};
