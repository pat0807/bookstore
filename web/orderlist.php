<?php
session_start();
$userid = $_SESSION['id'];
include('../conn/connMysqlObj.php');
$sql_query = "SELECT * FROM orders WHERE member_id ='$userid'";
$result = $db_link->query($sql_query);
$total_records = $result->num_rows;
if ($total_records == 0) {
  header("Location: noorder.php");
  exit(); // Terminate the script after redirecting
}

?>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/style.css">
  <title>線上二手書局</title>

</head>

<body>
  <h1 align="center">訂單管理</h1>

  <table border="1" align="center">
    <!-- 表格表頭 -->
    <p align="center"><a href="../home.php">回主畫面</a></p>

    <tr>
      <th>
        <font color="white">顧客編號</font>
      </th>
      <th>
        <font color="white">持卡人姓名</font>
      </th>
      <th>
        <font color="white">信用卡卡號</font>
      </th>
      <th>
        <font color="white">商品詳情</font>
      </th>
      <th>
        <font color="white">總價</font>
      </th>
      <th>
        <font color="white">下單時間</font>
      </th>
      <th>
        <font color="white">取消訂單</font>
      </th>
    </tr>
    <!-- 資料內容 -->
    <?php
    while ($row_result = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td><span style='color: white;'>" . $row_result["member_id"] . "</span></td>";
      echo "<td><span style='color: white;'>" . $row_result["cardholder_name"] . "</span></td>";
      echo "<td><span style='color: white;'>" . $row_result["card_number"] . "</span></td>";
      echo "<td><span style='color: white;'>" . $row_result["inform"] . "</span></td>";
      echo "<td><span style='color: white;'>" . $row_result["total"] . "</span></td>";
      echo "<td><span style='color: white;'>" . $row_result["order_time"] . "</span></td>";
      if($row_result["status"] == -1){
        echo "<td style='color: white;'>已取消</td>";
      }else{
        echo "<td><a href='cancelorder.php?id=" . $row_result["id"] . "'>取消</a></td>";
      }
      echo "</tr>";
    }

    ?>
  </table>
</body>

</html>