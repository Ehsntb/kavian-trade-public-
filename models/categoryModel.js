const { pool } = require('../db/db-config');
//const bcrypt = require('bcrypt');

module.exports = {
  getAllCategories: async () => {
    try {
      const [results] = await pool.promise().query('SELECT * FROM categories');
      return results; // Assuming there's only one user with the username
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
};
