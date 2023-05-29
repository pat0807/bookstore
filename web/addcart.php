<?php

$id =  $_POST['id'];
$quantity =  $_POST['quantity'];
$_SESSION['number'] = 123;

$_COOKIE['cart_item'] = [
    'id'=>$id, 'quantity'=>$quantity
];

print_r($_COOKIE['cart_item']);

?>