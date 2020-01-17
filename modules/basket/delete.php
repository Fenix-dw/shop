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


			if($basket['basket'][$i]['product_id'] == $_POST['id']) {
				unset($basket['basket'][$i]);
				sort($basket['basket']);

			} else{
				$sum[] = (int)($product['cost']) * (int)($basket['basket'][$i]['count']);
				$sum1 = (int)($product['cost']) * (int)($basket['basket'][$i]['count']);
			}
			
		}	

		//  Очистка куки
		setcookie("basket", "", 0, "/");
		// якщо масив не пустий то
		if ($basket['basket'] != [] ){
			// Преобразование масива в JSON формат
			$jsonProduct = json_encode($basket);
			// Добавление куки
			setcookie("basket", $jsonProduct, time() + 60*60, "/");	


		}
		if(count($basket['basket']) == 0) {
				$sum1 = 0;
		} else if (count($basket['basket']) == 1) {
		} else {
				$sum1 = array_sum($sum);
		}		

		// Вивод преобразование масива в JSON формат 
		echo json_encode([
			// добавление в count количества $basket['basket']
			"count" => count($basket['basket']),
			"sum" => $sum1
		]);		

	}
}
?>
