// Module imports
const express = require("express");
require("dotenv").config();
const cors = require("cors");
const path = require("path");
const http = require("http");
const ejs = require("ejs");
const bodyParser = require("body-parser");
const cookieParser = require("cookie-parser");
const multer = require("multer");

// Let's refer to Express as app
const app = express();

app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));
app.use(express.static("views"));
app.use(
  "/views/images/productsImages/",
  express.static(path.join(__dirname, "/views/images/productsImages/"))
);

app.use(cors());

app.use(express.json());
app.use(cookieParser());

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Route Imports
const adminRouter = require("./routes/adminRoutes");
const categoryRouter = require("./routes/categoryRoutes");
const productRouter = require("./routes/productRoutes");
const contactustRouter = require("./routes/contactusRoutes");
const aboutusRouter = require("./routes/aboutusRoutes");

// Test Route
app.get("/ttt", async (req, res) => {
  res.render("aboutUs");
});

// Routes
app.use(adminRouter);
app.use(categoryRouter);
app.use(productRouter);
app.use(contactustRouter);
app.use(aboutusRouter);

// Catch-all route for undefined routes with a 404 error page
app.use((req, res, next) => {
  res.status(404).render("404");
});

app
  .listen(
    process.env.PORT,
    () =>
      console.log(`Server is listening at http://localhost:${process.env.PORT}`) // 8983 in server
  )
  .on("error", (error) => console.error(error));
