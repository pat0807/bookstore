<?php
include_once('../conn/connect.php');

session_start();

$account =  $_SESSION['account']; 
$name =  $_POST['name']; 
$email =  $_POST['email']; 
$phone =  $_POST['phone']; 
$school =  $_POST['school']; 
$level =  $_SESSION['level']; 


$sql = "UPDATE `memberdata` SET name = :name, email= :email, phone= :phone, school= :school , level= :level WHERE account = :account ";  // 1

$stmt = $conn->prepare($sql); // 2

$stmt->bindParam(':account',$account); // 3
$stmt->bindParam(':name',$name); // 3
$stmt->bindParam(':email',$email); // 3
$stmt->bindParam(':phone',$phone); // 3
$stmt->bindParam(':school',$school); // 3
$stmt->bindParam(':level',$level); // 3


$stmt->execute(); // 4

$_SESSION['account']=$account;
$_SESSION['name']=$name;
$_SESSION['email']=$email;
$_SESSION['phone']=$phone;
$_SESSION['school']=$school;
$_SESSION['level']=3;



header('Location:member.php');



