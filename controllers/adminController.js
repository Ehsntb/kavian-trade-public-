const adminLogin = require('../models/adminLoginModel');
const productModel = require('../models/productModel');

module.exports = {
  authAdmin: async (req, res) => {
    const { username } = req.body;

    try {
      const user = await adminLogin.getPasswordbyUsername(username);
      console.log(user);
      if (user.length < 1) {
        return res.status(404).render('test', { users: ['not found'] });
      } else {
        return res.render('test', { users: user });
      }

      const isPasswordValid = await adminLogin.comparePassword(user, password);
      if (!isPasswordValid) {
        return res
          .status(401)
          .json({ message: 'Invalid username or password' });
      }

      // Remove sensitive information (e.g., password) before sending the user object
      const sanitizedUser = { ...user };
      delete sanitizedUser.password;

      res.json(sanitizedUser);
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
  getAllProducts: async (req, res) => {
    try {
      const products = await productModel.getAllProducts();
      const categories = await categoryModel.getAllCategories();

      console.log('Products:', products);

      if (products.length < 1) {
        return res.status(404).render('404');
      } else {
        // console.log(product);
        return res.render('...', {
          products: products,
          categories: categories,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
  getProductById: async (req, res) => {
    try {
      const productID = req.params.productID;
      const product = await productModel.getProductByShortLink(productID);
      const categories = await categoryModel.getAllCategories();

      console.log('Product:', product);
      if (!product) {
        return res.status(404).render('404');
      } else {
        // console.log(product);
        return res.render('productPage', {
          product: product,
          categories: categories,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
  addProduct: async (req, res) => {
    try {
      const { product } = req.body;
      const newProduct = await productModel.insertProduct(product);
      return res.render('...', {
        products: newProduct,
      });
    } catch (err) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
  updateProductByID: async (req, res) => {
    try {
      const { product } = req.body;
      const newProduct = await productModel.updateProductByID(product);
      return res.render('...', {
        products: newProduct,
      });
    } catch (err) {
      console.log(err);
      res.status(500).json({ message: err });
    }
  },
  deleteProductsById: async (req, res) => {
    try {
      const productID = req.body.productID;
      const deletedProduct = await productModel.deleteProductByID(productID);
      return res.render('...', {
        products: deletedProduct,
      });
    } catch (err) {
      console.log(err);
      res.status(500).json({ message: err });
    }
  },
};
