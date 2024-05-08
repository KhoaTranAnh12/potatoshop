<?php
if(isset($_GET))
{
    $thistype=htmlspecialchars($_GET['name']);
}
?>
<div class="container my-2">
            <div class="row">
                <h1>Các sản phẩm của bạn: <?php echo $thistype;?></h1>
            </div>
            <div class="row">
            <?php
                $count=0;
                foreach($allProducts as $n)
                {
                    $count+=1;
                    extract($n);
                    echo'
                    <div class="cardmenu-'.ceil($count/12).' card col-lg-4 col-md-6 py-2 h-100 item">
                        <a href="../controller/?perm=client&action=product&productid='.$id.'"><img src="'.$image1.'" alt="Polo picture" class="card-img-top"></a>
                        <p class="text-center">Price: '.$price.' VNĐ</p>
                    </div>
                    ';
                }
                if(count($allProducts)==0) echo '<h1>Hiện tại chưa có sản phẩm nào!</h1>'
            ?>
            </div>
            <?php
            $pagecount=ceil($numRows/12);
            echo'
            <div class="row">
                <label for="ProductPage" class="ml-auto">Trang:</label>
                <input type="number" id="ProductPage" min="1" max="'.$pagecount.'" value="1">
            </div>
            <script>
                function disableall(){
                    for(let i = 1; i<='.$pagecount.'; i++)
                    {
                    console.log("cardmenu-"+i.toString());
                    let menus = document.getElementsByClassName("cardmenu-"+i.toString())
                    console.log(menus.length);
                    for(let i=0; i<=menus.length-1; i++) menus[i].hidden = true;
                    } 
                }
                function enable(x){
                    console.log("enable" + x.toString());
                    let menus = document.getElementsByClassName("cardmenu-"+x.toString())
                    for(let i=0; i<=menus.length-1; i++) menus[i].hidden = false;
                }
                disableall();
                enable(1);
                $("#ProductPage").change(function(){
                    disableall();
                    console.log($("#ProductPage").val());
                    enable($("#ProductPage").val());
                });
            </script>
            ';
            ?>
        </div>     