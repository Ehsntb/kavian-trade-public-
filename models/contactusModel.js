const { pool } = require('../db/db-config');
//const bcrypt = require('bcrypt');

module.exports = {
  createContact: async (name, coName, email, phone, subject, message) => {
    try {
      const [results] = await pool
        .promise()
        .query(
          'INSERT INTO `contact_us` (`name`, `company`, `email`, `phone`, `subject`, `message`) VALUES (?, ?, ?, ?, ?, ?)',
          name,
          coName,
          email,
          phone,
          subject,
          message
        );
      return results; // Assuming there's only one user with the username
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
};
