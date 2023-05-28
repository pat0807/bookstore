<div class="search-bar">
            <form action="./search.php" method="GET"> <!-- 這裡跑版了要改 -->
                <input type="text" name="s" placeholder="搜尋...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="cart-icon" >
                <a href="javascript:;" id="cartBtn">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
            
        <script>
            const cartBtn = document.getElementById('cartBtn')
            const cartui = document.getElementById('cartui')
            const cartClose =document.getElementById('cartClose')
            let open = false
            cartClose.addEventListener('click', ()=>{
                open = false
                if(open){
                    cartui.style.right = '0'
                }else{
                    cartui.style.right = '-100%'
                }
            })
            cartBtn.addEventListener('click' , ()=>{
                open = true
                if(open){
                    cartui.style.right = '0'
                }else{
                    cartui.style.right = '-100%'
                }
            })
        </script>