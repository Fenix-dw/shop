<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";



// есле существует пост запрос то
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {	
	$password = md5($_POST['pass']);
	
	$sql = "SELECT * FROM users WHERE login='". $_POST['username']. "' AND password='$password'";

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		echo "Пользователь найден <br/>";
		$user = mysqli_fetch_assoc($result);
		$user_id = $user['id']; 

		if($user['verifided'] == 1){
			echo "Пользователь верифицирован!";

			setcookie("user_id", $user_id, time() + 60*60, "/" );
			header ("Location: /");

		} else {
			echo "Подтвердите почту! <br/>";
			echo "<a href='http://master-shop.loc/verifided.php?user_id=$user_id'>Повторно отправить письмо</a>";

		}
	} else {
		echo "Пользователь не найден";
	}

}




 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>
 <body class="text-center">




<form class="form-signin col-md-4 offset-4 mt-5 pt-5" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label class="sr-only">Username</label>
  <input type="text" name="username" class="form-control" placeholder="Username" >
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="pass" class="form-control" placeholder="Password">
  <div class="checkbox mb-3">
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <a href="/register.php"> Регистрация </a>
  <p class="mt-5 mb-3 text-muted">© 2019-2020</p>
</form>



</body>
</html>
