const categoryModel = require("../models/categoryModel");

module.exports = {
  aboutUsHeader: async (req, res) => {
    try {
      const categories = await categoryModel.getAllCategories();
      // console.log('categories:', categories);

      // console.log(categories);
      return res.render("AboutUs", {
        categories: categories,
      });
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
};
