<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

// номер страници
$page = $_GET['page'];
// насколь треба отступить
$offset = $page * 6;
// sql - запрос
$sql = "SELECT * FROM products LIMIT 6 OFFSET " . $offset;
// Выполнить sql к базе данных
$result = $conn->query($sql);

// цикл виполняється поки є обєкти
while ($row = mysqli_fetch_assoc($result)) {
	// подключение карти продукта
	include $_SERVER['DOCUMENT_ROOT'] . "/parts/product_card.php";
}

 ?>