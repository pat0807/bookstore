<?php
include_once('../conn/connect.php');

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $keyword = isset($_GET['s']) ? $_GET['s'] : null;
    $sql = "SELECT * FROM product WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}
// $sql_query = "SELECT * FROM product ORDER BY id ASC";
// $result = $db_link->query($sql_query);
// $total_records = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .product{
        gap: 50px;
        transform: translateX(-180px);
    }

    .buy--btn{
        border: none; 
        background-color: #6767dc ;
        color: white;
        border-radius: 5px;
        font-size: 15px;
        cursor: pointer;
        opacity: 0.8;
    }
    
    .buy--btn:hover{
        opacity: 1;
        box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.5);
    }
</style>


</head>
<body>
    <header id="header">
        <div class="logo">
            <h1 class="logo"><a href="../index.php">2nd BS.</a></h1>
        </div>

    <section class="product">
        <div class="product__photo">
        <div class="photo-container">
        <div class="photo-main">
            <img src="../images/upload/<?php echo $product['picture']?>" alt="<?php echo $product['bookname']?>">
        </div>
        </div>
        </div>
        <div class="product__info">
        <div class="title">
        <h1><?php echo $product['bookname']?></h1>
        <span>COD: 45999</span>
        </div>
        
        <div class="price">
        $NTD <span><?php echo $product['price']?></span>
        </div>
        
        <div class="description">
            <h3>INFORMATION</h3>
            <div class="賣家">
                賣家 <span><a href="chatbox2.php?account=<?php echo $product['account']; ?>&toUser=<?php echo $product['member_id']; ?>">
                        <?php echo $product['account']; ?>
                    </a>
                    </span>
            </div>
            <ul>
                <li><?php echo $product['description']; ?></li>
            </ul>
        </div>
        <form class="product-box" action="./addcart.php" method="post">
        <button class="buy--btn" type="submit">加入購物車</button>
            <input type="hidden" value="<?php echo $product['id'] ?>" name="id" >
            <input type="hidden" value="1" name="quantity">
            <input type="hidden" value="<?php echo $product['bookname']?>" name="bookname">
            <input type="hidden" value="<?php echo $product['price']?>" name="price">
            <input type="hidden" value="<?php echo $product['picture']?>" name="picture">
        </form>
        </div>

       </section>
    </header>
        
</body>
</html>