const express = require('express');
const app = express.Router();
const adminController = require('../controllers/adminController');
const authMiddleware = require('../middleware/authMiddleware');

// Login Route
app.post('/login', async (req, res) => {
  const { username, password } = req.body;
  try {
    const [rows] = await db.execute(
      'SELECT * FROM admins WHERE username = ? AND password = ?',
      [username, password]
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

app.use(authMiddleware);

app.get('/admin/products', adminController.getAllProducts);
app.get('/admin/products/:id', adminController.getProductById);
app.post('/admin/addproduct', adminController.addProduct);
app.put('/admin/updateproduct/:id', adminController.updateProductByID);
