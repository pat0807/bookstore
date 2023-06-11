<?php

include_once('./conn/connect.php');
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'web/phpmailer/src/Exception.php';
    require 'web/phpmailer/src/PHPMailer.php';
    require 'web/phpmailer/src/SMTP.php';

    $dbaction = $_POST['dbaction'];
    $account = $_POST['account'];
	  $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $token = '';
    $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz01234567890123456789';
    $charsetLength = strlen($charset);
    $tokenLength = 30;


    $sql = "SELECT * FROM memberdata WHERE account = :account OR email = :email"; // 1
    $stmt = $conn->prepare($sql); // 2
    $stmt->bindParam(':account',$account); // 3
    $stmt->bindParam(':email',$email);
    $stmt->execute(); // 4

    $member = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($member) >=1){
      header("location:./index.php?method=message&message=已有相同帳號或信箱，請更換帳號或信箱");
      exit();
    }

    for ($i = 0; $i < $tokenLength; $i++) {
        $token .= $charset[rand(0, $charsetLength - 1)];
    }
    if($password != $confirm_password){
      header("location:./index.php?method=message&message=請輸入相同密碼");
      exit();
    }elseif(count($member) >=1){
        header("location:./index.php?method=message&message=已有相同帳號或信箱，請更換帳號或信箱");
        exit();
      }
    else{
      $link = mysqli_connect('localhost','root','','system');

      if($dbaction=="register")
      {
       $sql  = "insert into memberdata (account,password,email,token) values ('$account', '$password', '$email', '$token')";
         if(mysqli_query($link,$sql))
         {
          
          $mail = new PHPMailer(true);
          try {
  
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'z37763985@gmail.com';
            $mail->Password = 'kikluoqoelzoatmu';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
  
            $mail->setFrom('z37763985@gmail.com');
  
            $mail->addAddress($_POST['email']);
  
            $mail->isHTML(true);
  
            $mail->Subject = 'please sign up ';
            $url = 'http://localhost/系統分析/2ndbstore/login.php?account='.$_POST['account'].'&token='.$token;
            $mail->Body = "認證網址 <a href='$url'>$url</a>" ;
  
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
          

           //echo "新增成功"; 轉址
         header("location:index.php?method=message&message=註冊成功");
         }
       else
         {

         header("location:index.php?method=message&message=註冊失敗,資料庫錯誤");
         }
      }
    }

 ?>
請檢查信箱