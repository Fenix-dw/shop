<?php 
// килькисть 0
$count = 0;

$host  = "/";

// якщо існує $_COOKIE['basket'] то
if(isset($_COOKIE["basket"])) {
	// Декодирует строку JSON
	$basket = json_decode($_COOKIE['basket'], true);
	// подщот килькость елементов в $basket['basket']
	$count = count($basket['basket']);

}
?>