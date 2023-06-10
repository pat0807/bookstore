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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>線上二手書局</title>

<style>
    table{
      border-collapse: collapse;
      border: none;
      width: 80%;
      text-align: center;
      font-size: 18px;
    }

    th,td{
      font-family: 'Times New Roman', Times, serif;
      background: rgba(0, 0, 0, 0.5);
    }

    #button{
      border: none; 
      background-color:red;
      color: white;
      border-radius: 5px;
      font-size: 15px;
      cursor: pointer;
      margin: 10px;
      padding: 5px;
    }

    #button:hover{
      background-color:orangered;
      transition: all 0.5s;
      border: 2px solid red;
    }
</style>
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <!-- GET POST -->
 
    <?php include('./header.php') ?>
    <?php include('./cart.php') ?>
    <div class="shopping">
        <?php include('search-bar.php') ?>
            
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
                    <td><?php echo"<a href='detail.php?id=".$product["id"]."'>點擊查看</a> "?></td>
                    <td><?php echo"<a href='update.php?id=".$product["id"]."'>修改</a> "?>
                    <td><?php echo"<a href='delete.php?id=".$product["id"]."'>刪除</a>"?>
                    
                </tr>
                <?php }?>
                
            </table>
            <?php }?>
            


        </div>
    </div>
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
    <!-- <script src="main.js"></script> -->
</body>

</html>