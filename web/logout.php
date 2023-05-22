<?php
    session_start();
    $_SESSION['account'] = '';
    $_SESSION['password'] = '';
    $_SESSION['name'] = '';
    $_SESSION['email'] = '';
    $_SESSION['phone'] = '';
    $_SESSION['school'] = '';
    $_SESSION['level'] = '';

    unset($_SESSION['account']);
    unset($_SESSION['password']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['school']);
    unset($_SESSION['level']);
    header("location:../index.php?method=message&message=You've Logged Out！");
?>