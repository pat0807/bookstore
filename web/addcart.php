<?php

$id =  $_POST['id'];
$quantity =  $_POST['quantity'];
$bookname =  $_POST['bookname'];
$price =  $_POST['price'];
$picture =  $_POST['picture'];
$isset = false;

// $cart_items = [];
if(isset($_COOKIE['cart_items'])){
    $cart_items = json_decode($_COOKIE['cart_items'],true);//json_decode把php的json檔(文字)轉成陣列
    print_r($cart_items);
    foreach($cart_items as &$cart_item){
        if ($cart_item['id'] == $id){
            $isset = true; 
            $cart_item['quantity'] = intval($cart_item['quantity']) + intval($quantity);
       
        }
    }
    if ($isset == false){
        array_push($cart_items,['id'=>$id,'quantity'=>$quantity,'bookname'=>$bookname,'price'=>$price,'picture'=>$picture]);
    }
}else{
    $cart_items = [];
    array_push($cart_items,['id'=>$id,'quantity'=>$quantity,'bookname'=>$bookname,'price'=>$price,'picture'=>$picture]);
}
header("Location: ../index.php");

setcookie('cart_items',json_encode($cart_items),time() + 3600,'/');//json_encode把php的陣列轉成json檔(文字)，/是存在所有同一層的cookies

?>