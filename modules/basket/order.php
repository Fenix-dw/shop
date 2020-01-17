<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/configs/configs.php";
include $_SERVER['DOCUMENT_ROOT'] . "/modules/telegram/send-message.php";
	
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"
		&& isset($_POST['username']) && isset($_POST['adress'])  && isset($_POST['phone'])
		&& $_POST['username'] != ""&& $_POST['adress'] != ""&& $_POST['phone'] != ""  ){

		$sql = "SELECT * FROM users where phone LIKE '" . $_POST['phone'] ."'";
		$user_id = 0;
		$result =$conn->query($sql);
		
		if($result->num_rows > 0) {
			$user = mysqli_fetch_assoc($result);
			$user_id = $user['id'];
		} else {
			$sql = "INSERT INTO users( login, phone, email ) VALUES ('".$_POST['username']."', '".$_POST['phone']."', '".$_POST['email']."')";
			if($conn->query($sql)) {
				echo "User add!";
				$user_id = $conn->insert_id;
			} else {
				echo "errror!!!" . mysqli_error($conn);
			}
		}

		if ($user_id != 0){
			$sql = "INSERT INTO orders (user_id, products, adress) 
				  VALUES ('". $user_id ."', '". $_COOKIE['basket'] ."', '". $_POST['adress'] ."')";

			// Выполнить sql к базе данных
			if($conn->query($sql)){
				header ("Location: /");
				setcookie("basket", "", 0, "/");

				message_to_telegram('Новий заказ!');
				
			} else {
				echo "Ошибка". mysqli_error($conn);
				echo "<pre>";
			}
		}

		}


 ?>