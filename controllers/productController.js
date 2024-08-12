const productModel = require("../models/productModel");
const categoryModel = require("../models/categoryModel");

module.exports = {
  getAllProducts: async (req, res) => {
    try {
      const products = await productModel.getAllProducts();
      const categories = await categoryModel.getAllCategories();

      console.log("Products:", products);

      if (products.length < 1) {
        return res.render("productList", {
          products: ["not found"],
          categories: categories,
        });
      } else {
        // console.log(product);
        return res.render("productList", {
          products: products,
          categories: categories,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
  getProductByShortLink: async (req, res) => {
    try {
      const shortlink = req.params.shortlink;
      const product = await productModel.getProductByShortLink(shortlink);
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
  getProductsByCategoryShortLink: async (req, res) => {
    try {
      const categoryshortlink = req.params.categoryshortlink;
      const products = await productModel.getProductByCategoryShortLink(
        categoryshortlink
      );
      const categories = await categoryModel.getAllCategories();

      console.log("Products:", products);
      if (!products) {
        return res.status(404).render("404");
      } else {
        // console.log(product);
        return res.render("productList", {
          products: products,
          categories: categories,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
};
