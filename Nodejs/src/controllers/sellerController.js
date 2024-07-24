const middleware = require('../middlewares/seller_middleware');


module.exports = {



    index: function (req, res) {
        middleware.initiateSeller(req,res).then(result=>{
            initialData = result;
            middleware.getAllSellerProducts(req).then(result=>{
                data = initialData;
                data["productData"] = result;
                console.log(data.productData.length);
                res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "menu",data: data, session: req.session, pNum: req.params.pageNum, category: req.params.category});
            });
        });
    },
    login: function (req, res) {
        req.session.authenticated = false;
        req.session.user = {permission:"seller"};
        data = {};
        res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "login",data: data, session: req.session});
    },
    checkLogin: function(req,res){
        const connection = require("../configs/db");
        const customer = require('../models/customer');
        customer.readUsernamePassword(connection,req.body.username,req.body.pswd).then(result => {
            if(result.length ==1){
                req.session.authenticated = true;
                req.session.user = {userID:result[0].id,permission:"seller"};
                res.redirect("/seller");
            }
            else
            {
                res.redirect("/seller/login");
            }
        })
        .catch(error => {
            res.send(error);
        });
        
    },
    signUp: function (req,res){
        req.session.authenticated = false;
        req.session.user = {permission:"seller"};
        data = {};
        res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "signup",data: data, session: req.session});
    },
    info: function(req,res){
        middleware.initiateSeller(req,res).then(result=>{
            // console.log(result);
            middleware.getAllInfo(req,req.session.user.userID,req.params.productPage,req.params.buyPage,req.params.commentPage,req.params.articlePage).then(result=>{
                data = initialData;
                data["innerData"] = result;
                console.log(data);
                res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "info",data: data,session: req.session});
                // res.send("OK");
            });
        });
    },
    changeProfile: function(req,res){
        const connection = require("../configs/db");
        const customer = require('../models/customer');
        customer.read(connection, req.session.user.userID).then(result=>{
            const data = {
                username: req.body.username,
                fName: req.body.fName,
                lName: req.body.lName,
                email: req.body.email,
                phoneNum: req.body.phoneNum,
                password: req.body.password,
                avatar: req.body.avatar,
                nComments: result[0].nComments,
                buyerFlag: result[0].buyerFlag,
                money: result[0].money,
                sellerFlag: result[0].sellerFlag
            }
            customer.update(connection,req.session.user.userID,data).then(result=>{
                res.send("OK");
            });
        });
    },
    product: function(req,res){
        middleware.initiateSeller(req,res).then(result=>{
            initialData=result;
            const connection = require('../configs/db');
            const product = require('../models/product');
            product.read(connection,req.params.productid).then(result=>{
                data=initialData;
                data["productData"] = result;
                //Chèn comments
                const comment = require('../models/comment');
                comment.readProduct(connection,req.params.productid).then(result=>{
                    // console.log(result);
                    data["commentData"] = result;
                    res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "product",data: data, session: req.session});
                });
            });
        });
    },
    submitProductComment: function(req,res){
        const connection = require('../configs/db');
        const comment = require('../models/comment');
        console.log("body");
        console.log(req.body);
        const data = {
            uid: req.body.customerId,
            type: "product",
            content: req.body.content,
            articleid: null,
            commentid: null,
            newsid: null,
            productid: req.body.productId
        }
        comment.create(connection,data).then(result=>{
            res.redirect('/seller/product/'+req.body.productId.toString());
        });
    },
    addProduct: function(req,res){
        const connection = require('../configs/db');
        const product = require('../models/product');
        console.log(req.body);
        product.read(connection,req.body.productId).then(result=>{
            result[0].quantity +=  parseInt(req.body.quantity);
            product.update(connection,req.body.productId,result[0]).then(result=>{
                res.redirect('/seller/product/'+req.body.productId.toString());
            })
        }).catch(error=>{res.send(error);})
    },
    deleteProduct: function(req,res){
        const connection = require('../configs/db');
        const product = require('../models/product');
        console.log(req.body);
        product.delete(connection,req.body.productId).then(result=>{
            res.redirect('/seller');
        })
    },
    search: function(req,res){
        middleware.initiateSeller(req,res).then(result=>{
            initialData=result;
            middleware.getSearchResults(req).then(result=>{
                data = initialData;
                data.userData = result[0].userData;
                data.productData = result[0].productData;
                res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "searchresult",data: data,session: req.session});
                // res.send(result);
            });
        });
    },
    newProduct: function(req,res){
         middleware.initiateSeller(req,res).then(result=>{
            initialData = result;
            res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "seller_addproduct",data: data, session: req.session});
        });
    },
    newProductReq: function(req,res){
        const connection = require('../configs/db');
        const product = require('../models/product');
        const data = {
            sellerid: req.session.user.userID,
            name: req.body.productName,
            type: req.body.type,
            quantity: req.body.quantity,
            price: req.body.price,
            description: req.body.description,
            image1: req.body.imgdata,
            image2: req.body.imgdata2,
            image3: req.body.imgdata3
        }
        console.log(data.image1);
        product.create(connection,data).then(result=>{
            res.redirect('/seller');
        });
    }
};