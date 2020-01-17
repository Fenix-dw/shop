<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

$sql = "DELETE FROM orders WHERE id=" . $_GET["id"]; 

if(mysqli_query($conn, $sql)){
	header("Location: /admin/orders.php");
} else {
	echo "Ошибка";
}

 ?>