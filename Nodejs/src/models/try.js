// const connection = require('../configs/db.js');

const connection = require("../configs/db");
const customer = require('./customer.js');
const buyer = require('./buyer.js');
const seller = require('./seller');
const admin = require('./admin');
const productType = require('./productType');
const product = require('./product');
const news = require('./news')
const article = require('./article')
const comment = require('./comment')
const buyProduct = require('./buyProduct')
const notification = require('./notification')
const shopCart = require('./shopCart')
data = {
    uid:1,productid:1,pType:"",quantity:1
};
shopCart.create(connection,data)
    .then(result => {
        console.log("Result:", result);
    })
    .catch(error => {
        console.error("Error:", error.sqlMessage);
    });
connection.end();