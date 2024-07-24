//Tạo dự án vào lúc 29/05/2024
//30/05/2024: Đưa các views từ dự án cũ lên Project
//1/06/2024: Tạo Migrations
const express = require('express');
const router = express.Router()
const ctrl = require('../controllers/basicController');
const clientCtrl = require('../controllers/clientController');
const sellerCtrl = require('../controllers/sellerController');
const adminCtrl = require('../controllers/adminController');
const bodyParser = require('body-parser');
router.use(bodyParser.urlencoded({
    parameterLimit: 100000,
    limit: '50mb',
    extended: true
}));
// router.get('/1234', (req, res) => {
//     let salary = 1;
//     res.render('sample.ejs', { salary: salary, users: [] })
// })

//Client Controller
router.get('/', clientCtrl.index);
router.get('/login', clientCtrl.login);
router.post('/checkLogin',clientCtrl.checkLogin);
router.get('/signup', clientCtrl.signUp);   
router.post('/checkSignUp',clientCtrl.checkSignUp)
router.get('/info', clientCtrl.info);
router.get('/info/:productPage/:buyPage/:commentPage/:articlePage', clientCtrl.info);
router.post('/profChange',clientCtrl.changeProfile);
router.get('/product/:productid', clientCtrl.product);
router.post('/buyProduct',clientCtrl.buyProduct);
router.post('/addIntoCart',clientCtrl.addIntoCart);
router.post('/submitProductComment', clientCtrl.submitProductComment);
router.get('/search/:inputName',clientCtrl.search);
router.post('/post', function(req,res){res.send(req.body);});


router.get('/category/:category', clientCtrl.index);
router.get('/page/:pageNum', clientCtrl.index);
router.get('/category/:category/page/:pageNum', clientCtrl.index);


//Seller COntroller
router.get('/seller/',sellerCtrl.index);
router.get('/seller/login',sellerCtrl.login);
router.post('/seller/checkLogin',sellerCtrl.checkLogin);
router.get('/seller/info', sellerCtrl.info);
router.get('/seller/product/:productid',sellerCtrl.product);
router.post('/seller/addproduct',sellerCtrl.addProduct);
router.post('/seller/deleteproduct',sellerCtrl.deleteProduct);
router.get('/seller/newproduct',sellerCtrl.newProduct);
router.post('/seller/newProductReq',sellerCtrl.newProductReq);
//Admin Controller
router.get('/admin', adminCtrl.index);
router.get('/admin/productManage', adminCtrl.productManage);
router.get('/admin/productManage/:pageNum', adminCtrl.productManage);
router.post('/admin/productDelete', adminCtrl.productDeleteExecute);
router.post('/admin/productUpdate', adminCtrl.productUpdateExecute);
router.get('/admin/customerManage', adminCtrl.customerManage);
router.get('/admin/customerManage/:pageNum', adminCtrl.customerManage);
router.get('/admin/commentManage', adminCtrl.commentManage);
router.get('/admin/commentManage/:pageNum', adminCtrl.commentManage);
router.get('/admin/newsManage', adminCtrl.newsManage);
router.get('/admin/newsManage/:pageNum', adminCtrl.newsManage);
router.get('/admin/articleManage', adminCtrl.articleManage);
router.get('/admin/articleManage/:pageNum', adminCtrl.articleManage);
module.exports = router;