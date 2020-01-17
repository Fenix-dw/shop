<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "products";

if (isset($_POST["submit"]) && $_POST["title"] != "") {

	$sql = "INSERT INTO products (title, description, content, category_id) 
			VALUES ('". $_POST["title"]."', '". $_POST["description"]."', '". $_POST["content"]."', '". $_POST["category_id"]."' ) ";

	if($conn->query($sql)) {
		header ("Location: /admin/products.php");
	} else {
		echo "Error!!!" . mysqli_error($conn);
	}
}

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
        Add Programe
    </li>
  </ol>
</nav> 

<div class="row">
    <div class="col-md-8">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Add Product</h4>
            </div>
            <div class="card-body table-full-width table-responsive m-2">

            		<form method="POST">
                    
    				  <div class="form-group">
    				    <label>Title</label>
    				    <input type="text" class="form-control" name="title" >
    				  </div>
    				  
    			      <div class="form-group">
    				    <label>Description</label>
    				    <textarea type="text" class="form-control" name="description"  rows="3" ></textarea>
    				  </div>

    				  <div class="form-group">
    				    <label>Content</label>
    				    <textarea type="text" class="form-control" name="content"  rows="3" ></textarea>
    				  </div>
    				  
    				  <div class="form-group">
    				    <label>Category</label>
    				    <select type="text" class="form-control" name="category_id">
                            <option value="0">Не выбрано</option>
                            <?php 
                                $sql = "SELECT * FROM categories";
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