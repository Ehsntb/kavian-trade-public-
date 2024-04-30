const contactusModel = require('../models/contactusModel');
const categoryModel = require('../models/categoryModel');

module.exports = {
  contactusheader: async (req, res) => {
    try {
      const categories = await categoryModel.getAllCategories();
      console.log('categories:', categories);
      if (categories.length < 1) {
        return res.status(404).render('404', { categories: ['not found'] });
      } else {
        // console.log(categories);
        return res.render('contactUs', { categories: categories });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
  submitContact: async (req, res) => {
    try {
      const { name, coName, email, phone, subject, message } = req.body;
      const success = await contactusModel.createContact(
        name,
        coName,
        email,
        phone,
        subject,
        message
      );
      if (success) {
        // Redirect to a success page or display a confirmation message
        res.render('contact_success', {
          message: 'Your message has been submitted!',
        });
      } else {
        // Handle unsuccessful insert (log the error and display an error message)
        console.error('Failed to submit contact message');
        res.render('contact_error', {
          message: 'An error occurred. Please try again later.',
          categories: categories,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
};
