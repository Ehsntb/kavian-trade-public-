const adminLogin = require("../models/adminLoginModel");
const productModel = require("../models/productModel");
const contactusModel = require("../models/contactusModel");
const categoryModel = require("../models/categoryModel");

const path = require("path");
const multer = require("multer");
const { randomInt } = require("crypto");

// Setup multer for image uploads
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, "views/images/productsImages/");
  },
  filename: (req, file, cb) => {
    cb(
      null,
      Date.now() +
        "_" +
        randomInt(10).toString() +
        "_" +
        path.extname(file.originalname)
    );
  },
});
const upload = multer({ storage });

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

      // console.log("Products:", products);

      if (products.length < 1) {
        return res.render("admin/layout/allProductsPage", {
          products: ["not found"],
        });
      } else {
        // console.log(product);
        return res.render("admin/layout/allProductsPage", {
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
      const productID = req.params.id;
      const product = await productModel.getProductById(productID);
      const categories = await categoryModel.getAllCategories();

      console.log("Product:", product);
      if (!product) {
        return res.status(404).render("404");
      } else {
        // console.log(product);
        return res.render("admin/layout/editProductPage", {
          product: product,
          categories: categories,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },

  //chatgpt

  addProduct: [
    upload.fields([
      { name: "main_image", maxCount: 1 },
      { name: "gallery_images[]", maxCount: 100 },
    ]),
    async (req, res) => {
      const {
        title,
        short_description,
        long_description,
        short_link,
        location,
        category_id,
      } = req.body;
      const mainImage = req.files["main_image"]
        ? req.files["main_image"][0].filename
        : null;

      try {
        // Add product to the database
        const productId = await productModel.addProduct(
          title,
          short_description,
          long_description,
          mainImage,
          short_link,
          location,
          category_id
        );

        // Add gallery images to the database
        const galleryImages = req.files["gallery_images[]"];
        if (galleryImages) {
          for (const image of galleryImages) {
            await productModel.addGalleryImage(productId, image.filename, "0");
          }
        }

        res.redirect("/admin/products");
      } catch (err) {
        console.error(err);
        console.log(err);
        res.status(500).send("Server Error");
      }
    },
  ],

  updateProductByID: [
    // upload.fields([
    //   { name: "main_image", maxCount: 1 },
    //   { name: "gallery_images[]", maxCount: 100 },
    // ]),
    async (req, res) => {
      try {
        const productID = req.params.id;
        const {
          title,
          short_description,
          long_description,
          short_link,
          location,
          category_id,
        } = req.body;
        console.log(title);
        // const mainImage = req.files["main_image"]
        //   ? req.files["main_image"][0].filename
        //   : null;

        // Add product to the database
        await productModel.updateProductById(
          title,
          short_description,
          long_description,
          short_link,
          location,
          category_id,
          productID
        );

        // Add gallery images to the database
        // const galleryImages = req.files["gallery_images[]"];
        // if (galleryImages) {
        //   for (const image of galleryImages) {
        //     await productModel.addGalleryImage(productId, image.filename, "0");
        //   }
        // }

        res.redirect("/admin/products");
      } catch (err) {
        // console.error(err);
        console.log(err);
        res.status(500).send("Server Error");
      }
    },
  ],

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
        return res.render("admin/layout/contactUsPage", {
          results: ["not found"],
        });
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

  getAllCategories: async (req, res) => {
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
