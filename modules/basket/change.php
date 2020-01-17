<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";


// есле существует пост запрос то
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {	
	if (isset($_COOKIE['basket'])){
		

		$basket = json_decode($_COOKIE['basket'], true);

		for($i = 0; $i < count($basket['basket']); $i++){

		// sql - запрос
		$sql = "SELECT * FROM products WHERE id=" . $basket['basket'][$i]['product_id'];

		// Выполнить sql к базе данных
		$result = $conn->query($sql);
		// mysqli_fetch_assoc - преобразовать полученых данных продукта в массив
		$product = mysqli_fetch_assoc($result);	

			if ($basket['basket'][$i]['product_id'] == $_POST['id']) {
				$basket['basket'][$i]['count'] = (int)($_POST['count']);
				$cost = (int)($product['cost']) * (int)($_POST['count']);
				$sum[] = $cost;
				

			} else{
				$sum[] = (int)($product['cost']) * (int)($basket['basket'][$i]['count']);
			}
		}	

				
		//  Очистка куки
		setcookie("basket", "", 0, "/");
			// Преобразование масива в JSON формат
			$jsonProduct = json_encode($basket);
			// Добавление куки
			setcookie("basket", $jsonProduct, time() + 60*60, "/");		

			echo json_encode([ 
				"cost" => $cost,
				"sum" => array_sum($sum)
			]);
				
	}
}




 ?>