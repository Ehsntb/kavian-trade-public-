const express = require('express');
const router = express.Router();
const jwt = require('jsonwebtoken');

const adminController = require('../controllers/adminController');
const authMiddleware = require('../middleware/authMiddleware');

const app = express();

// Login Route
module.exports = router.post('/login', async (req, res) => {
  const data = req.body;
  try {
    const [rows] = await db.execute(
      'SELECT * FROM admins WHERE username = ? AND password = ?',
      [data.username, data.password]
    );
    if (rows.length === 0) {
      return res.status(401).json({ error: 'Invalid credentials' });
    }
    const user = rows[0];
    const payload = {
      userId: user.id,
      username: user.username,
    };
    const token = jwt.sign(payload, process.env.SECRET_KEY, {
      expiresIn: '1h', // Token expires in 1 hour
    });
    res.json({ token });
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

module.exports = app.use(authMiddleware);

module.exports = router.get('/admin/products', adminController.getAllProducts);
module.exports = router.get(
  '/admin/products/:id',
  adminController.getProductById
);
module.exports = router.post('/admin/addproduct', adminController.addProduct);
module.exports = router.put(
  '/admin/updateproduct/:id',
  adminController.updateProductByID
);
