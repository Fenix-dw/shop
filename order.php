<?php 
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/setings.php";

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Checkout - пользовательская форма заказа, показывающая компоненты формы и функции проверки.">

    <title>Оформление заказа</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">
  <div class="py-2 text-center">
    <h1>Оформление заказа</h1>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?php echo $count ?></span>
      </h4>
      <ul class="list-group mb-3">
        <?php 
			if(isset($_COOKIE['basket']) && $_COOKIE['basket'] != ""){
	  			$basket = json_decode($_COOKIE['basket'], true);
	  			for($i = 0; $i < count($basket['basket']); $i++ ) {
					$sql ="SELECT * FROM products WHERE id=" . $basket['basket'][$i]['product_id'];
					$result = $conn->query($sql);
					$product = mysqli_fetch_assoc($result);
        ?>
			        <li class="list-group-item d-flex justify-content-between lh-condensed">
			          <div>
			            <h6 class="my-0"><?php echo $product['title'] ?></h6>
			            <small class="text-muted"><?php echo $basket['basket'][$i]['count'] ?>шт.</small>
			          </div>
			          <span class="my-2 text-muted"><?php echo $cost[] = ($basket['basket'][$i]['count'] *  $product['cost']) ?> грн</span>
			        </li>
       
		<?php 
				}
			}
		?>       
        
        <li class="list-group-item d-flex justify-content-between">
          <span>Итого</span>
          <strong><?php echo array_sum($cost); ?> грн</strong>
        </li>
      </ul>

      
    </div>

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Контактные данные</h4>

      <form class="needs-validation" method="POST" action="/modules/basket/order.php">
       
         
        <div class="form-group row mb-3">
		    <label class="col-sm-3 col-form-label">Ваше имя</label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" name="username" placeholder="Username">
	    	</div>
        </div>


		<div class="form-group row mb-3">
		         
		    <label class="col-sm-3 col-form-label">Эл. почта</label>
		    <div class="col-sm-9">
		      <input type="email" class="form-control" name="email" placeholder="you@example.com">
		    </div>
			<div class="invalid-feedback">
	            Please enter a valid email address for shipping updates.
	        </div>		    
				
        </div>

        <div class="form-group row mb-3">
         
		    <label class="col-sm-3 col-form-label">Мобильный телефон</label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" name="phone" placeholder="phone">
		    </div>
		
        </div>

        <div class="form-group row mb-3">
         
			    <label for="address" class="col-sm-3 col-form-label">Адрес</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="adress" placeholder="1234 Main St" required="">
			    </div>
				<div class="invalid-feedback">
		            Please enter your shipping address.
		        </div>			    
		
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Оформить</button>
      </form>

    </div>
  </div>

<?php 
	include 'parts/footer.php';
?>	