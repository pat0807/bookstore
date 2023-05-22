<?php 
if(isset($_SESSION['level']) && $_SESSION['level'] <3){
  header("Location: home.php");
}

if(isset($_POST["action"])&&($_POST["action"]=="add")){
	include("./conn/connMysqlObj.php");
	$sql_query = "INSERT INTO product (bookname, sort, description ,author ,price) VALUES (?, ?, ?, ?, ?)";
	$stmt = $db_link -> prepare($sql_query);
	$stmt -> bind_param("sssss", $_POST["bookname"], $_POST["sort"], $_POST["description"], $_POST["author"], $_POST["price"]);
	$stmt -> execute();
	$stmt -> close();
	$db_link -> close();
	
	header("Location: home.php");
}	
?>
<!DOCTYPE html>
<html lang="en"><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css">


</head>
<body>


<p align="center"><a href="../index.php">回主畫面</a></p>
<form action="" method="post" name="formAdd" id="formAdd">
  <table border="1" align="center" cellpadding="4">
    <tr>
      <th><font color="white">欄位</th></font><th><font color="white">資料</font></th>
    </tr>
    <tr>
      <td><font color="white">書名</td><td><input type="text" name="bookname" id="bookname"></td>
    </tr>
    
    <tr>
      <td><font color="white">分類</font></td><td>
        <select name="sort" id="sort">
    <option value="" selected disabled>請選擇分類</option>
    <option value="1">文史哲類</option>
    <option value="2">外語類</option>
    <option value="3">財經類</option>
    <option value="4">管理類</option>
    <option value="5">法政類</option>
    <option value="6">社會與心理類</option>
    <option value="7">大眾傳播類</option>
    <option value="8">教育類</option>
    <option value="9">藝術類</option>
    <option value="10">電機資訊類</option>
    <option value="11">工程類</option>
    <option value="12">建築與設計類</option>
    <option value="13">數理化類</option>
    <option value="14">生命科學類</option>
    <option value="15">生物資源類</option>
    <option value="16">地球與環境科學類</option>
    <option value="17">休閒餐旅類</option>
    <option value="18">醫藥衛生類</option>

</select>
</td>
    </tr>
    
    <tr>
      <td><font color="white">描述</font></td><td><input type="textarea" name="description" id="description"></td>
    </tr>
    <tr>
      <td><font color="white">作者</font></td><td><input type="text" name="author" id="author"></td>
    </tr>
    <tr>
      <td><font color="white">價格</font></td><td><input type="text" name="price" id="price"></td>
    </tr>
    
    
    <tr>
      <td colspan="2" align="center">
      <input name="action" type="hidden" value="add">
      <input type="submit" name="button" id="button" value="新增資料">
      <input type="reset" name="button2" id="button2" value="重新填寫">
      </td>
    </tr>
    
  </table>
</form>
</body>
</html>