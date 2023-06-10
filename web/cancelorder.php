<!-- <?php 

	include("../conn/connMysqlObj.php");
	if(isset($_POST["action"])&&($_POST["action"]=="delete")){	
		
    $sql_query = "DELETE FROM orders WHERE id=?";
		$stmt = $db_link -> prepare($sql_query);
		$stmt -> bind_param("s", $_POST["id"]);
		$stmt -> execute();
		$stmt -> close();
		$db_link -> close();
    
		//重新導向回到主畫面
		header("Location: orderlist.php");
	}
	$sql_select = "SELECT id, member_id, cardholder_name, card_number, inform, total, order_time FROM orders WHERE id = ?";
	$stmt = $db_link -> prepare($sql_select);
	$stmt -> bind_param("s", $_GET["id"]);
	$stmt -> execute();
	$stmt -> bind_result($id, $member_id, $cardholder_name, $card_number, $inform, $total, $order_time);
	$stmt -> fetch();
?> -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css">
<title>二手書交易平台</title>
</head>
<body>

<p align="center"><a href="../web/orderlist.php">回主畫面</a></p>
<form action="" method="post" name="formDel" id="formDel">
  <table border="2" align="center" cellpadding="4">
    <tr>
      <th><font color="white">欄位</font></th><th><font color="white">資料</font></th>
    </tr>
    <tr>
      <td><font color="white">顧客編號</font></td><td><font color="white"><?php echo $member_id;?></font></td>
    </tr>
    <tr>
      <td><font color="white">持卡人姓名</font></td><td><font color="white"><?php echo $cardholder_name;?></font></td>
    </tr>
    <tr>
      <td><font color="white">信用卡卡號</font></td><td><font color="white"><?php echo $card_number;?></font></td>
    </tr>
    <tr>
      <td><font color="white">商品詳情</font></td><td><font color="white"><?php echo $inform;?></font></td>
    </tr>
    <tr>
      <td><font color="white">總價</font></td><td><font color="white"><?php echo $total;?></font></td>
    </tr>
    <tr>
      <td><font color="white">下單時間</font></td><td><font color="white"><?php echo $order_time;?></font></td>
    </tr>
    
   
    
    
    <tr>
      <td colspan="2" align="center">
      <input name="id" type="hidden" value="<?php echo $id;?>">
      <input name="action" type="hidden" value="delete">
      <input type="submit" name="button" id="button" value="確定取消這筆交易嗎？">
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