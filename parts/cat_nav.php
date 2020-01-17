<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link <?php if(!isset($_GET['id'])){ ?>active <?php } ?>" href="/">Все</a>
	<?php 
		$sql = "SELECT * FROM categories";
		$result = $conn->query($sql);

		if (isset($_GET['id'])) {
			$polzovatelResult = $conn->query( "SELECT * FROM products WHERE id=" . $_GET["id"] );
			$polzovatel = mysqli_fetch_assoc($polzovatelResult);		
		}
		while ($row = mysqli_fetch_assoc($result)) {
			

			if(isset($_GET['id']) && $_GET['id'] == $row['id'] 
			   || isset($_GET['id']) && $row['id'] == $polzovatel['category_id'] ){
				echo "<a class='nav-link active' href='/cat.php?id=". $row['id'] ."'>". $row['title'] ."</a>";
			} else {
				echo "<a class='nav-link' href='/cat.php?id=". $row['id'] ."'>". $row['title'] ."</a>";
			}
		}
	?>
</div>
