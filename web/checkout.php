<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上二手書局</title>
</head>

<style>
    body {
    margin-left: 0;
    font-family: "Open Sans", sans-serif;
    background-image: url('../images/pic01.jpg');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center;
}

ion-icon,span{
    display: inline-box;
    color: white;
}

label,img{
    display: block;
}

input{
    font: inherit;
    width: 100%;
    border: none;
}

input:focus{
    outline: 2px solid #8484e3;
}

*,*::before,::after{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

div{
    color: white;
}

button{
    border: none;
    background: none;
    font: inherit;
    cursor: pointer;
    color: white;
}

span{
    color: white;
}

h1,h2,h3,h4,h5,h6,p,label{
    font-family: 'Times New Roman', Times, serif;
    color: white;
}

.checkout-container {
    max-width: 1440px;
    max-height: 100vh;
    margin: auto;
    display: flex;
    flex-direction: column;
}

.heading {
    font-size: 28px;
    font-weight: 600;
    color: #8484e3;
    border-bottom: 1px solid;
    padding: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.heading ion-icon{
    font-size: 40px;
}

.item-flex{
    display: flex;
    flex-grow: 1;
}

.checkout{
    width: 70%;
    padding: 40px;
    border-right: 1px solid hsl(0, 0, 90%);
}

.section-heading{
    color: white;
    margin-bottom: 30px;
    font-size: 24px;
    font-weight: 500;
}

.payment-form{
    margin-bottom: 40px;
}

.payment-method{
    display: flex;
    align-items: center;
    gap: 30px;
    margin-bottom: 40px;
}

.payment-method .method{
    border: 1px solid white;
    border-radius: 5px;
    padding: 15px 30px;
    width: 40%;
    display: flex;
    align-items: center;
    gap: 20px;
    cursor: pointer;
    font-size: 18px;
    background: hsla(0, 1%, 17%, 0.5);
}

.payment-method .selected{
    border-color: #8484e3;
}

.payment-method .method ion-icon{
    font-size: 20px;
}

.payment-method .method .checkmark{
    margin-left: auto;
}

.label-default{
    padding-left: 10px;
    margin-bottom: 5px;
    font-size: 15px;
}

.input-default{
    background: hsla(0, 1%, 17%, 0.3);
    border-radius: 10px;
    border: 1px solid white;
    color: white;
    padding: 5px;
}

.payment-form input{
    padding: 10px 15px;
    font-size: 18px;
}

.cardholder-name,.card-number{
    margin-bottom: 20px;
}

.card-number input,.cvv{
    letter-spacing: 3px;
}

.input-flex{
    display: flex;
    align-items: center;
    gap: 30px;
}

.input-flex .expire-date,
.input-flex .cvv{
    width: 50%;
}

.expire-date .input-flex{
    gap: 13px;
}

.expire-date .input-flex input{
    text-align: center;
}

.btn{
    border-radius: 5px;
    border: 1px solid;
    cursor: pointer;
}

.btn:active{
    transform: scale(0.9);
}

.btn:focus{
    color: white;
    outline: 2px solid #8484e3 ;
    outline-offset: 2px;
}

.btn-primary{
    background-color: orangered;
    font-weight: 500;
    padding: 13px 45px;
}

.btn-primary b{
    margin-right: 10px;
}

.cart{
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.cart-item-box{
    padding: 40px 60px;
    margin-bottom: auto;
}

.product-card:not(last-child){
    margin-bottom: 20px;
}

.product-card .card{
    position: relative;
    display: flex;
    align-items: center;
    gap: 20px;
}

.card .product-img{
    border-radius: 5px;
}

.card .detail .product-name{
    font-size: 15px;
    color: white;
    margin-bottom: 10px;
}

.card .detail .wrapper{
    display: flex;
    gap: 20px;
}

.product-qty{
    display: flex;
    align-items: center;
    gap: 10px;
}

.product-qty button{
    background: hsla(0, 1%, 17%, 0.3);
    width: 20px;
    height: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
     
}

.product-qty button:active,
.product-close-btn:active{
    transform: scale(0.9);
}

.product-qty button ion-icon{
    font-size: 10px;
}

.product-close-btn{
    position: absolute;
    top: 0;
    right: 0;
}

.product-close-btn ion-icon{
    font-size: 25px;
}

.product-close-btn:hover ion-icon{
    color: #8484e3;
}

.discount-token{
    padding: 40px 60px;
    border-top: 1px solid transparent;
    border-bottom: 1px solid white;
}

.wrapper-flex{
    display: flex;
    align-items: center;
    gap: 30px;
}

.wrapper-flex input {
    padding: 12px 15px ;
    letter-spacing: 2px;
}

.btn-outline{
    padding: 10px 25px;
}

.btn-outline:hover{
    background: hsla(0, 1%, 17%, 0.3);
}

.amount{
    padding: 40px 60px;
}

.amount > div{
    display: flex;
    justify-content: space-between;
}

.amount > div:not(last-child){
    margin-bottom: 10px;
}

.amount .total{
    font-size:18px ;

}

@media(max-width: 1200px){
    .item-flex{flex-direction: column-reverse;}

    .cheakout{
        width: 100%;
        border-right: none;
    }

    .btn-primary{width: 100%;}

    .cart{
        display: grid;
        grid-template-columns: 1fr 1fr;
        width: 100%;
        border-bottom: 1px solid;
    }

    .cart .wrapper{
        margin-top: auto;
    }

    .cart .cart-item-box{
        border-right: 1px solid;
        margin-bottom: 0;
    }

    .discount-token{
        border-top: none;
    }
}

@media(max-width: 768px){
    .cart{grid-template-columns: 1fr;}
    .discount-token{border-top: 1px solid;}
    .wrapper-flex{gap: 20px;}
}

@media(max-width: 567px){
    .payment-method{
        flex-direction: column;
        gap: 20px;
    }

    .payment-method .method{width: 100%;}

    .input-flex .expire-date,
    .input-flex .cvv{
        width: 100%;
    }

    .expire-date .input-flex{flex-direction: row;}
}


</style>


<body>
<div class="checkout-container">
    <h1 class="heading">
        <ion-icon name="cart-outline"></ion-icon> 結帳
    </h1>
    <div class="item-flex">
        <section class="checkout">
            <h2 class="section-heading">付款細節</h2>
            <div class="payment-form">
                <div class="payment-method">
                    <button class="method selected">
                        <ion-icon name="card-outline"></ion-icon>
                        <span>信用卡</span>
                        <ion-icon class="checkmark fill" name="checkmark-circle"></ion-icon>
                    </button>
                    <button class="method">
                        <ion-icon name="car-outline"></ion-icon>
                        <span>貨到付款</span>
                        <ion-icon class="checkmark" name="checkmark-circle-outline"></ion-icon>
                    </button>
                </div>

                <form action="#">
                    <div class="cardholder-name">
                        <label for="cardholder-name" class="label-default">持卡人姓名</label>
                        <input type="text" name="cardholder-name" id="cardholder-name" class="input-default">
                    </div>

                    <div class="card-number">
                        <label for="card-number" class="label-default">卡號</label>
                        <input type="number" name="card-number" id="card-number" class="input-default">
                    </div>

                    <div class="input-flex">
                        <div class="expire-date">

                            <label for="expire-date" class="label-default">有效期限</label>

                            <div class="input-flex">
                                <input type="number" name="day" id="expire-date" placeholder="31" min="1" max="31" class="input-default">
                                /
                                <input type="number" name="month" id="expire-date" placeholder="12" min="1" max="12" class="input-default">
                            
                            </div>
                        </div>

                        <div class="cvv">
                            <label for="cvv" class="label-default">安全碼</label>
                            <input type="number" name="cvv" id="cvv" class="input-default">
                        </div>
                    </div>


                </form>
            </div>
        
            <button class="btn btn-primary">
                <b>付款</b> $ <span id="payAmount">300</span>
            </button>
        
        </section>
    
        <section class="cart">
            <div class="cart-item-box">
                <h2 class="section-heading">購買商品</h2>

                <div class="product-card">
                    <div class="card">
                        <div class="img-box">
                            <img src="./images/book1.jpg" alt="book1" class="product-img" width="80px">
                        </div>

                        <div class="datail">
                            <h4 product-name>Book 1</h4>
                            <div class="wrapper">
                                <div class="product-qty">
                                    <button id="decrement">
                                        <ion-icon name="remove-outline"></ion-icon>
                                    </button>

                                    <span id="quantity">1</span>

                                    <button id="increment">
                                        <ion-icon name="add-outline"></ion-icon>
                                    </button>
                                </div>

                                <div class="price">
                                    $ <span id="price">100</span>
                                </div>

                            </div>
                        </div>
                    
                        <button class="product-close-btn">
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    
                    </div>

                </div>

                <div class="product-card">
                    <div class="card">
                        <div class="img-box">
                            <img src="./images/book2.jpg" alt="book2" class="product-img" width="80px">
                        </div>

                        <div class="datail">
                            <h4 product-name>Book 2</h4>
                            <div class="wrapper">
                                <div class="product-qty">
                                    <button id="decrement">
                                        <ion-icon name="remove-outline"></ion-icon>
                                    </button>

                                    <span id="quantity">1</span>

                                    <button id="increment">
                                        <ion-icon name="add-outline"></ion-icon>
                                    </button>
                                </div>

                                <div class="price">
                                    $ <span id="price">200</span>
                                </div>

                            </div>
                        </div>
                    
                        <button class="product-close-btn">
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    
                    </div>

                </div>

                
            </div>

            <div class="wrapper">

                <div class="discount-token">
                    <label for="token" class="label-default">優惠碼</label>

                    <div class="wrapper-flex">
                        <input type="text" name="discount-token" id="discount-token" class="input-default">

                        <button class="btn btn-outline">Apply</button>
                    </div>
                </div>
            
                <div class="amount">
                    
                    <div class="subtotal">
                        <span>小計</span> $<span id="subtotal">300</span>
                    </div>
                    <div class="tax">
                        <span>稅</span> $<span id="tax">0</span>
                    </div>
                    <div class="shipping">
                        <span>運費</span> $<span id="shipping">35</span>
                    </div>
                    <div class="total">
                        <span>共計</span> $<span id="total">335</span>
                    </div>
                </div>

            </div>

        </section>
    
    
    </div>

</div>









    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        'use strict';


        const payAmounBtn = document.querySelectorAll('#payAmount');
        const decrementBtn = document.querySelectorAll('#decrement');
        const quantityElem = document.querySelectorAll('#quantity');
        const incrementBtn = document.querySelectorAll('#increment');
        const priceElem = document.querySelectorAll('#price');
        const subtotleElem = document.querySelectorAll('#subtotle');
        const taxElem = document.querySelectorAll('#tax');
        const totleElem = document.querySelectorAll('#totle');



        for (let i = 0; i < incrementBtn.length; i++) {
        
            incrementBtn[i].addEventListener('click', function() {
                let increment = Number(this.previousElementSibling.textContent);
            
                increment++;
            
                this.previousElementSibling.textContent = increment;
            
                totalCalc();
            
            });
        
        
            decrementBtn[i].addEventListener('click', function() {
            
                let decrement = Number(this.nextElementSibling.textContent);
            
                decrement <= 1 ? 1 : decrement--;
            
                this.nextElementSibling.textContent = decrement;
            
                totalCalc();
            });
        
        }



        const totalCalc = function() {
            const tax = 10;
            let subtotal = 0;
            let totalTax = 0;
            let total = 0;
        
            for (let i = 0; i < quantityElem.length; i++) {
                subtotal += Number(quantityElem[i].textContent) * Number(priceElem[i].textContent);
            
                subtotleElem.textContent = subtotal.toFixed(2);
            
                totalTax = subtotal * tax;
            
                taxElem.textContent = totalTax.toFixed(2);
            
                total = subtotal + totalTax;
            
                taxElem.textContent = total.toFixed(2);
            
                payAmounBtn.textContent = total.toFixed(2);
            
            
            };
        
        
        }

    </script>
</body>

</html>