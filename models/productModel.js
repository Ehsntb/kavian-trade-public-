const { pool } = require("../db/db-config");
//const bcrypt = require('bcrypt');

module.exports = {
  getAllProducts: async () => {
    try {
      const [products] = await pool.promise().query(
        `SELECT
        p.id,
        p.title,
        p.short_description,
        p.long_description,
        p.short_link,
        p.location,
        c.title as category,
        CONCAT('[', GROUP_CONCAT(CONCAT('{ "image_url": "', pg.image_url, '", "is_main": ', pg.is_main, '}')), ']') AS gallery
        FROM
        products AS p
      LEFT JOIN
        product_gallery AS pg ON p.id = pg.product_id
				JOIN
				categories AS c ON c.id = p.category_id
      GROUP BY
        p.id`
      );
      var result = products.map((row) => ({
        id: row.id,
        title: row.title,
        short_description: row.short_description,
        long_description: row.long_description,
        short_link: row.short_link,
        location: row.location,
        category: row.category,
        gallery: JSON.parse(row.gallery),
      }));
      return result;
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
  getProductByShortLink: async (short_link) => {
    try {
      const [products] = await pool.promise().query(
        `SELECT
        p.title,
        p.short_description,
        p.long_description,
        p.short_link,
        p.location,
        c.title as category,
        CONCAT('[', GROUP_CONCAT(CONCAT('{ "id": "', pg.id, '", "image_url": "', pg.image_url, '", "is_main": ', pg.is_main, '}')), ']') AS gallery
        FROM
        products AS p
      LEFT JOIN
        product_gallery AS pg ON p.id = pg.product_id
				JOIN
				categories AS c ON c.id = p.category_id
      WHERE
        p.short_link = ?
      GROUP BY
        p.id;`,
        short_link
      );
      var result = products.map((row) => ({
        title: row.title,
        short_description: row.short_description,
        long_description: row.long_description,
        short_link: row.short_link,
        location: row.location,
        category: row.category,
        gallery: JSON.parse(row.gallery),
      }))[0];
      return result;
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
  getProductById: async (productID) => {
    try {
      const [products] = await pool.promise().query(
        `SELECT
        p.title,
        p.short_description,
        p.long_description,
        p.short_link,
        p.location,
        c.title as category,
        c.id as category_id,
        CONCAT('[', GROUP_CONCAT(CONCAT('{ "id": "', pg.id, '", "image_url": "', pg.image_url, '", "is_main": ', pg.is_main, '}')), ']') AS gallery
        FROM
        products AS p
      LEFT JOIN
        product_gallery AS pg ON p.id = pg.product_id
				JOIN
				categories AS c ON c.id = p.category_id
      WHERE
        p.id = ?
      GROUP BY
        p.id;`,
        productID
      );
      var result = products.map((row) => ({
        id: productID,
        title: row.title,
        short_description: row.short_description,
        long_description: row.long_description,
        short_link: row.short_link,
        location: row.location,
        category: row.category,
        category_id: row.category_id,
        gallery: JSON.parse(row.gallery),
      }))[0];
      return result;
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
  getProductByCategoryShortLink: async (categoryshortlink) => {
    try {
      const [products] = await pool.promise().query(
        `WITH RECURSIVE category_tree AS (
          SELECT id, title, parent_id
          FROM categories
          WHERE short_link = ? 
        
          UNION ALL
        
          SELECT c.id, c.title, c.parent_id
          FROM categories c
          JOIN category_tree ct ON c.parent_id = ct.id
        )
        SELECT p.*, CONCAT('[', GROUP_CONCAT(CONCAT('{ "image_url": "', pg.image_url, '", "is_main": ', pg.is_main, '}')), ']') AS gallery
        FROM products AS p
        LEFT JOIN
        product_gallery AS pg ON p.id = pg.product_id
        JOIN category_tree ct ON p.category_id = ct.id
        GROUP BY p.id 
        `,
        categoryshortlink
      );
      var result = products.map((row) => ({
        title: row.title,
        short_description: row.short_description,
        long_description: row.long_description,
        short_link: row.short_link,
        location: row.location,
        category: row.category,
        gallery: JSON.parse(row.gallery),
      }));
      return result;
    } catch (err) {
      console.error(err);
      throw err; // Re-throw the error for proper handling
    }
  },
  deleteProductsById: async (productID) => {
    try {
      const result = await pool
        .promise()
        .query("DELETE FROM products WHERE id = ?", productID);

      console.log(result);
      return result;
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: "Internal Server Error" });
    }
  },

  updateProductById: async (
    title,
    short_description,
    long_description,
    short_link,
    location,
    category_id,
    productID
  ) => {
    try {
      const result = await pool.promise().query(
        `
      UPDATE products
      SET
        title = ?,
        short_description = ?,
        long_description = ?,
        short_link = ?,
        location = ?,
        category_id = ?
      WHERE
        id = ?
      `,
        [
          title,
          short_description,
          long_description,
          short_link,
          location,
          category_id,
          productID,
        ]
      );
      console.log(result);
      return result;
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: "Internal Server Error" });
    }
  },

  addProduct: async (
    title,
    short_description,
    long_description,
    mainImage,
    short_link,
    location,
    category_id
  ) => {
    try {
      const [productResult] = await pool.promise().query(
        `
      INSERT INTO
       products
      (
        title,
        short_description,
        long_description,
        short_link,
        location,
        category_id
      )
      VALUES
      ( ?, ? ,? ,?, ? ,? )
      `,
        [
          title,
          short_description,
          long_description,
          short_link,
          location,
          category_id,
        ]
      );
      const productID = productResult.insertId;
      await pool
        .promise()
        .query(
          "insert into product_gallery (product_id, image_url, is_main) values (?, ?, ?)",
          [productID, mainImage, "1"]
        );
      // console.log(result);
      return { productID };
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: "Internal Server Error" });
    }
  },
  addGalleryImage: async (product_id, image_url, is_main) => {
    try {
      const [result] = await pool
        .promise()
        .query(
          "INSERT INTO product_gallery (product_id, image_url, is_main) VALUES (?, ?, ?)",
          [product_id.productID, image_url, is_main]
        );
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: "Internal Server Error" });
    }
  },
};
