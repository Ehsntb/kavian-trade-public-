const { pool } = require("../db/db-config");

module.exports = {
  getImageById: async (imageId) => {
    try {
      const [image] = await pool
        .promise()
        .query(`SELECT * FROM product_gallery WHERE id = ?`, imageId);
      var result = image.map((row) => ({
        id: row.id,
        product_id: row.product_id,
        image_url: row.image_url,
        is_main: row.image_url,
      }))[0];
      return result;
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
  deleteImageById: async (imageId) => {
    try {
      const result = await pool
        .promise()
        .query("DELETE FROM product_gallery WHERE id = ?", imageId);

      console.log(result);
      return result;
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: "Internal Server Error" });
    }
  },
};
