<?php
include_once('../conn/connect.php');

$keyword = isset($_GET['s']) ? $_GET['s'] : null;

$sql = "SELECT * FROM product WHERE bookname like '%$keyword%' ";

$stmt = $conn->prepare($sql);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $sql_query = "SELECT * FROM product ORDER BY id ASC";
// $result = $db_link->query($sql_query);
// $total_records = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>線上二手書局</title>
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <!-- GET POST -->
 
    <?php include('./header.php') ?>
    <div class="cart" id="cartui">
        <i class="fa-solid fa-circle-xmark" id="cartClose"></i>
        <h2>YOUR CART</h2>
        <div class="cart-content">

        </div>
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">$0</div>
        </div>
        <button type="button" class="buy-btn">立刻下單</button>
        <ion-icon name="close" id="close-cart"></ion-icon>
    </div>
    <div class="shopping">
        <div class="search-bar">
            <form action="./search.php" method="GET"> <!-- 這裡跑版了要改 -->
                <input type="text" name="s" placeholder="搜尋...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="cart-icon" >
                <a href="javascript:;" id="cartBtn">
                    <!-- <ion-icon name="cart-outline" id="cart-btn"></ion-icon> -->
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
            
        <script>
            const cartBtn = document.getElementById('cartBtn')
            const cartui = document.getElementById('cartui')
            const cartClose =document.getElementById('cartClose')
            let open = false
            console.log(123);
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
            <?php if (count($products) == 0){?>
                <h2 class="title">查無此商品。</h2>
            <?php }else{?>
            <table class="products">
                <tr>
                <td>編號</td>
                    <td>圖片</td>
                    <td>商品名稱</td>
                    <td>價錢</td>
                    <td>查看</td>
                </tr>
            
                <?php foreach($products as $product){ ?>
                <tr>
                <td><?php echo $product['id'] ?></td>
                <td><img src="<?php echo $product['picture'] ?>" alt=""></td>
                <td><?php echo $product['bookname'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><a href='detail.php?id=<?php echo $product['id'] ?>'>查看</a></td>
                <!--<td><a href="delete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">刪除</a></td>-->
                </tr>
                <?php } ?>

                <!-- <?php
	while($row_result=$result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row_result["id"]."</td>";
        echo "<td>".$row_result["picture"]."</td>";
		echo "<td>".$row_result["bookname"]."</td>";
		echo "<td>".$row_result["price"]."</td>";
		
		echo "<td><a href='update.php?id=".$row_result["id"]."'>修改</a> ";
		echo "<a href='delete.php?id=".$row_result["id"]."'>刪除</a></td>";
		echo "</tr>";
	}
?> -->
            </table>
            <?php }?>
            


        </div>
    </div>
   
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
    <!-- <script src="../js/main.js"></script> -->


   
</body>

</html>