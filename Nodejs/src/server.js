//Sử dụng Express để BackEnd:
//Install: npm install express
const express = require('express');
const path = require('path');
//dotenv: Cài đặt mọi thứ liên quan
//Install: npm install dotenv
require('dotenv').config();
const hostname = process.env.HOST_NAME;
const port = process.env.PORT;
const app = express();
app.use(express.static(path.join(__dirname, 'public')));
app.locals.baseURL = "http://localhost:8000"
//Template Engine để đi kèm với Controller
const ConfViewEngines = require("./configs/viewEngine");
ConfViewEngines(app);

//Lưu trữ Public Files để Clients có thể xem được
const ConfStaticFiles = require("./configs/staticFiles");
const exp = require('constants');
ConfStaticFiles(app);

//Khai báo Route

//Sử dụng Nodemon để restart theo change: npm install --save-dev nodemon
//Sử dụng MySQL để chạy Hệ CSDL: npm install mysql2
//Sử dụng Sequelize để áp dụng ORM cho CSDL: npm install --save sequelize
//npx sequelize init: Tạo Sequelize CSDL, sau đó ngồi chỉnh trên config.json
//npx sequelize model:create --name [ten_model] --attributes [ten_attr]:[datatype_attr],[ten_attr]:[data_type_attr],[ten_attr]:[data_type_attr]: Tạo Table

const webRoute = require('./routes/web');
const session = require('express-session');
const { permission } = require('process');
app.use(session({
    secret: "khoa",
    cookie: {
        maxAge: 3600000
    },
    user: {permission: "seller"},
    saveUninitialized: false
}));
app.use('/', webRoute);



app.listen(port, () => {
    console.log(`Potato.shop đang chạy trên port: ${port}`)
})  