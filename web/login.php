<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>
<header id="header">
        <div class="logo">
            <h1 class="logo"><a href="../index.php">2nd BS.</a></h1>
        </div>
    </header>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post" action="logincheck.php">  
                    <h2>LOGIN</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="account" required>
                        <label for="">帳號</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">密碼</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">記住密碼</label>
                        <a href="#">忘記密碼</a>
                    </div>
                    <button class="login-btn">登入</button>
                    <div class="register">
                        <p>目前沒有帳號！<a href="register.php">註冊</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>