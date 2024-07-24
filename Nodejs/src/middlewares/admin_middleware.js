const connection = require('../configs/db');

module.exports = {
adminInitiate: async function(req){
    console.log(req.session);
    if(req.session.user == null) req.session.user = {permission:"admin"};//Về sau sẽ redirect lại
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

getAllProducts: async function(req){
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

getAllCustomers:  async function(req){
    const customer = require('../models/customer');
    let customerData;
    if(req.params.pageNum==null) 
    {
        if(req.params.category==null)
        customerData = await customer.show(connection,0,12);
        else customerData = await customer.showCategory(connection,0,12, req.params.category);
    }
    else 
    {
        if(req.params.category==null)
        customerData = await customer.show(connection,(req.params.pageNum-1)*12,12);
        else customerData = await customer.showCategory(connection,(req.params.pageNum-1)*12,12, req.params.category);
    }
    // console.log(customerData);
    return customerData;
},
getAllComments: async function(req){
    const comment = require('../models/comment');
    let commentData;
    if(req.params.pageNum==null) 
    {
        if(req.params.category==null)
        {
            commentData = await comment.showAll(connection,0,12);
        }
        
        else commentData = await comment.showCategory(connection,0,12,req.params.category);
    }
    else 
    {
        if(req.params.category==null)
        commentData = await comment.showAll(connection,(req.params.pageNum-1)*12,12);
        else commentData = await comment.showCategory(connection,(req.params.pageNum-1)*12,12,req.params.category);
    }
    // console.log(customerData);
    return commentData;
},
getAllNews: async function(req){
    const news = require('../models/news');
    let newsData;
    if(req.params.pageNum==null) 
    {
        if(req.params.category==null)
        newsData = await news.show(connection,0,12);
        else newsData = await news.showCategory(connection,0,12, req.params.category);
    }
    else 
    {
        if(req.params.category==null)
        newsData = await news.show(connection,(req.params.pageNum-1)*12,12);
        else newsData = await news.showCategory(connection,(req.params.pageNum-1)*12,12, req.params.category);
    }
    // console.log(newsData);
    return newsData;
},
getAllArticles: async function(req){
    const article = require('../models/article');
    let articleData;
    if(req.params.pageNum==null) 
    {
        if(req.params.category==null)
        articleData = await article.show(connection,0,12);
        else articleData = await article.showCategory(connection,0,12, req.params.category);
    }
    else 
    {
        if(req.params.category==null)
        articleData = await article.show(connection,(req.params.pageNum-1)*12,12);
        else articleData = await article.showCategory(connection,(req.params.pageNum-1)*12,12, req.params.category);
    }
    // console.log(articleData);
    return articleData;
}
}