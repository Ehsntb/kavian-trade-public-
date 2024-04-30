const { pool } = require('../db/db-config');
const bcrypt = require('bcrypt');

module.exports = {
  getPasswordbyUsername: async (username) => {
    try {
      const [results] = await pool
        .promise()
        .query('SELECT * FROM admins where username = ?', [username]);
      return results; // Assuming there's only one user with the username
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
  comparePassword: (password) => {},
};
