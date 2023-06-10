<?php 
if(isset($_COOKIE['cart_items'])){
    $cart_items = json_decode($_COOKIE['cart_items'],true);
}else{
    $cart_items = [];
}
$total = 0;
?>
<style>
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
</style>
<div class="cart" id="cartui">
    <i class="fa-solid fa-circle-xmark" id="cartClose"></i>
    <h2>YOUR CART</h2>
    <div class="cart-content">
        <?php foreach($cart_items as $cart_item){
            $total += $cart_item["price"] * $cart_item["quantity"];
            ?>
        <div class="cart-item">
        <?php if(isset($ishome) && $ishome){
            ?>
            <img src="./images/upload/<?php echo $cart_item['picture']?>" alt="" />
            <?php }else{?>
                <img src="../images/upload/<?php echo $cart_item['picture']?>" alt="" />
            <?php }?>
            <div class="text">
                <h3><?php echo $cart_item['bookname']?></h3>
                <p>價錢:$<?php echo $cart_item['price']?></p>
                <label for="">
                    數量:
                    <?php echo $cart_item['quantity']?>
                    <!-- <button onclick="removecartnumber(<?php echo $cart_item['id']?>)">-</button> -->
                    <!-- <input type="number"  value="<?php echo $cart_item['quantity']?>" disabled/> -->
                    <!-- <button onclick="addcartnumber(<?php echo $cart_item['id']?>)">+</button> -->
                </label>
            </div>
            <?php if(isset($ishome) && $ishome){
            ?>
            <a href="web/removecart.php?cartid=<?php echo $cart_item['id']?>" style="color: crimson;">刪除</a>
            <?php }else{?>
                <a href="removecart.php?cartid=<?php echo $cart_item['id']?>" style="color: crimson;">刪除</a>
            <?php }?>
        </div>
        <?php }?>
    </div>
    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">$<?php echo $total ?></div>
    </div>
    <button type="button" class="buy-btn"><a href="./web/checkout.php">立刻下單</button>
    <ion-icon name="close" id="close-cart"></ion-icon>
</div>

<script>
    function removecartnumber(){}
    function addcartnumber(id){
        let params = new URLSearchParams();
        params.append('id',id );
        params.append('quantity',1 );
        axios.post('web/changecart.php', params)
        .then(function (response) {
            console.log(response);
            window.location.reload();
        })
        .catch(function (error) {
            console.log(error);
        });
    }
    function changecart(e){
        console.log(e.target);
        // let params = new URLSearchParams();
        // params.append('id',id );
        // params.append('quantity',quantity );
        // axios.post('web/changecart.php', params)
        // .then(function (response) {
        //     console.log(response);
        // })
        // .catch(function (error) {
        //     console.log(error);
        // });
}
</script>