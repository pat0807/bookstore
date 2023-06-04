<?php 
require_once("../conn/connMysqlObj.php");
if(isset($_POST["customerid"]) && ($_POST["customerid"]!="")){
	
	require_once("class.Cart.php");
	
	$cart = new Cart([
		
		'cartMaxItem' => 0,
		
		'itemMaxQuantity' => 0,
	
		'useCookie' => false,
	]);
		
	if($cart->getTotalitem( ) > 0) {
		$allItems = $cart->getItems();
		foreach ($allItems as $items) {
			foreach ($items as $item) {
				$sql_query="INSERT INTO order(id ,customerid ,order_time VALUES (?, ?, ?, ?)";
				$stmt = $db_link->prepare($sql_query);
				$stmt->bind_param("sss", $o_pid, $item['id'], $item['bookname'], $item['price']);
				$stmt->execute();
				$stmt->close();
			}
		}
	}
}	
	
?>
