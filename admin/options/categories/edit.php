<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "categories";

if (isset($_POST["submit"]) && $_POST["title"] != "") {

	$sql = "UPDATE categories SET title = '". $_POST["title"] ."'
            WHERE id=" . $_GET["id"];


	if($conn->query($sql)) {
		header ("Location: /admin/cat.php");
	} else {
		echo "Eror!!!" . mysqli_error($conn);
	}
}

$sql = "SELECT * FROM categories WHERE id=" . $_GET["id"];
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
        <a href="/admin/cat.php">
            Categories
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Edit <?php echo $row["title"]; ?>
    </li>
  </ol>
</nav> 

<div class="row">
    <div class="col-md-8">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body table-full-width table-responsive m-2">

        		<form method="POST">

				  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" class="form-control" name="title" value="<?php echo $row["title"]; ?>">
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