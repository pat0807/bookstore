<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logincheck</title>
<?php
	session_start();
	$account = $_POST['account'];
	$password = $_POST['password'];
	$link = mysqli_connect('localhost','root','','system');
	$sql = "select distinct * from memberdata where account = '$account' and password = '$password' AND level >= 2";
	$result = mysqli_query($link,$sql);
	if($row=mysqli_fetch_assoc($result)){
		$_SESSION['account'] = $row['account'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['phone'] = $row['phone'];
		$_SESSION['school'] = $row['school'];
		$_SESSION['level'] = $row['level'];
		$_SESSION['id'] = $row['id'];


		header("location:./?method=messagep&message=Login Success");
	}else{
		header("location:./?method=message&message=Login Failed");
	}
	?>
</html>