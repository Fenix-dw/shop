<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "users";

include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php";
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin/">Home</a>
    </li>

    <li class="breadcrumb-item active" aria-current="page">
        Users
    </li>
  </ol>
</nav> 
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Users</h4>
                
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Verifided</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                    	<?php 
                    		$sql = "SELECT * FROM users";
                    		$result = $conn->query($sql);
                    		while ($row = mysqli_fetch_assoc($result)) {
                    			?>
                        			<tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["login"]; ?></td>
                                        <td><?php echo $row["password"]; ?></td>
                                        <td><?php echo $row["phone"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["verifided"]; ?></td>
                                        
                                        <td>
                                        	<div class="btn-group " role="group" aria-label="Basic example">
    										  <a href="options/users/edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-secondary ">Edit</a>
    										  <a href="options/users/delete.php?id=<?php echo $row["id"]; ?>"  class="btn btn-secondary">Delete</a>
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