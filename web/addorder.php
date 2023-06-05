<?php 
include_once('../conn/connect.php');
session_start();
$memberid = $_SESSION['id'] ;
$cardholderName = $_POST['cardholder-name'];
$cardNumber = $_POST['card-number'] ;
$day = $_POST['day'] ;
$month = $_POST['month'] ;
$cvv = $_POST['cvv'] ;
$inform = $_POST['inform'] ;
$total = $_POST['total'] ;
$ordertime = date("Y-m-d H:i:s");



$sql = "INSERT INTO `orders`(`member_id`, `cardholder_name`, `card_number`, `day`, `month`, `cvv`, `inform`,`total`,`order_time`) 
VALUES (:memberid, :cardholderName , :cardNumber, :day, :month , :cvv,:inform, :total , :ordertime) "; //寫好SQL語法
    $stmt = $conn->prepare($sql); // 把字串轉換成SQL看得懂的程式

    $stmt->bindParam(':memberid',$memberid); //綁定變數
    $stmt->bindParam(':cardholderName',$cardholderName); //綁定變數
    $stmt->bindParam(':cardNumber',$cardNumber); //綁定變數
    $stmt->bindParam(':day',$day); //綁定變數
    $stmt->bindParam(':month',$month); //綁定變數
    $stmt->bindParam(':cvv',$cvv); //綁定變數
    $stmt->bindParam(':inform',$inform); //綁定變數
    $stmt->bindParam(':total',$total); //綁定變數
    $stmt->bindParam(':ordertime',$ordertime); //綁定變數

    $stmt->execute(); //執行SQL

    header("location:./paysuccess.php");

?>