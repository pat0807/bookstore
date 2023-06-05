<?php
$id = $_GET['cartid'];
$cart_items = json_decode($_COOKIE['cart_items'],true);
foreach($cart_items as $cart_item){
    if ($cart_item['id'] == $_GET['cartid']){
        $key = array_search($cart_item,$cart_items);
        break;
    }
}

unset($cart_items[$key]);
// print_r($cart_items);


setcookie('cart_items',json_encode($cart_items),time() + 3600,'/');
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;

?>