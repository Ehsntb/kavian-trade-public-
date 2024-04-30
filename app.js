// Module imports
const express = require('express');
require('dotenv').config();
const cors = require('cors');
const path = require('path');
const ejs = require('ejs');

// Let's refer to Express as app
const app = express();
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
// Middlewares
app.use(express.static('views'));
app.use(cors());
app.use(express.json());

// Route Imports
const adminLoginRouter = require('./routes/adminLoginRoutes');
// const authenticationRouter = require('./routes/authenticationRoutes');
const categoryRouter = require('./routes/categoryRoutes');
const productRouter = require('./routes/productRoutes');
const contactustRouter = require('./routes/contactusRoutes');

// app.get('/', (req, res) => {
//   res.render('index');
// });

// Routes
app.use(adminLoginRouter);
// app.use(authenticationRouter);
app.use(categoryRouter);
app.use(productRouter);
app.use(contactustRouter);

app
  .listen(
    process.env.PORT,
    () =>
      console.log(`Server is listening at http://localhost:${process.env.PORT}`) // 8983 in server
  )
  .on('error', (error) => console.error(error));

//   Please note
// 1- Please set project port to above port number
// 2- Upload your project file to project directory
// 3- Press start button and select start script list in package.json
