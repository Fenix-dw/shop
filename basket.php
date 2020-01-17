<?php 

	include "configs/db.php";
	include "parts/header.php";

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Basket
    </li>
  </ol>
</nav> 


<div class="row col-12" id="products">
<?php 
  include "modules/basket/basket-table.php";
 ?>
</div>

<?php 
	
	include 'parts/footer.php';
?>		