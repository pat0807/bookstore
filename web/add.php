<?php 
if(isset($_SESSION['level']) && $_SESSION['level'] <3){
  header("Location: home.php");
}

if(isset($_FILES["picture"])&&($_POST["action"]=="add")){
	include("../conn/connect.php");
  
  $rand = strval(rand(1000,1000000));
  
  $bookname = $_POST['bookname'];
  $sort = $_POST['sort'];
  $description = $_POST['description'];
  $author = $_POST['author'];
  $price = $_POST['price'];
  
  $file      = $_FILES['picture'];           //上傳檔案信息
  $file_name = $file['name'];                //上傳檔案的原來檔案名稱
  $file_type = $file['type'];                //上傳檔案的類型(副檔名)
  $tmp_name  = $file['tmp_name'];            //上傳到暫存空間的路徑/檔名
  $file_size = $file['size'];                //上傳檔案的檔案大小(容量)
  $error     = $file['error'];   
  $imgsrc = $rand.$file_name;

 
  $sql_str = "INSERT INTO product (bookname,sort,description,author,price,picture) VALUES (:bookname,:sort,:description,:author,:price,:picture)";
  $stmt = $conn -> prepare($sql_str);
  
  $stmt -> bindParam(':bookname' ,$bookname);
  $stmt -> bindParam(':sort' ,$sort);
  $stmt -> bindParam(':description' ,$description);
  $stmt -> bindParam(':author' ,$author);
  $stmt -> bindParam(':price' ,$price);
  $stmt -> bindParam(':picture' ,$imgsrc);
  $stmt ->execute();


  $allow_ext = array('jpeg', 'jpg', 'png', 'gif','JPG','JPEG','PNG','GIF');
  $path = '../images/upload/';
  if (!file_exists($path)) { mkdir($path); }
 
  //2.判斷上傳沒有錯誤時 => 檢查限制的條件 =============================================
  if ($error == 0) {
  $ext = pathinfo($file_name, PATHINFO_EXTENSION);
  //in_array($ext, $allow_ext) 判斷 $ext變數的值 是否在 $allow_ext 這個陣列變數中
  if (!in_array($ext, $allow_ext)) {
      exit('檔案類型不符合，請選擇 jpeg, jpg, png, gif 檔案');
  }
    $result = move_uploaded_file($tmp_name, $path.$file_name);
  
    if (file_exists($path.$file_name)) {
      $result = copy($path.$file_name, $path.$rand.$file_name);
      $result = unlink($path.$file_name);
    }
    // header('Location:newsCreate.php');
    echo "<script>alert('上傳成功!');window.location.href = ../index.php' </script>";
 
  } else {
    switch ($error) {
      case 1:  echo '上傳檔案超過 upload_max_filesize 容量最大值';  break;
      case 2:  echo '上傳檔案超過 post_max_size 總容量最大值';  break;
      case 3:  echo '檔案只有部份被上傳';  break;
      case 4:  echo '沒有檔案被上傳';  break;
      case 6:  echo '找不到主機端暫存檔案的目錄位置';  break;
      case 7:  echo '檔案寫入失敗';  break;
      case 8:  echo '上傳檔案被PHP程式中斷，表示主機端系統錯誤';  break;
    }
  }
  
  echo "<script>alert('新增成功!');window.location.href = '../index.php' </script>";
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
<form action="" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">
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
      <td><font color="white">圖片</font></td><td><input type="file" name="picture" id="picture"></td>
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