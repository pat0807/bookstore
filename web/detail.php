<?php
include_once('../conn/connect.php');

if(isset($_GET["id"])){
$id = $_GET["id"];

$keyword = isset($_GET['s']) ? $_GET['s'] : null;
$sql = "SELECT * FROM product WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
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
            <img src="<?php echo $product['picture']?>" alt="<?php echo $product['bookname']?>">
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
        <ul>
        <li><?php echo $product['description']?></li>
        </ul>
        </div>
        <button class="buy--btn">ADD TO CART</button>
        </div>

       </section>
    </header>
        
</body>
</html>