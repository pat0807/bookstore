<?php
include_once('./conn/connect.php');
$ishome = true;
session_start();
$sort = isset($_GET['sort']) ? $_GET['sort'] : null;

$keyword = isset($_GET['s']) ? $_GET['s'] : null;

if(isset($_GET['sort'])){
    $sql = "SELECT * FROM product WHERE sort = '$sort'";
}else{
    $sql = "SELECT * FROM product WHERE bookname like '%$keyword%' ";
}

$stmt = $conn->prepare($sql);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
include("./conn/connMysqlObj.php");
	$sql_query = "SELECT * FROM product ORDER BY id ASC";
	$result = $db_link->query($sql_query);
	$total_records = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>線上二手書局</title>
</head>

<body>
<header id="header">
    <div class="logo">
        <h1 class="logo"><a href="./">2nd BS.</a></h1>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="./">主頁</a></li>
            <li><a href="./web/about.php">關於我們</a></li>
            <li class="commodity"><a href="#">商品</a>
                <ul>
                    <li><a href="./web/products.php?sort=1">文史哲類</a></li>
                    <li><a href="./web/products.php?sort=2">外語類</a></li>
                    <li><a href="./web/products.php?sort=3">財經類</a></li>
                    <li><a href="./web/products.php?sort=4">管理類</a></li>
                    <li><a href="./web/products.php?sort=5">法政類</a></li>
                    <li><a href="./web/products.php?sort=6">社會與心理類</a></li>
                    <li><a href="./web/products.php?sort=7">大眾傳播類</a></li>
                    <li><a href="./web/products.php?sort=8">教育類</a></li>
                    <li><a href="./web/products.php?sort=9">藝術類</a></li>
                    <li><a href="./web/products.php?sort=10">電機資訊類</a></li>
                    <li><a href="./web/products.php?sort=11">工程類</a></li>
                    <li><a href="./web/products.php?sort=12">建築與設計類</a></li>
                    <li><a href="./web/products.php?sort=13">數理化類</a></li>
                    <li><a href="./web/products.php?sort=14">生命科學類</a></li>
                    <li><a href="./web/products.php?sort=15">生物資源類</a></li>
                    <li><a href="./web/products.php?sort=16">地球與環境科學類</a></li>
                    <li><a href="./web/products.php?sort=17">休閒餐旅類</a></li>
                    <li><a href="./web/products.php?sort=18">醫藥衛生類</a></li>
                </ul>
            </li>
            <li><a href="./web/member.php">會員中心</a></li>
            <?php 
            if(isset($_SESSION['level']) && $_SESSION['level'] >=3){
                echo '<li><a href="./web/add.php">新增商品</a></li>';
            }
            ?>
            <?php 
            if(isset($_SESSION['level']) && $_SESSION['level'] >=2){
                echo '<li><a href="./web/orderlist.php">訂單管理</a></li>';
            }
            ?>
            <?php
                    if(isset($_SESSION['account'])) 
                    {
                ?>
                <li><a href="./web/startchat.php">私訊</a></li>
                <?php
                    }else{
                    ?>
                <li><a href="./web/nochat.php">私訊</a></li>
                <?php
                    }
                    ?>
        <?php
        if(isset($_SESSION['account'])){
        ?>
        </ul> 
        </nav>
        <a href="./logout.php" class="login-register-btn">登出</a>   
        <?php
        }else{
        ?>
        </ul> 
    </nav>
    <a href="./login.php" class="login-register-btn">登入/註冊</a>
    <?php   
        }
    ?>
</header>
<?php include('./web/cart.php') ?>
    <div class="shopping">
    <div class="search-bar">
        <form action="web/search.php" method="GET"> 
            <input type="text" name="s" placeholder="搜尋...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="cart-icon" >
            <a href="javascript:;" id="cartBtn">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </div>
    </div>
            
        <script>
            const cartBtn = document.getElementById('cartBtn')
            const cartui = document.getElementById('cartui')
            const cartClose =document.getElementById('cartClose')
            let open = false
            cartClose.addEventListener('click', ()=>{
                open = false
                if(open){
                    cartui.style.right = '0'
                }else{
                    cartui.style.right = '-100%'
                }
            })
            cartBtn.addEventListener('click' , ()=>{
                open = true
                if(open){
                    cartui.style.right = '0'
                }else{
                    cartui.style.right = '-100%'
                }
            })
        </script>

        <div class="container">
            <div class="side-bar">
                <div class="nav-bar">
                    <ul>
                        <li><a href="./web/products.php?sort=1">文史哲類</a></li>
                        <li><a href="./web/products.php?sort=2">外語類</a></li>
                        <li><a href="./web/products.php?sort=3">財經類</a></li>
                        <li><a href="./web/products.php?sort=4">管理類</a></li>
                        <li><a href="./web/products.php?sort=5">法政類</a></li>
                        <li><a href="./web/products.php?sort=6">社會與心理類</a></li>
                        <li><a href="./web/products.php?sort=7">大眾傳播類</a></li>
                        <li><a href="./web/products.php?sort=8">教育類</a></li>
                        <li><a href="./web/products.php?sort=9">藝術類</a></li>
                        <li><a href="./web/products.php?sort=10">電機資訊類</a></li>
                        <li><a href="./web/products.php?sort=11">工程類</a></li>
                        <li><a href="./web/products.php?sort=12">建築與設計類</a></li>
                        <li><a href="./web/products.php?sort=13">數理化類</a></li>
                        <li><a href="./web/products.php?sort=14">生命科學類</a></li>
                        <li><a href="./web/products.php?sort=15">生物資源類</a></li>
                        <li><a href="./web/products.php?sort=16">地球與環境科學類</a></li>
                        <li><a href="./web/products.php?sort=17">休閒餐旅類</a></li>
                        <li><a href="./web/products.php?sort=18">醫藥衛生類</a></li>
                    </ul>
                </div>
            </div>
            <div class="product">
                <?php foreach($products as $product){?>
                <form class="product-box" action="./web/addcart.php" method="post">
                    <a href='./web/detail.php?id=<?php echo $product['id'] ?>'><img src="./images/upload/<?php echo $product['picture']?>" class="product-img"></a>
                    <h2 class="product-title"><?php echo $product['bookname']?></h2>
                    <span class="price">$<?php echo $product['price']?></span>
                    <ion-icon name="bag-handle-outline" class="add-cart" onclick="this.parentNode.submit()"><i class="fa-solid fa-cart-shopping"></i></ion-icon>
                    <input type="hidden" value="<?php echo $product['id'] ?>" name="id" >
                    <input type="hidden" value="1" name="quantity">
                    <input type="hidden" value="<?php echo $product['bookname']?>" name="bookname">
                    <input type="hidden" value="<?php echo $product['price']?>" name="price">
                    <input type="hidden" value="<?php echo $product['picture']?>" name="picture">
                </form> 
                <?php }?>  
            </div>
        </div>
    </div>
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./js/main.js"></script> -->
</body>

</html>