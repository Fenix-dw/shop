<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

$sql = "DELETE FROM users WHERE id=" . $_GET["id"]; 

if(mysqli_query($conn, $sql)){
	header("Location: /admin/users.php");
} else {
	echo "Ошибка";
}

 ?>