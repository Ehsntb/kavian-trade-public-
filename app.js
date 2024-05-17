// Module imports
const express = require("express");
require("dotenv").config();
const cors = require("cors");
const path = require("path");
const ejs = require("ejs");
const bodyParser = require("body-parser");
const cookieParser = require("cookie-parser");
const multer = require("multer");

// Let's refer to Express as app
const app = express();

const upload = multer({
  dest: path.join(__dirname, "views/images/productsImages"),
});

app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));
app.use(express.static("views"));

app.use(cors());

app.use(express.json());
app.use(cookieParser());

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Route Imports
const adminRouter = require("./routes/adminRoutes");
const categoryRouter = require("./routes/categoryRoutes");
const productRouter = require("./routes/productRoutes");
const contactustRouter = require("./routes/contactusRoutes");

// Test Route
// app.get("/ttt", async (req, res) => {
//   res.render("admin/layout/addProductPage");
// });

// Routes
app.use(adminRouter);
app.use(categoryRouter);
app.use(productRouter);
app.use(contactustRouter);

app
  .listen(
    process.env.PORT,
    () =>
      console.log(`Server is listening at http://localhost:${process.env.PORT}`) // 8983 in server
  )
  .on("error", (error) => console.error(error));
