const adminLogin = require('../models/adminLoginModel');

module.exports = {
  authAdmin: async (req, res) => {
    const { username } = req.body;

    try {
      const user = await adminLogin.getPasswordbyUsername(username);
      console.log(user);
      if (user.length < 1) {
        return res.status(404).render('test', { users: ['not found'] });
      } else {
        return res.render('test', { users: user });
      }

      const isPasswordValid = await adminLogin.comparePassword(user, password);
      if (!isPasswordValid) {
        return res
          .status(401)
          .json({ message: 'Invalid username or password' });
      }

      // Remove sensitive information (e.g., password) before sending the user object
      const sanitizedUser = { ...user };
      delete sanitizedUser.password;

      res.json(sanitizedUser);
    } catch (error) {
      console.error(error);
      res.status(500).json({ message: error });
    }
  },
};
