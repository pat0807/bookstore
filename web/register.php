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
            <form method="post" action="dblink.php" id="form">
                  <input type=hidden name="dbaction" value="register">
                    <h2>REGISTRATION</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="account" required>
                        <label for="">使用者名稱 / 帳號</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">密碼</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="checkmark-done-outline"></ion-icon>
                        <input type="password" name="confirm_password"required>
                        <label for="">確認密碼</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">已了解相關<a href="#">使用條款</a></label>
                    </div>
                    <button class="register_btn" type="submit" id="register_btn">註冊</button>
                    <div class="register">
                        <p>已經有帳號了！<a href="login.php">登入</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- <script src="verify.js"></script> -->
</body>
</html>