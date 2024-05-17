const adminLogin = require("../models/adminLoginModel");
const productModel = require("../models/productModel");
const contactusModel = require("../models/contactusModel");
const categoryModel = require("../models/categoryModel");
const { getAllCategories } = require("./categoryController");

module.exports = {
  authAdmin: async (req, res) => {
    const { username } = req.body;

    try {
      const user = await adminLogin.getPasswordbyUsername(username);
      console.log(user);
      if (user.length < 1) {
        return res.status(404).render("test", { users: ["not found"] });
      } else {
        return res.render("test", { users: user });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
  getAllProducts: async (req, res) => {
    try {
      const products = await productModel.getAllProducts();
      const categories = await categoryModel.getAllCategories();

      console.log("Products:", products);

      if (products.length < 1) {
        return res.status(404).render("404");
      } else {
        // console.log(product);
        return res.render("admin/layout/AllProductsPage", {
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

      console.log("Product:", product);
      if (!product) {
        return res.status(404).render("404");
      } else {
        // console.log(product);
        return res.render("productPage", {
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
      console.log(req.body);
      // const { product } = req.body.title;
      // console.log(product);
      // const newProduct = await productModel.insertProduct(product);
      return res.redirect("/admin/products", 200);
    } catch (err) {
      console.error(err);
      res.status(500).json({ message: err });
    }
  },

  updateProductByID: async (req, res) => {
    try {
      const { product } = req.body;
      const newProduct = await productModel.updateProductByID(product);
      return res.render("...", {
        products: newProduct,
      });
    } catch (err) {
      console.log(err);
      res.status(500).json({ message: err });
    }
  },

  deleteProductsById: async (req, res) => {
    try {
      const productID = req.params.id;
      const deletedProduct = await productModel.deleteProductsById(productID);
      return res.redirect("/admin/products", 200);
    } catch (err) {
      console.log(err);
      res.status(500).json({ message: err });
    }
  },

  getAllContactUs: async (req, res) => {
    try {
      const contactUs = await contactusModel.getAllContactUs();
      // console.log('categories:', categories);
      if (contactUs.length < 1) {
        return res.status(404).render("404", { contactUs: ["not found"] });
      } else {
        // console.log(categories);
        return res.render("admin/layout/contactUsPage", {
          results: contactUs,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },

  getAllCategoriesAddProduct: async (req, res) => {
    try {
      const categories = await categoryModel.getAllCategories();
      console.log("categories:", categories);
      if (categories.length < 1) {
        return res.status(404).render("404");
      } else {
        // console.log(categories);
        return res.render("admin/layout/addProductPage", {
          categories: categories,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
};
