<?php
function getCustomerInfo(){
    $res=[];
    if (isset($_SESSION['id']))
        {
            include_once("../model/dbAPI.php");
            include_once("../model/customerAPI.php");
            $db = new db();
            $conn = $db->connect();

            $customer = new Customer($db);
            
            $customer->id = $_SESSION['id'];

            $res = $customer->showid();
        }
    return $res;
}
function getCustomerIDInfo($id){
    $res=[];
    include_once("../model/dbAPI.php");
    include_once("../model/customerAPI.php");
    $db = new db();
    $conn = $db->connect();

    $customer = new Customer($db);
    
    $customer->id = $id;

    $res = $customer->showid();
    return $res;
}
function getAllNews(){
    $res = [];
    include_once("../model/dbAPI.php");
    include_once("../model/newsAPI.php");
    $db = new db();
    $conn = $db->connect();
    $news = new News($db);
    $read = $news->read();
    $numRows = $read->rowCount();
    if($numRows>0)
    {
        $count=0;
        while ($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            $res[$count]=$row;
            $count++;
        }
    }
    return $res;
}
function getAllProductTypes(){
    $res = [];
    include_once("../model/dbAPI.php");
    include_once("../model/producttypeAPI.php");
    $db = new db();
    $conn = $db->connect();
    $producttype = new ProductType($db);
    $read = $producttype -> read();
    $numRows = $read->rowCount();
    if($numRows>0)
    {
        $count=0;
        while ($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            $res[$count]=$row;
            $count++;
        }
    }
    return $res;
}
function getAllProducts(){
    $res = [];
    include_once("../model/dbAPI.php");
    include_once("../model/productAPI.php");
    $db = new db();
    $conn = $db->connect();
    $product = new Product($db);
    $read = $product -> read();
    $numRows = $read->rowCount();
    if($numRows>0)
    {
        $count=0;
        while ($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            $res[$count]=$row;
            $count++;
        }
    }
    return $res;
}
function getAllUserProducts(){
    if (isset($_SESSION['id']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        include_once("../model/productAPI.php");
        $db = new db();
        $conn = $db->connect();
        $product = new Product($db);
        $product->sellerid = $_SESSION['id'];
        $read = $product -> readsellerid();
        $numRows = $read->rowCount();
        if($numRows>0)
        {
            $count=0;
            while ($row = $read->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllBoughtProducts(){
    if (isset($_SESSION['id']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/buyproductAPI.php");
        $buyproduct = new BuyProduct($db);
        $buyproduct->uid = $_SESSION['id'];
        $read2 = $buyproduct->readuid();
        $numRows2 = $read2->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllUserComments(){
    if (isset($_SESSION['id']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/commentAPI.php");
        $comment = new Comment($db);
        $comment->uid = $_SESSION['id'];
        $read2 = $comment->readuid();
        $numRows2 = $read2->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllUserArticles(){
    if (isset($_SESSION['id']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/articlesAPI.php");
        $article = new Article($db);
        $article->writerid = $_SESSION['id'];
        $read3 = $article->readwriter();
        $numRows3 = $read3->rowCount();
        if($numRows3>0)
        {
            $count=0;
            while ($row = $read3->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllUserCart(){
    if (isset($_SESSION['id']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/cartitemAPI.php");
        $cartitem = new CartItem($db);
        $cartitem->uid = $_SESSION['id'];
        $read2 = $cartitem->readuid();
        $numRows2 = $read2->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getProductInfo(){
    $res=[];
    if (isset($_GET['productid']))
        {
            include_once("../model/dbAPI.php");
            include_once("../model/productAPI.php");
        
            $db = new db();
            $conn = $db->connect();
        
            $product = new Product($db);
            $product->id =$_GET['productid'];
            $product->show();

            $res = $product->show();
        }
    return $res;
}
function getProductComment(){
    if (isset($_GET['productid']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/commentAPI.php");
        $comment = new Comment($db);
        $comment->productid = $_GET['productid'];
        $read2 = $comment->showproduct();
        $numRows2 = $read2->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getArticleComment(){
    if (isset($_GET['id']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/commentAPI.php");
        $comment = new Comment($db);
        $comment->articleid = $_GET['id'];
        $read2 = $comment->showarticle();
        $numRows2 = $read2->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getNewsComment(){
    if (isset($_GET['id']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/commentAPI.php");
        $comment = new Comment($db);
        $comment->newsid = $_GET['id'];
        $read2 = $comment->shownews();
        $numRows2 = $read2->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllFoundUsers(){
    if (isset($_GET['input']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/customerAPI.php");
        $customer2 = new Customer($db);
        $read2 = $customer2 -> readfind($_GET['input']);
        $numRows2 = $read2 ->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllFoundProducts(){
    if (isset($_GET['input']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/productAPI.php");
        $product = new Product($db);
        $read2 = $product -> readfind($_GET['input']);
        $numRows2 = $read2 ->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllSpecificProducts(){
    $res = [];
    if (isset($_GET['name']))
    {
        include_once("../model/dbAPI.php");
        include_once("../model/productAPI.php");
        $db = new db();
        $conn = $db->connect();
        $product = new Product($db);
        $product->type = $_GET['name'];
        $read = $product -> readtype();
        $numRows = $read->rowCount();
        if($numRows>0)
        {
            $count=0;
            while ($row = $read->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
    }
    return $res;
}
function getAllSellerProducts(){
    $res = [];
    if(isset($_SESSION['id']))
    {
        include_once("../model/dbAPI.php");
        include_once("../model/productAPI.php");
        $db = new db();
        $conn = $db->connect();
        $product = new Product($db);
        $product->sellerid = $_SESSION['id'];
        $read = $product -> readsellerid();
        $numRows = $read->rowCount();
        if($numRows>0)
        {
            $count=0;
            while ($row = $read->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }   
}
function getAllSpecificSellerProducts(){
    $res = [];
    if (isset($_GET['name'])&&isset($_SESSION['id']))
    {
        include_once("../model/dbAPI.php");
        include_once("../model/productAPI.php");
        $db = new db();
        $conn = $db->connect();
        $product = new Product($db);
        $product->sellerid = $_SESSION['id'];
        $product->type = $_GET['name'];
        $read = $product -> readselleridtype();
        $numRows = $read->rowCount();
        if($numRows>0)
        {
            $count=0;
            while ($row = $read->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
    }
    return $res;
}
function getAllCustomers(){
    $res = [];
    include_once("../model/dbAPI.php");
    include_once("../model/customerAPI.php");
    $db = new db();
    $conn = $db->connect();
    $customer = new Customer($db);
    $read = $customer -> read();
    $numRows = $read->rowCount();
    if($numRows>0)
    {
        $count=0;
        while ($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            $res[$count]=$row;
            $count++;
        }
    }
    return $res;
}
function getAllComments(){
    $res = [];
    include_once("../model/dbAPI.php");
    include_once("../model/commentAPI.php");
    $db = new db();
    $conn = $db->connect();
    $comment = new Comment($db);
    $read = $comment -> read();
    $numRows = $read->rowCount();
    if($numRows>0)
    {
        $count=0;
        while ($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            $res[$count]=$row;
            $count++;
        }
    }
    return $res;
}
function getAllFoundComments(){
    if (isset($_GET['input']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/commentAPI.php");
        $comment2 = new comment($db);
        $read2 = $comment2 -> readfind($_GET['input']);
        $numRows2 = $read2 ->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllArticles(){
    $res = [];
    include_once("../model/dbAPI.php");
    include_once("../model/articlesAPI.php");
    $db = new db();
    $conn = $db->connect();
    $article = new Article($db);
    $read = $article -> read();
    $numRows = $read->rowCount();
    if($numRows>0)
    {
        $count=0;
        while ($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            $res[$count]=$row;
            $count++;
        }
    }
    return $res;
}
function get10LastArticles(){
    $res = [];
    include_once("../model/dbAPI.php");
    include_once("../model/articlesAPI.php");
    $db = new db();
    $conn = $db->connect();
    $article = new Article($db);
    $read = $article -> readLast10();
    $numRows = $read->rowCount();
    if($numRows>0)
    {
        $count=0;
        while ($row = $read->fetch(PDO::FETCH_ASSOC))
        {
            $res[$count]=$row;
            $count++;
        }
    }
    return $res;
}
function getAllFoundArticles(){
    if (isset($_GET['input']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/articlesAPI.php");
        $article2 = new Article($db);
        $read2 = $article2 -> readfind($_GET['input']);
        $numRows2 = $read2 ->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getAllFoundNews(){
    if (isset($_GET['input']))
    {
        $res = [];
        include_once("../model/dbAPI.php");
        $db = new db();
        $conn = $db->connect();
        include_once("../model/newsAPI.php");
        $news2 = new News($db);
        $read2 = $news2 -> find($_GET['input']);
        $numRows2 = $read2 ->rowCount();
        if($numRows2>0)
        {
            $count=0;
            while ($row = $read2->fetch(PDO::FETCH_ASSOC))
            {
                $res[$count]=$row;
                $count++;
            }
        }
        return $res;
    }
}
function getArticleID(){
    $res=[];
    if (isset($_GET['id']))
        {
            include_once("../model/dbAPI.php");
            include_once("../model/articlesAPI.php");
        
            $db = new db();
            $conn = $db->connect();
        
            $article = new Article($db);
            $article->id =$_GET['id'];
            $res = $article->show();
        }
    return $res;
}
function getnewsID(){
    $res=[];
    if (isset($_GET['id']))
        {
            include_once("../model/dbAPI.php");
            include_once("../model/newsAPI.php");
        
            $db = new db();
            $conn = $db->connect();
        
            $news = new News($db);
            $news->id =$_GET['id'];
            $res = $news->show();
        }
    return $res;
}
class ClientController
{
private $header;
private $footer;
public function __construct() {//Thiết lập header và footer
    if(array_key_exists('action',$_GET))
    {
        if($_GET['action'] == 'login' || $_GET['action'] == 'signup')
        {
            $this->header = '../view/loginheader.php';
            $this->footer = '../view/loginfooter.php';
        }
        else
        {
            $this->header = '../view/header.php';
            $this->footer = '../view/footer.php';
        }
    }
    else
    { 
        $this->header = '../view/header.php';
        $this->footer = '../view/footer.php';
    }
}
public function invoke(){
    $customer = getCustomerInfo();
    $allnews = getAllNews();
    $allProductTypes = getAllProductTypes();
    $last10articles = get10LastArticles();
    include_once($this->header);
    if(!array_key_exists('action',$_GET)){
        $allProducts = getAllProducts();
        include_once('../view/menu.php');
    }
    else switch ($_GET['action']){
        case 'about':
            include_once('../view/about.php');
            break;
        case 'login':
            include_once('../view/login_client.php');
            break;
        case 'signup':
            include_once('../view/signup.php');
            break;
        case 'info':
            $userProducts = getAllUserProducts();
            $boughtProducts = getAllBoughtProducts();
            $comments = getAllUserComments();
            $articles = getAllUserArticles();
            $cart = getAllUserCart();
            if(!array_key_exists('search',$_GET))
            include_once('../view/info_client.php');
            else
            {
            switch ($_GET['search'])
                {
                    case 'sell':
                        include_once('../view/info_client_sell.php');
                        break;
                    case 'buy':
                        include_once('../view/info_client_buy.php');
                        break;
                    case 'article':
                        include_once('../view/info_client_article.php');
                        break;
                    case 'comment':
                        include_once('../view/info_client_comment.php');
                        break;
                        
                }
            }
            break;
        case 'product':
            $product= getProductInfo();
            $comments= getProductComment();
            include_once('../view/product.php');
            break;
        case 'search':
            $user = getAllFoundUsers();
            $products = getAllFoundProducts();
            include_once('../view/searchresult.php');
            break;
        case 'specific':
            $allProducts = getAllSpecificProducts();
            include_once('../view/specificmenu.php');
            break;
        case 'article':
            $article = getArticleID();
            $comments= getArticleComment();
            include_once('../view/article.php');
            break;
        case 'news':
            $news = getNewsID();
            $comments=getNewsComment();
            include_once("../view/news/newsIndexes/".$news['url'].".php");
            break;
    }
    include_once($this->footer);
}
}


class SellerController{
    private $header;
    private $footer;
    public function __construct() {//Thiết lập header và footer
        if(array_key_exists('action',$_GET))
        {
            if($_GET['action'] == 'login' || $_GET['action'] == 'signup')
            {
                $this->header = '../view/loginheader_seller.php';
                $this->footer = '../view/loginfooter_seller.php';
            }
            else
            {
                $this->header = '../view/header_seller.php';
                $this->footer = '../view/footer_seller.php';
            }
        }
        else
        { 
            $this->header = '../view/header_seller.php';
            $this->footer = '../view/footer_seller.php';
        }
    }
    public function invoke(){
        $customer = getCustomerInfo();
        $allnews = getAllNews();
        $allProductTypes = getAllProductTypes();
        include_once($this->header);
        if(!array_key_exists('action',$_GET)){
            $allProducts = getAllSellerProducts();
            include_once('../view/menu_seller.php');
        }
        else
        switch ($_GET['action']){
            case 'about':
                include_once('../view/about.php');
                break;
            case 'login':
                include_once('../view/login_seller.php');
                break;
            case 'signup':
                include_once('../view/signup.php');
                break;
            case 'info':
                $userProducts = getAllUserProducts();
                $boughtProducts = getAllBoughtProducts();
                $comments = getAllUserComments();
                $articles = getAllUserArticles();
                $cart = getAllUserCart();
                if(!array_key_exists('search',$_GET))
                include_once('../view/info_client.php');
                else
                {
                switch ($_GET['search'])
                    {
                        case 'sell':
                            include_once('../view/info_client_sell.php');
                            break;
                        case 'buy':
                            include_once('../view/info_client_buy.php');
                            break;
                        case 'article':
                            include_once('../view/info_client_article.php');
                            break;
                        case 'comment':
                            include_once('../view/info_client_comment.php');
                            break;
                            
                    }
                }
                break;
            case 'updateproduct':
                include_once('../view/updateproduct.php');
                break;
            case 'search':
                $user = getAllFoundUsers();
                $products = getAllFoundProducts();
                include_once('../view/searchresult.php');
                break;
            case 'specific':
                $allProducts = getAllSpecificSellerProducts();
                include_once('../view/specificmenu_seller.php');
                break;
            case 'product':
                $product= getProductInfo();
                $comments= getProductComment();
                include_once('../view/product.php');
                break;
            case 'updatearticle':
                include_once('../view/addArticle.php');
                break;
            case 'article':
                $article = getArticleID();
                $comments= getArticleComment();
                include_once('../view/article.php');
                break;
            case 'news':
                $news = getNewsID();
                $comments=getNewsComment();
                include_once("../view/news/newsIndexes/".$news['url'].".php");
                break;
                
        }
        include_once($this->footer);
    }
}

class AdminController{
    private $header;
    private $footer;
    public function __construct() {//Thiết lập header và footer
        if(!array_key_exists('action',$_GET)){
            $this->header = '../view/adminloginheader.php';
            $this->footer = '../view/adminloginfooter.php';
        }
        else
        {
            $this->header = '../view/adminheader.php';
            $this->footer = '../view/adminfooter.php';
        }
    }
    public function invoke(){
        $allnews = getAllNews();
        include_once($this->header);
        if(!array_key_exists('action',$_GET))
            include_once('../view/adminLogin.php');
        else switch ($_GET['action']){
            case 'menu':
                include_once('../view/adminmenu.php');
                break;
            case 'client':
                if(array_key_exists('input',$_GET))
                $allcustomers = getAllFoundUsers();
                else
                $allcustomers = getAllCustomers();
                include_once('../view/adminmembermanage.php');
                break;
            case 'info':
                $customer = getCustomerIDInfo($_GET['id']);
                $userProducts = getAllUserProducts();
                $boughtProducts = getAllBoughtProducts();
                $comments = getAllUserComments();
                if(!array_key_exists('search',$_GET))
                include_once('../view/adminmemberinfo.php');
                else switch ($_GET['search'])
                {
                    case 'sell':
                        include_once('../view/info_client_sell.php');
                        break;
                    case 'buy':
                        include_once('../view/info_client_buy.php');
                        break;
                    case 'article':
                        include_once('../view/info_client_article.php');
                        break;
                    case 'comment':
                        include_once('../view/info_client_comment.php');
                        break;
                        
                }
                break;
            case 'comment':
                if(array_key_exists('input',$_GET))
                $allcomments = getAllFoundComments();
                else
                $allcomments = getAllComments();
                include_once('../view/admincommentmanage.php');
                break;
            case 'article':
                if(array_key_exists('input',$_GET))
                $allarticles = getAllFoundArticles();
                else
                $allarticles = getAllArticles();
                include_once('../view/adminarticlemanage.php');
                break;
            case 'newsinfo':
                if(array_key_exists('input',$_GET))
                $allnews = getAllFoundNews();
                else
                $allnews = getAllNews();
                include_once('../view/adminnewsmanage.php');
                break;
            case 'product':
                if(array_key_exists('input',$_GET))
                $products = getAllFoundProducts();
                else
                $products = getAllProducts();
                include_once('../view/adminproductmanage.php');
                break;
            case 'productinfo':
                $product= getProductInfo();
                $comments= getProductComment();
                include_once('../view/product.php');
                break;
            case 'article':
                $article = getArticleID();
                $comments= getArticleComment();
                include_once('../view/article.php');
                break;
            case 'news':
                $news = getNewsID();
                $comments=getNewsComment();
                include_once("../view/news/newsIndexes/".$news['url'].".php");
                break;
                
        }
        include_once($this->footer);     
    }
}
class Controller{
    public $controller = null;
    public function __construct()
    {
        switch ($_GET['perm']){
            case 'client':
                $this->controller = new ClientController();
                break;
            case 'seller':
                $this->controller = new SellerController();
                break;
            case 'admin':
                $this->controller = new AdminController();
                break;
        } 
    }
    public function invoke()
    {
        $this->controller->invoke();
    }
}
session_start();
$a = new Controller();
$a->invoke();
?>