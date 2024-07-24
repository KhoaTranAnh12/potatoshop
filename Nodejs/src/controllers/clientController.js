const { response } = require('express');
const middleware = require('../middlewares/client_middleware');
const connection = require('../configs/db');



module.exports = {



    index: function (req, res) {
        middleware.initiate(req,res).then(result=>{
            initialData = result;
            middleware.getAllProducts(req).then(result=>{
                data = initialData;
                data["productData"] = result;
                // console.log(data.productData.length);
                res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "menu",data: data, session: req.session, pNum: req.params.pageNum, category: req.params.category});
            });
        });
    },
    login: function (req, res) {
        req.session.authenticated = false;
        req.session.user = {permission:"client"};
        console.log(req.session);
        data = {};
        res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "login",data: data, session: req.session});
    },
    checkLogin: function(req,res){
        const connection = require("../configs/db");
        const customer = require('../models/customer');
        customer.readUsernamePassword(connection,req.body.username,req.body.pswd).then(result => {
            if(result.length ==1){
                req.session.authenticated = true;
                req.session.user = {userID:result[0].id,permission:"client"};
                res.redirect("/");
            }
            else
            {
                res.redirect("/login");
            }
        })
        .catch(error => {
            res.send(error);
        });
        
    },
    signUp: function (req,res){
        req.session.authenticated = false;
        req.session.user = {permission:"client"};   
        data = {};
        res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "signup",data: data, session: req.session});
    },
    checkSignUp: function(req,res){
        middleware.checkExistsUserName(req,req.body.username).then(result=>{
            if (!result){
                const customer = require('../models/customer');
                if (req.body.buyer) bFlag = 1;
                else bFlag = 0;
                if (req.body.seller) sFlag = 1;
                else sFlag = 0;
                data={
                    username: req.body.username,
                    password: req.body.password,
                    fName: req.body.firstName,
                    lName: req.body.lastName,
                    phoneNum: req.body.phoneNum,
                    email: req.body.email,
                    nComments: 0,
                    buyerFlag: bFlag,
                    sellerFlag: sFlag,
                    money: 0,
                    avatar: req.body.imgData,
                }
                console.log(data)
                customer.create(connection,data).then(result=>{
                    res.redirect('./login');
                })
            }
            else {

            }
        })
    },
    info: function(req,res){
        middleware.initiate(req,res).then(result=>{
            initialData = result;
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
        middleware.initiate(req,res).then(result=>{
            initialData=result;
            const connection = require('../configs/db');
            const product = require('../models/product');
            product.read(connection,req.params.productid).then(result=>{
                data=initialData;
                data["productData"] = result;
                console.log(req.session);
                // console.log(result);
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
    buyProduct: function(req,res){
        const connection = require('../configs/db');
        const buyProduct = require('../models/buyProduct');
        const data={
            uid: req.body.buyerid,
            productid: req.body.productid,
            pType: req.body.type,
            quantity: req.body.quantity
        }
        buyProduct.create(connection,data).then(result=>{
            res.redirect('/product/'+req.body.productid.toString());
        });
        // res.send(data);
    },
    addIntoCart: function (req,res){
        const connection = require('../configs/db');
        const cart = require('../models/shopCart')
        const data={
            uid: req.body.buyerid,
            productid: req.body.productid,
            pType: req.body.type,
            quantity: req.body.quantity
        }
        cart.create(connection,data).then(result=>{
            res.redirect('/product/'+req.body.productid.toString());
        });
    },
    submitProductComment: function(req,res){
        const connection = require('../configs/db');
        const comment = require('../models/comment');
        // console.log("body");
        // console.log(req.body);
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
            res.redirect('/product/'+req.body.productId.toString());
        });
    },
    search: function(req,res){
        middleware.initiate(req,res).then(result=>{
            initialData=result;
            getSearchResults(req).then(result=>{
                data = initialData;
                data.userData = result.userData;
                data.productData = result.productData;
                res.render('./ClientAndSeller/template/clientTemplate.ejs', {content: "searchresult",data: data,session: req.session});
                // res.send(result);
            });
        });
    }
};