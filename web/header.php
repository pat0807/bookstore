<?php session_start();?>
<header id="header">
    <div class="logo">
        <h1 class="logo"><a href="../index.php">2nd BS.</a></h1>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="../index.php">主頁</a></li>
            <li><a href="./about.php">關於我們</a></li>
            <li class="commodity"><a href="#">商品</a>
                <ul>
                    <li><a href="./products.php?sort=1">文史哲類</a></li>
                    <li><a href="./products.php?sort=2">外語類</a></li>
                    <li><a href="./products.php?sort=3">財經類</a></li>
                    <li><a href="./products.php?sort=4">管理類</a></li>
                    <li><a href="./products.php?sort=5">法政類</a></li>
                    <li><a href="./products.php?sort=6">社會與心理類</a></li>
                    <li><a href="./products.php?sort=7">大眾傳播類</a></li>
                    <li><a href="./products.php?sort=8">教育類</a></li>
                    <li><a href="./products.php?sort=9">藝術類</a></li>
                    <li><a href="./products.php?sort=10">電機資訊類</a></li>
                    <li><a href="./products.php?sort=11">工程類</a></li>
                    <li><a href="./products.php?sort=12">建築與設計類</a></li>
                    <li><a href="./products.php?sort=13">數理化類</a></li>
                    <li><a href="./products.php?sort=14">生命科學類</a></li>
                    <li><a href="./products.php?sort=15">生物資源類</a></li>
                    <li><a href="./products.php?sort=16">地球與環境科學類</a></li>
                    <li><a href="./products.php?sort=17">休閒餐旅類</a></li>
                    <li><a href="./products.php?sort=18">醫藥衛生類</a></li>
                </ul>
            </li>
            <li><a href="./member.php">會員中心</a></li>
            <?php 
                if(isset($_SESSION['level']) && $_SESSION['level'] >=3){
                    echo '<li><a href="./add.php">新增商品</a></li>';
                }
            ?>
            <?php 
                if(isset($_SESSION['level']) && $_SESSION['level'] >=2){
                    echo '<li><a href="./orderlist.php">訂單管理</a></li>';
                }
            ?>
            <?php
                if(isset($_SESSION['account'])) 
                {
                ?>
                <li><a href="./startchat.php">私訊</a></li>
            <?php
                }else{
                ?>
                <li><a href="./nochat.php">私訊</a></li>
            <?php
                }
                ?>
            
        <?php
        if(isset($_SESSION['account'])){
        ?>
        </ul> 
        </nav>
        <a href="./logout.php" class="login-register-btn">登出</a>   
        <?php
        }else{
        ?>
        </ul> 
    </nav>
    <a href="./login.php" class="login-register-btn">登入/註冊</a>
    <?php   
        }
    ?>
</header>