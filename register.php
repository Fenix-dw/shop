<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

if(isset($_GET['u_code'])) {

	$sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "' ";

	$result = $conn->query($sql);

	if($result->num_rows > 0 ) {
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE users SET verifided = '1', confirm_mail = '' WHERE id =" . $user['id'];

		if($conn->query($sql)) {
			echo "Пользователь верифицирован!";
		} else {
			echo "Error";
		}

	}
}

// есле существует пост запрос то
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {	
	$password = md5($_POST['pass']);
	 // register
	$u_code = generateRandomString(20);

	$sql = "INSERT INTO users (login, password, email , confirm_mail , phone) VALUES ('". $_POST['username']."', '". $password."', '". $_POST['email'] ."', '$u_code', '". $_POST['phone'] ."')";
	
	
	
	if($conn->query($sql)) {
		echo "Пользователь зарегистрирован <br/> Подтвертите почту <br/>";
		$link = "<a href='http://master-shop.loc/register.php?u_code=$u_code'>Confirm</a>";
		mail($_POST['email'], 'Register', $link);
		echo $link;
	} else {
		echo "Ошибка!!!";
	}


}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>
<body class="text-center">

<form class="form-signin col-md-4 offset-4 mt-5 pt-5" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Please register</h1>
  	<label class="sr-only">Username</label>
  	<input type="text" name="username" class="form-control" placeholder="Username" >
  
  <label class="sr-only">Email</label>
  <input type="text" name="email" class="form-control" placeholder="you@example.com" >
  	
  	<label class="sr-only">Phone</label>
  	<input type="text" name="phone" class="form-control" placeholder="phone" >
  
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="pass" class="form-control" placeholder="Password">
  
  <div class="checkbox mb-3">
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
  <a href="/login.php"> Войти </a>
  <p class="mt-5 mb-3 text-muted">© 2019-2020</p>
</form>


</body>
</html>