<?php 
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

// есле существует пост запрос то
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {	

	// sql - запрос
	$sql = "SELECT * FROM products WHERE id=" . $_POST['id'];

	// Выполнить sql к базе данных
	$result = $conn->query($sql);
	// mysqli_fetch_assoc - преобразовать полученых данных продукта в массив
	$product = mysqli_fetch_assoc($result);
	

	// якщо існує $_COOKIE['basket'] і дублікація існує то
	if(isset($_COOKIE['basket'])) {
		// дублікациї не має
		$duplication = 0;
		// Декодирует строку JSON
		$basket = json_decode($_COOKIE['basket'],true);
		// цикл для пошуку дублікації виполняеться поки не закончиться килькисть елементов в масиве $basket['basket'] 
		for($i = 0; $i < count($basket['basket']); $i++ ) {
			// якщо id елемента буде рівне id продукта то
			if( $basket['basket'][$i]['product_id'] == $product['id'] ) {
				// до килькости продукта додати 1
				$basket['basket'][$i]['count']++;
				// дубликация иснуе
				$duplication = 1;
			} 
		} 

	    // якщо  дублікація не існує то
		 if ( $duplication == 0 ) {
			// Добавление в двойной масив  $product["id"]- вибраного пользователя
			$basket["basket"][] = [
				"product_id" => $product['id'], 
				"count" => "1"
			];
		}

	} else { // есле корзина пустая
		// Создание двойного масива и добавление $product["id"]- вибраного пользователя
		$basket = [ "basket" =>  [ 
		   [ "product_id" => $product["id"],
			 "count" => "1" ]

		] ];

	}
	// Преобразование масива в JSON формат
	$jsonProduct = json_encode($basket);

    //  Очистка куки
	setcookie("basket", "", 0, "/");

 	// Добавление куки
	setcookie("basket", $jsonProduct, time() + 60*60, "/");

	// Вивод преобразование масива в JSON формат 
	echo json_encode([
		// добавление в count количества $basket['basket']
		"count" => count($basket['basket'])
	]);


}
	
 ?>