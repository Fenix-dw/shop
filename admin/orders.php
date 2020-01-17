<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "orders";

include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php";


?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin/">Home</a>
    </li>

    <li class="breadcrumb-item active" aria-current="page">
        Orders
    </li>
  </ol>
</nav> 

<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">
                    Orders
                </h4>
                
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>User_id</th>
                        <th>Products</th>
                        <th>Count</th>
                        <th>Status</th>

                        <th>Created_ad</th>
                        <th>Adress</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                    	<?php 
                    		$sql = "SELECT * FROM orders";
                    		$result = $conn->query($sql);
                    		while ($row = mysqli_fetch_assoc($result)) {
                                $products = json_decode($row["products"],true);
                    			?>
                        			<tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["user_id"]; ?></td>
                                        <td>
                                            <?php 
                                                for($i = 0; $i < count($products['basket']); $i++ ) {

                                                    $sqlProduct = "SELECT * FROM products WHERE id=" . $products['basket'][$i]['product_id'];

                                                    $product = mysqli_fetch_assoc($conn->query($sqlProduct));
                                                    echo $product['title'];
                                                    echo "(" . $products['basket'][$i]['product_id'] . ")";
                                                    echo "<br/>";
                                                } 
                                            ?>     
                                        </td>
                                        <td>
                                            <?php 
                                                for($i = 0; $i < count($products['basket']); $i++ ) {
                                                    echo $products['basket'][$i]['count'];
                                                    echo "<br/>";
                                                } 
                                            ?>      
                                        </td>
                                        
                                        <td><?php echo $row["status"]; ?></td>
                                        <td><?php echo $row["created_ad"]; ?></td>
                                        <td><?php echo $row["adress"]; ?></td>
                                        <td>
                                        	<div class="btn-group " role="group" aria-label="Basic example">
    										  <a href="options/orders/run.php?status=Отправлен клиенту&id= <?php echo $row["id"]; ?>" class="btn btn-secondary ">Run</a>
    										  <a href="options/orders/delete.php?id=<?php echo $row["id"]; ?>"  class="btn btn-secondary">Delete</a>
    										</div>
                                        </td>
                                    </tr>
                                   <?php 
                    		}

                    	?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>                    
</div>


<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php";
 ?>