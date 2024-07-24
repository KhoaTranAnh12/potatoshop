

const middleware = require('../middlewares/admin_middleware')


module.exports = {
    index: function (req, res) {
        req.session.user={userID:1,permission:"admin"}
        middleware.adminInitiate(req,res).then(result=>{
            res.render('./admin/template/adminTemplate.ejs', {content: "menu",data: result, session: req.session});
        });
    },
    productManage: function (req, res) {
        req.session.user={userID:1,permission:"admin"}
        middleware.adminInitiate(req,res).then(result=>{
            initialData = result;
            middleware.getAllProducts(req).then(result=>{
                data = initialData;
                data["productData"] = result;
                res.render('./admin/template/adminTemplate.ejs', {content: "userManage",data: data, session: req.session, manage: "product", category: req.params.category, pNum: req.params.pageNum});
            });
        });
    },
    productDeleteExecute: function (req, res) {
        const connection = require('../configs/db');
        const product = require('../models/product')
        product.delete(connection,req.body.delID).then(result=>{
            res.redirect('/admin/productManage');
        });
    },
    productUpdateExecute: function (req, res) {
        const connection = require('../configs/db');
        const product = require('../models/product')
        product.read(connection,req.body.updateID).then(result=>{
            let data = {
                sellerid: result[0].sellerid,
                name: req.body.updateName,
                type: req.body.updateType,
                quantity: req.body.updateQuantity,
                price: result[0].price,
                description: result[0].description,
                image1: result[0].image1,
                image2: result[0].image2,
                image3: result[0].image3,
            };
            // res.send(data);
            product.update(connection,req.body.updateID,data).then(result=>{
                res.redirect('/admin/productManage');
            })
        });
    },
    customerManage: function (req, res) {
        req.session.user={userID:1,permission:"admin"}
        middleware.adminInitiate(req,res).then(result=>{
            initialData = result;
            middleware.getAllCustomers(req).then(result=>{
                data = initialData;
                data["customerDataManage"] = result;
                console.log(data["customerDataManage"].length);
                res.render('./admin/template/adminTemplate.ejs', {content: "userManage",data: data, session: req.session, manage: "customer", category: req.params.category, pNum: req.params.pageNum});
            });
        });
    },
    articleManage: function (req, res) {
        req.session.user={userID:1,permission:"admin"}
        middleware.adminInitiate(req,res).then(result=>{
            initialData = result;
            middleware.getAllArticles(req).then(result=>{
                data = initialData;
                data["articleData"] = result;
                res.render('./admin/template/adminTemplate.ejs', {content: "userManage",data: data, session: req.session, manage: "article", category: req.params.category, pNum: req.params.pageNum});
            });
        });
    },
    commentManage: function (req, res) {
        req.session.user={userID:1,permission:"admin"}
        middleware.adminInitiate(req,res).then(result=>{
            initialData = result;
            middleware.getAllComments(req).then(result=>{
                data = initialData;
                data["commentData"] = result;
                res.render('./admin/template/adminTemplate.ejs', {content: "userManage",data: data, session: req.session, manage: "comment", category: req.params.category, pNum: req.params.pageNum});
            });
        });
    },
    newsManage: function (req, res) {
        req.session.user={userID:1,permission:"admin"}
        middleware.adminInitiate(req,res).then(result=>{
            initialData = result;
            middleware.getAllNews(req).then(result=>{
                data = initialData;
                data["newsData"] = result;
                res.render('./admin/template/adminTemplate.ejs', {content: "userManage",data: data, session: req.session, manage: "news", category: req.params.category, pNum: req.params.pageNum});
            });
        });
    },
};