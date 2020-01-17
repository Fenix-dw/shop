<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "categories";

include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php";
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin/">Home</a>
    </li>

    <li class="breadcrumb-item active" aria-current="page">
        Categories
    </li>
  </ol>
</nav> 

<div class="row">
    <div class="col-md-8">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">
                    Categories
                    <a href="options/categories/add.php" class="btn btn-primary  pull-right col-md-2">Add</a>
                </h4>
                
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                    	<?php 
                    		$sql = "SELECT * FROM categories";
                    		$result = $conn->query($sql);
                    		while ($row = mysqli_fetch_assoc($result)) {
                    			?>
                        			<tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td>
                                        	<div class="btn-group " role="group" aria-label="Basic example">
    										  <a href="options/categories/edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-secondary ">Edit</a>
    										  <a href="options/categories/delete.php?id=<?php echo $row["id"]; ?>"  class="btn btn-secondary">Delete</a>
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