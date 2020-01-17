<?php 

// Пагинация

	// Текущая страница
	if (isset($_GET['page'])){
		// номер страници
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	
	$kol = 6;  //количество записей для вывода
	$art = ($page * $kol) - $kol;
	
	// Определяем все количество записей в таблице
	$res = $conn->query("SELECT COUNT(*) FROM products");
	// mysqli_fetch_assoc - преобразовать полученых данных продукта в массив
	$row = mysqli_fetch_row($res);
	
	$total = $row[0]; // всего записей	
	
	// Количество страниц для пагинации
	$str_pag = round($total / $kol);
	
	$page2left=NULL;
	$page1left=NULL;
	$page2right=NULL;
	$page1right=NULL;

// Проверяем нужны ли стрелки назад
if ($page != 1){ $pervpage = '<a class="page-link" href= ./?page='. ($page - 1) .'>Previous</a> ';}
// Проверяем нужны ли стрелки вперед
if ($page != $total) {$nextpage = ' <a class="page-link" href= ./?page='. ($page + 1) .'>Next</a>';}

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 2 > 0) {$page2left = ' <a class="page-link" href= ./?page='. ($page - 2) .'>'. ($page - 2) .'</a>  ';}
if($page - 1 > 0) {$page1left = '<a  class="page-link" href= ./?page='. ($page - 1) .'>'. ($page - 1) .'</a>  ';}
if($page + 2 <= $str_pag) {$page2right = ' <a class="page-link" href= ./?page='. ($page + 2) .'>'. ($page + 2) .'</a>';}
if($page + 1 <= $str_pag) {$page1right = ' <a class="page-link" href= ./?page='. ($page + 1) .'>'. ($page + 1) .'</a>';}

 ?>