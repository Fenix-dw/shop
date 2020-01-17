<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "products";

if (isset($_POST["submit"]) && $_POST["name"] != "" ) {

	$sql = "UPDATE products SET title = '". $_POST["name"] ."', description = '". $_POST["description"] ."', 
			content = '". $_POST["content"]."', category_id = '". $_POST["category_id"]."' 
			WHERE id=" . $_GET["id"];

	if($conn->query($sql)) {
		header ("Location: /admin/products.php");
	} else {
		echo "Eror!!!" . mysqli_error($conn);
	}
}

$sql = "SELECT * FROM products WHERE id=" . $_GET["id"];
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
        Edit <?php echo $row['title']; ?>
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
    				    <label for="exampleInputEmail1">Name</label>
    				    <input type="text" class="form-control" name="name" value="<?php echo $row["title"]; ?>">
    				  </div>
    				  
    			      <div class="form-group">
    				    <label for="exampleFormControlTextarea1">Description</label>
    				    <textarea type="text" class="form-control" name="description"  rows="3" ><?php echo $row["description"]; ?></textarea>
    				  </div>

    				  <div class="form-group">
    				    <label for="exampleFormControlTextarea1">Content</label>
    				    <textarea type="text" class="form-control" name="content"  rows="3" ><?php echo $row["content"]; ?></textarea>
    				  </div>
    				  
    				   <div class="form-group">
                        <label>Category</label>
                        <select type="text" class="form-control" name="category_id">
                            <option value='<?php echo $row["category_id"] ?>'>
                                <?php 
                                    $catSql = "SELECT * FROM categories WHERE id=". $row["category_id"];
                                    $resultat = $conn->query($catSql);
                                    $name = mysqli_fetch_assoc($resultat);

                                    echo $name["title"]; 
                                ?></option>
                            <?php 
                                $sql = "SELECT * FROM categories WHERE id!=" . $row["category_id"];
                                $result = $conn->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='". $row["id"] ."'>". $row["title"] ."</option>";
                                }
                             ?>
                        </select>
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