<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "products";

if (isset($_POST["submit"]) && $_POST["name"] != "" ) {

	$sql = "UPDATE users SET login = '". $_POST["name"] ."', password = '". $_POST["password"] ."', 
			phone = '". $_POST["phone"]."', email = '". $_POST["email"]."' , verifided = '". $_POST["verifided"]."' 
			WHERE id=" . $_GET["id"];

	if($conn->query($sql)) {
		header ("Location: /admin/users.php");
	} else {
		echo "Eror!!!" . mysqli_error($conn);
	}
}

$sql = "SELECT * FROM users WHERE id=" . $_GET["id"];
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin/">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/users.php">
            Users
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Edit <?php echo $row['login']; ?>
    </li>
  </ol>
</nav> 

<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body table-full-width table-responsive m-2">

            		<form method="POST">

    				  <div class="form-group">
    				    <label for="exampleInputEmail1">Login</label>
    				    <input type="text" class="form-control" name="name" value="<?php echo $row["login"]; ?>">
    				  </div>
    				  
    			      <div class="form-group">
    				    <label for="exampleFormControlTextarea1">Password</label>
    				    <input type="password" class="form-control" name="password" value="<?php echo $row["password"]; ?>">
    				  </div>

    				  <div class="form-group">
    				    <label for="exampleFormControlTextarea1">Phone</label>
    				    <input type="text" class="form-control" name="phone" value="<?php echo $row["phone"]; ?>">
    				  </div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row["email"]; ?>">
                      </div>

    				  <div class="form-group">
                        <label for="exampleFormControlTextarea1">Verifided</label>
                        <input type="text" class="form-control" name="verifided" value="<?php echo $row["verifided"]; ?>">
                      </div>
                      
    				  
                     
                      <button name="submit" value="1" type="submit" class="btn btn-success btn-fill pull-right">Save</button>
                      <div class="clearfix"></div>

    				</form>
            </div>
        </div>
    </div>
</div>                    
</div>

<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"; 
?>