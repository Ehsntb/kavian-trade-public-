const category = require('../models/categoryModel');

module.exports = {
  getAllCategories: async (req, res) => {
    try {
      const categories = await category.getAllCategories();
      console.log('categories:', categories);
      if (categories.length < 1) {
        return res.status(404).render('index', { categories: ['not found'] });
      } else {
        // console.log(categories);
        return res.render('index', { categories: categories });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
};
