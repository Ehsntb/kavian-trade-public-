const jwt = require("jsonwebtoken");
require("dotenv").config();

module.exports = (req, res, next) => {
  try {
    const token = req.cookies.jwt;
    if (!token) {
      return res.status(401).render("401");
    }
    const decodedToken = jwt.verify(token, process.env.SECRET_KEY);
    const username = decodedToken.username;
    if (req.body.username && req.body.username !== username) {
      return res.status(401).render("401");
    }
    // Token is valid, proceed to the next middleware or route handler
    console.log("Token verified!");
    next();
  } catch (err) {
    console.error("JWT verification error:", err);
    return res.status(401).render("401");
  }
};
