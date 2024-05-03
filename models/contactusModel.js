const { pool } = require('../db/db-config');
//const bcrypt = require('bcrypt');

module.exports = {
  createContactUs: async (name, coName, email, phone, subject, message) => {
    try {
      const [results] = await pool
        .promise()
        .query(
          'INSERT INTO `contact_us` (`name`, `company`, `email`, `phone`, `subject`, `message`) VALUES (?, ?, ?, ?, ?, ?)',
          [name, coName, email, phone, subject, message]
        );
      return results; // Assuming there's only one user with the username
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
  getAllContactUs: async () => {
    try {
      const [result] = await pool
        .promise()
        .query('SELECT * FROM `contact_us`;');
      return result;
    } catch (err) {
      console.log(err);
      throw err;
    }
  },
};
