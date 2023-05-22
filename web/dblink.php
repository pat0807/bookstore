<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>

  <?php
    $dbaction = $_POST['dbaction'];
    $account = $_POST['account'];
	  $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if($password != $confirm_password){
      header("location:index.php?method=message&message=請輸入相同密碼");
    }
    else{
      $link = mysqli_connect('localhost','root','','system');

      if($dbaction=="register")
      {
       $sql  = "insert into memberdata (account,password) values ('$account', '$password')";
         if(mysqli_query($link,$sql))
         {
           //echo "新增成功"; 轉址
         header("location:index.php?method=message&message=註冊成功");
         }
       else
         {
           //echo "新增失敗";
         header("location:index.php?method=message&message=註冊失敗,資料庫錯誤");
         }
      }
    }

 ?>