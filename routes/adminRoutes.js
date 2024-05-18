const express = require("express");
const router = express.Router();
const jwt = require("jsonwebtoken");

const { pool } = require("../db/db-config");
const adminController = require("../controllers/adminController");
const authMiddleware = require("../middleware/authMiddleware");
const upload = require("../middleware/multer");

const app = express();

module.exports = app.use(authMiddleware);

// Login Route
module.exports = router
  .get("/login", async (req, res) => {
    res.render("adminLogin");
  })
  .post("/login", async (req, res) => {
    const data = req.body;
    try {
      const [rows] = await pool
        .promise()
        .query("SELECT * FROM admins WHERE username = ? AND password = ?", [
          data.username,
          data.password,
        ]);
      if (rows.length === 0) {
        return res.status(401).json({ error: "Invalid credentials" });
      }
      const user = rows[0];
      const payload = {
        username: user.username,
      };
      const token = jwt.sign(payload, process.env.SECRET_KEY, {
        expiresIn: "1h", // Token expires in 1 hour
      });
      console.log({ token });
      // res.json({ token });
      res.cookie("jwt", token, { httpOnly: true });
      res.json({ result: "Login successful!" });
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: "Internal Server Error" });
    }
  });

module.exports = router.get("/logout", (req, res) => {
  // Clear the JWT token cookie (if you are using JWT)
  res.clearCookie("jwt");

  // Alternatively, if you are using sessions:
  // req.session.destroy(); // This will clear all session data

  // Redirect the user to the login page or any other page
  res.redirect("/login");
});

module.exports = router.get(
  "/admin/products",
  // authMiddleware,
  adminController.getAllProducts
);

module.exports = router.get(
  "/admin/product/:id",
  adminController.getProductById
);

module.exports = router
  .get("/admin/addproduct", adminController.getAllCategoriesAddProduct)
  .post("/admin/addproduct", adminController.addProduct);

// module.exports = router.put(
//   '/admin/updateproduct/:id',
//   adminController.updateProductByID
// );

module.exports = router.post(
  "/admin/deleteproduct/:id",
  adminController.deleteProductsById
);

module.exports = router.get(
  "/admin/contactus",
  // authMiddleware,
  adminController.getAllContactUs
);

module.exports = router.get("/test");

module.exports = router.get("/admin", (req, res) => {
  res.redirect("/admin/products");
});
