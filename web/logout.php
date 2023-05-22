<?php
    session_start();
    $_SESSION['account'] = "";
    $_SESSION['password'] = "";
    header("location:index.php?method=message&message=You've Logged Out！");
?>