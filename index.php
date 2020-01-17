<?php 

	include "configs/db.php";
	include "parts/header.php";
	include "parts/pagination.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">
        Home
    </li>
  </ol>
</nav> 

<div class="row" id="products">
	<?php 
		$sql ="SELECT* FROM products LIMIT $art,$kol";
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			include "parts/product_card.php";
		}
	?>
</div>

<div class="row">
	<div class="col-4 offset-4">
		<input type="hidden" value="<?php echo $page; ?>" id="current-page">
		<button class="btn btn-primary btn-lg" id="show-more">Показать еще</button>
	
	</div>
</div>


<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item <?php if ($page == 1){ echo 'disabled'; }?>">
      <?php echo  '<a class="page-link" href= ./?page='. ($page - 1) .'>Previous</a>';?>
    </li>
    <li class="page-item ">
    	<?php echo $page2left; ?>
    </li>
    <li class="page-item">
    	<?php echo $page1left; ?>
    </li>
    <li class="page-item active">
    	<a class="page-link" href="#"><?php echo $page; ?></a>
    </li>
    <li class="page-item">
		<?php echo $page1right; ?>
    </li>
    
	<li class="page-item">
		<?php echo $page2right; ?>
    </li>
    
    <li class="page-item <?php if ($page == $str_pag){ echo 'disabled'; }?>">
      <?php echo  '<a class="page-link" href= ./?page='. ($page + 1) .'>Next</a>';?>
    </li>
  </ul>
</nav>

<?php 

  if (isset($_GET['send']) && $_GET['send'] == 1) {
    ?>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
  }



 ?>


<?php 
	include 'parts/footer.php';
?>		