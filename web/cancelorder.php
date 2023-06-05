<!-- <?php 
if(isset($_SESSION['level']) && $_SESSION['level'] <3){
  header("Location: home.php");
}
	include("../conn/connMysqlObj.php");
	if(isset($_POST["action"])&&($_POST["action"]=="delete")){	
		$sql_query = "DELETE FROM order WHERE id=?";
		$stmt = $db_link -> prepare($sql_query);
		$stmt -> bind_param("s", $_POST["id"]);
		$stmt -> execute();
		$stmt -> close();
		$db_link -> close();
		//重新導向回到主畫面
		header("Location: index.php");
	}
	$sql_select = "SELECT id, customerid, order_time FROM order WHERE id = ?";
	$stmt = $db_link -> prepare($sql_select);
	$stmt -> bind_param("s", $_GET["id"]);
	$stmt -> execute();
	$stmt -> bind_result($id, $customerid, $order_time);
	$stmt -> fetch();
?> -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css">
<title>二手書交易系統</title>
</head>
<body>

<p align="center"><a href="./index.php">回主畫面</a></p>
<form action="" method="post" name="formDel" id="formDel">
  <table border="2" align="center" cellpadding="4">
    <tr>
      <th><font color="white">欄位</font></th><th><font color="white">資料</font></th>
    </tr>
    <tr>
      <td><font color="white">customerid</font></td><td><font color="white"><?php echo $customerid;?></font></td>
    </tr>
    <tr>
      <td><font color="white">order_time</font></td><td><font color="white"><?php echo $order_time;?></font></td>
    </tr>
   
    
    
    <tr>
      <td colspan="2" align="center">
      <input name="id" type="hidden" value="<?php echo $id;?>">
      <input name="action" type="hidden" value="delete">
      <input type="submit" name="button" id="button" value="確定刪除這筆資料嗎？">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
	$stmt -> close();
	$db_link -> close();
?>