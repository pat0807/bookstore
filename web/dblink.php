<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    
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
          

          $mail = new PHPMailer(true);

          $mail->isSMTP();
          $mail->HOST = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'z37763985@gmail.com';
          $mail->Password = 'HZS42177';
          $mail->SMTPSecure = 'ssl';
          $mail->Port = 465;

          $mail->setFrom('z37763985@gmail.com');

          $mail->addAddress($_POST['email']);

          $mail->isHTML(true);

          $mail->Subject = '請點擊網址註冊';
          $mail->Body = '網址：1234';

          $mail->send();

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