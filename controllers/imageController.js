// controllers/ImageController.js
const imageModel = require("../models/imageModel");
const productModel = require("../models/productModel");
const categoryModel = require("../models/categoryModel");
const fs = require("fs");
const path = require("path");

module.exports = {
  deleteImageById: async (req, res) => {
    try {
      const imageId = req.params.id;
      // Find the image in the database
      const image = await imageModel.getImageById(imageId);
      const product = await productModel.getProductById(image.product_id);
      const categories = await categoryModel.getAllCategories();

      if (image) {
        const imagePath = path.join(
          __dirname,
          "../views/images/productsImages",
          image.image_url
        );
        console.log(imagePath);

        // Delete the file from the file system
        fs.unlink(imagePath, async (err) => {
          if (err) {
            console.error("Error deleting file:", err);
            return res
              .status(500)
              .json({ error: "File not found or could not be deleted" });
          } else {
            const result = await imageModel.deleteImageById(imageId);

            return res.render("admin/layout/editProductPage", {
              product: product,
              categories: categories,
            });
          }
        });
      } else {
        res.status(500).json({ message: "image not found!" });
      }
    } catch (err) {
      console.log(err);
      res.status(500).json({ message: err });
    }
  },
};
