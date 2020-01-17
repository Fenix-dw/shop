<?php 

if(isset($_COOKIE['basket'])){
	// Декодирует строку JSON
	$basket = json_decode($_COOKIE['basket'], true);
	// до килькости продукта відняти 1
	$basket['basket'][ $_GET['key'] ]['count'] = $basket['basket'][ $_GET['key' ] ]['count'] - 1; 

	//  Очистка куки
	setcookie("basket", "", 0, "/");

	// Преобразование масива в JSON формат
	$jsonProduct = json_encode($basket);
	// Добавление куки
	setcookie("basket", $jsonProduct, time() + 60*60, "/");	
	
}

 ?>