
<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

 ?>




	<table class="table table-dark">
	  <thead>
	   
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Count</th>
	      <th scope="col">Costs</th>
	      <th scope="col">Options</th>
	    </tr>
	  </thead>
	  
	  <tbody>
	  	<?php  
	  		if(isset($_COOKIE['basket']) && $_COOKIE['basket'] != ""){
	  			$basket = json_decode($_COOKIE['basket'], true);
	  			for($i = 0; $i < count($basket['basket']); $i++ ) {
					$sql ="SELECT * FROM products WHERE id=" . $basket['basket'][$i]['product_id'];
					$result = $conn->query($sql);
					$product = mysqli_fetch_assoc($result);

				?>
					<tr>
				      <th scope="row"><?php echo $product['id'] ?></th>
				      <td><?php echo $product['title'] ?></td>
				      <td>
				        <button  onclick="minusCount(this)"  data-key="<?php echo $i ?>" class="btn btn-dark" 
				        	<?php if($basket['basket'][$i]['count'] <= 1) { echo "disabled";}?> > - </button> 
				       		<input type="text" name="count" oninput="change(this, <?php echo $product['id']; ?>, <?php echo  $product['cost'] ?> )" value="<?php echo $basket['basket'][$i]['count'] ?> ">
				        <button   onclick="plusCount(this)"  data-key="<?php echo $i ?>" class="btn btn-dark" > + </button>
				       	
				       </td>
				       <td><?php echo $cost[] = ($basket['basket'][$i]['count'] *  $product['cost']); ?></td>
				      
				      <td>
						  <button onclick="deleteProductToBasket(this, <?php echo $product['id'] ?>)" class="btn btn-danger">Delete</button> 
					  </td>
				    
				    </tr>	    
				<?php 
	  			}
	  			?>
					<tr>
				      <th></th>
				      <td>Всего:</td>
				      <td></td>
				      <td id="sum"><?php echo array_sum($cost); ?></td>
				      
				      <td></td>
				    
				    </tr>					
	
	  </tbody>
	</table>
	
				<a type="button" class="btn btn-primary d-block mx-auto" href="/order.php">
				  Оформить заказ
				</a>

	  			<?php 
	  								
								
	  		} else {
	  			?>

	  			</tbody>
	  		</table>
	  	
	  			<div class='row offset-3'>
	  				<h2>Выберите товар!!!</h2>
	  			</div>

	  			<?php 	
	  		}
	  	?>
	  