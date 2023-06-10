<?php
    session_start();
    $connect=mysqli_connect("localhost","root","12345678","system(2)"); 

    $fromUser= $_POST["fromUser"];
    $toUser= $_POST["toUser"];
    $message= $_POST["message"];

    $output="";

    $sql = "INSERT INTO messages (FromUser, ToUser, Message)
    VALUES('$fromUser','$toUser','$message')";

    if($connect -> query($sql))
    {
        $output.="";
    }else{
        $output.="Error. Please Try Again";
    }
    echo $output;
?>