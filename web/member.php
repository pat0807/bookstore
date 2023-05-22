<?php 
session_start();

if(isset($_SESSION['name']) === false){
    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Register</title>
</head>
<body>
<header id="header">
        <div class="logo">
            <h1 class="logo"><a href="../index.php">2nd BS.</a></h1>
        </div>
    </header>
    <section>
        <div class="form-box2">
            <div class="form-value">
            <form method="post" action="updatemember.php" id="form">
                  <input type=hidden name="dbaction" value="register">
                    <h2>會員中心</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="user" name="name" value="<?php echo $_SESSION['name']?>">
                        <label for="">姓名</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="user" name="email" value="<?php echo $_SESSION['email']?>">
                        <label for="">信箱</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="user" name="phone" value="<?php echo $_SESSION['phone']?>">
                        <label for="">手機</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="user" name="school" value="<?php echo $_SESSION['school']?>">
                        <label for="">學校</label>
                    </div>
                    <a href="">更改密碼</a>
                    <button class="register_btn" type="submit">確認修改</button>

                </form>
            </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>