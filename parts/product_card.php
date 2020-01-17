<div class="col-4 ">
			<div class="card m-2">
		  <!-- <img src="..." class="card-img-top" alt="..."> -->
		  <div class="card-body">
		    <h5 class="card-title">
		    	<a href="product.php?id=<?php echo $row['id']; ?>">
		    	<?php echo $row["title"] ?>
		    	</a>	
		    </h5>
		    <p class="card-text"><?php echo $row['description']?></p>
		    <button class="btn btn-primary " onclick="addToBasket(this)" data-id="<?php echo $row['id'] ?>">
		    	В корзину
		    </button>
		  </div>
  		</div>
	</div> <!-- /.col-4 -->