<?php

$id =  $_POST['id'];
$quantity =  $_POST['quantity'];
$bookname =  $_POST['bookname'];
$price =  $_POST['price'];
$isset = false;

// $cart_items = [];
if(isset($_COOKIE['cart_items'])){
    $cart_items = json_decode($_COOKIE['cart_items'],true);
    print_r($cart_items);
    foreach($cart_items as &$cart_item){
        if ($cart_item['id'] == $id){
            $isset = true; 
            $cart_item['quantity'] = intval($cart_item['quantity']) + intval($quantity);
       
        }
    }
    if ($isset == false){
        array_push($cart_items,['id'=>$id,'quantity'=>$quantity,'bookname'=>$bookname,'price'=>$price]);
    }
}else{
    $cart_items = [];
    array_push($cart_items,['id'=>$id,'quantity'=>$quantity,'bookname'=>$bookname,'price'=>$price]);
}


setcookie('cart_items',json_encode($cart_items),time() + 3600,'/');
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>