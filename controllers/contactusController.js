const contactusModel = require("../models/contactusModel");
const categoryModel = require("../models/categoryModel");

module.exports = {
  contactUsHeader: async (req, res) => {
    try {
      const contactUs = await contactusModel.getAllContactUs();
      const categories = await categoryModel.getAllCategories();
      // console.log('categories:', categories);
      if (contactUs.length < 1) {
        return res.status(404).render("404", { contactUs: ["not found"] });
      } else {
        // console.log(categories);
        return res.render("ContactUs", {
          contactUs: contactUs,
          categories: categories,
        });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
  submitContact: async (req, res) => {
    try {
      // const { coName, email, phone, subject, message } = req.body;
      const data = req.body;
      console.log(data);
      const result = await contactusModel.createContact(
        data.name,
        data.coName,
        data.email,
        data.phone,
        data.subject,
        data.message
      );
      if (result) {
        res.status(
          200,
          json({
            message: "Your message has been submitted!",
          })
        );
      } else {
        res.status(500).json({ message: "Failed to submit contact message" });
      }
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
};
