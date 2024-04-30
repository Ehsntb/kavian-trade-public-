const express = require('express');
const router = express.Router();

const productController = require('../controllers/productController');

const app = express();
app.use(express.static('../views'));

module.exports = router.get('/product', productController.getAllProducts);
module.exports = router.get(
  '/product/:shortlink',
  productController.getProductByShortLink
);
module.exports = router.get(
  '/productc/:categoryshortlink',
  productController.getProductsByCategoryShortLink
);
