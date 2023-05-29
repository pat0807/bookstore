<?php

$id =  $_POST['id'];
$quantity =  $_POST['quantity'];

$cart_items = [];
array_push($cart_items,['id'=>$id,'quantity'=>$quantity]);

print_r($cart_items);

json_encode($cart_items);

echo json_encode($cart_items);
setcookie('cart_items',json_encode($cart_items),time() + 3600,'/');


// $_COOKIE['cart_items']=[
//     [
//         'id'=>1,
//         'quantity'=>8
//     ],
//     [
//         'id'=>4,
//         'quantity'=>3
//     ]
// ];


?>