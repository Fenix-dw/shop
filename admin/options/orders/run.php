<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

$sql = "UPDATE orders SET status='" . $_GET["status"] . "'  WHERE id=" . $_GET["id"];

if(mysqli_query($conn, $sql)){
	header("Location: /admin/orders.php");
} else {
	echo "Ошибка". mysqli_error($conn);
}

 ?>