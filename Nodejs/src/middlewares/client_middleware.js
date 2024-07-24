const connection = require('../configs/db');
module.exports ={
initiate: async function (req){
    console.log(req.session);
    if(req.session.user == null) req.session.user = {permission:"client"};
    let data={};
        const productType = require('../models/productType');
        data.productTypeData = await productType.show(connection);
    if(req.session.user.userID!=null){
        const connection = require("../configs/db");
        const customer = require('../models/customer');
        data.customerData =  await customer.read(connection,req.session.user["userID"]);
    }
    console.log(req.session);
    return data;
},

getAllProducts: async function (req){
    const product = require('../models/product');
    let productData;
    if(req.params.pageNum==null) 
    {
        if(req.params.category==null)
        productData = await product.show(connection,0,12);
        else productData = await product.showCategory(connection,0,12, req.params.category);
    }
    else 
    {
        if(req.params.category==null)
        productData = await product.show(connection,(req.params.pageNum-1)*12,12);
        else productData = await product.showCategory(connection,(req.params.pageNum-1)*12,12, req.params.category);
    }
    // console.log(productData);
    return productData;
},

getSearchResults: async function (req){
    const customer = require('../models/customer');
    const product = require('../models/product');
    const userData = await customer.find(connection,req.params.inputName);
    const productData = await product.find(connection,req.params.inputName);
    const data = {
        userData: userData,
        productData: productData
    } 
    return data;
},

checkExistsUserName: async function(req,regUsername){
    const customer = require('../models/customer');
    const userData = await customer.readUsername(connection,regUsername);
    console.log(userData.length)
    return userData.length!=0
},
getAllInfo: async function(req,userID,productPage,buyPage,commentPage,articlePage){
    if (productPage==null) productPage=1
    if (buyPage==null) buyPage=1
    if (commentPage==null) commentPage=1
    if (articlePage==null) articlePage=1
    const product = require('../models/product');
    const productData = await product.showSeller(connection,(productPage-1)*12,12,userID);
    const buyProduct = require('../models/buyProduct');
    const buyData = await buyProduct.show(connection,(productPage-1)*12,12,userID);
    const comment = require('../models/comment');
    const commentData = await comment.show(connection,(productPage-1)*12,12,userID);
    const article = require('../models/article');
    const articleData = await article.show(connection,(productPage-1)*12,12,userID);
    const data = {
        productData: productData,
        buyData: buyData,
        commentData: commentData,
        articleData: articleData,
        pages: {
            product: productPage,
            buy: buyPage,
            comment: commentPage,
            article: articlePage
        }
    }
    return data
}
}