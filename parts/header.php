<?php 
 include $_SERVER['DOCUMENT_ROOT'] . "/configs/setings.php";
 include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<meta charset="UTF-8">
	<title>Shop</title>
</head>
<body>
	
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a0c9f3;">
  <a class="navbar-brand" href="/">
    <img src="/assets/imges/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Veronica
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacts</a>
      </li>
      
    </ul>
    <a class="navbar-brand ml-2" href="basket.php" id="go-basket">
       <img src="/assets/imges/cart.png" width="30" height="30" alt="" id="btn-basket"> - <span><?php echo $count ?></span>
     </a>
      <?php 
          if(isset($_COOKIE["user_id"])) {
            $sql = "SELECT * FROM users WHERE id=" . $_COOKIE["user_id"];
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
          ?>
              <a  class="nav-link" href="exit.php"><?php echo $user["login"]; ?> &#187;</a> 
            <?php
          } else {
            ?>
            <a class="nav-link" href="login.php" id="open_log_out">Войти</a>
            <?php  
          }
      ?>     
  </div>

</nav>

<div class="container">

	<div class="row my-2">
	  <div class="col-3">
	    <?php 
	    	include $_SERVER['DOCUMENT_ROOT'] . '/parts/cat_nav.php';
	    ?>
	  </div>
	  <div class="col-9">
	  	<div class="container">