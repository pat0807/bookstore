<?php 
if(isset($_COOKIE['cart_items'])){
    $cart_items = json_decode($_COOKIE['cart_items'],true);
}else{
    $cart_items = [];
}

print_r($cart_items);


?>

<div class="cart" id="cartui">
    <i class="fa-solid fa-circle-xmark" id="cartClose"></i>
    <h2>YOUR CART</h2>
    <div class="cart-content">
        <?php foreach($cart_items as $cart_item){?>
        <div class="cart-item">
            <img src="" alt="" />
            <div class="text">
                <h3><?php echo $cart_item['bookname']?></h3>
                <p>價錢:$<?php echo $cart_item['price']?></p>
                <label for="">
                    數量:
                    <input type="number"  value="<?php echo $cart_item['quantity']?>" />
                </label>
            </div>
        </div>
        <?php }?>
    </div>
    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">$0</div>
    </div>
    <button type="button" class="buy-btn">立刻下單</button>
    <ion-icon name="close" id="close-cart"></ion-icon>
</div>