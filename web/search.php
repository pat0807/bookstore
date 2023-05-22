<?php
include_once('../conn/connect.php');

$keyword = isset($_GET['s']) ? $_GET['s'] : null;

$sql = "SELECT * FROM product WHERE bookname like '%$keyword%' ";

$stmt = $conn->prepare($sql);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
include("../conn/connMysqlObj.php");
	$sql_query = "SELECT * FROM product ORDER BY id ASC";
	$result = $db_link->query($sql_query);
	$total_records = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>線上二手書局</title>
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <!-- GET POST -->
 
    <?php include('./header.php') ?>
    <div class="shopping">
        <div class="search-bar">
            <form action="./search.php" method="GET"> <!-- 這裡跑版了要改 -->
                <input type="text" name="s" placeholder="搜尋...">
                <button type="submit"><ion-icon name="search-outline"></ion-icon></button>
            </form>
            <div class="cart-icon">
                <a href="#">
                    <ion-icon name="cart-outline" id="cart-btn"></ion-icon>
                </a>
               
                    
                    
                </div>
            </div>
        </div>
            
        <div class="container">
            <?php if (count($products) == 0){?>
                <h2 class="title">查無此商品。</h2>
            <?php }else{?>
            <table class="products">
                <tr>
                    
                    <td>圖片</td>
                    <td>商品名稱</td>
                    <td>價錢</td>
                    <td>查看</td>
                </tr>
                <?php foreach($products as $product){?>
                <tr>
                    <td><img src="<?php echo $product['picture'] ?>" alt=""></td>
                    <td><?php echo $product['bookname'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><a href="<?php echo $product['id'] ?>">點擊查看</a></td>
                    <td><?php echo"<a href='update.php?id=".$product["id"]."'>修改</a> "?>
                    <td><?php echo"<a href='delete.php?id=".$product["id"]."'>刪除</a>"?>
                    
                </tr>
                <?php }?>
                
            </table>
            <?php }?>
            


        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="main.js"></script>
</body>

</html>