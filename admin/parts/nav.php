<ul class="nav">
    <li class="nav-item <?php  if($page=="home") { echo 'active';}?>">
        <a class="nav-link" href="/admin/index.php">
            <i class="nc-icon nc-chart-pie-35"></i>
            <p>Home</p>
        </a>
    </li>
    <li class="nav-item <?php  if($page=="users") { echo 'active';}?>">
        <a class="nav-link " href="/admin/users.php">
            <i class="nc-icon nc-circle-09"></i>
            <p>Users</p>
        </a>
    </li>
    <li class="nav-item <?php  if($page=="orders") { echo 'active';}?>">
        <a class="nav-link " href="/admin/orders.php">
            <i class="nc-icon nc-attach-87"></i>
            <p>Orders</p>
        </a>
    </li>
    <li class="nav-item <?php  if($page=="products") { echo 'active';}?>">
        <a class="nav-link" href="/admin/products.php">
            <i class="nc-icon nc-app"></i>
            <p>Products</p>
        </a>
    </li>
    <li class="nav-item <?php  if($page=="categories") { echo 'active';}?>">
        <a class="nav-link" href="/admin/cat.php">
            <i class="nc-icon nc-bullet-list-67"></i>
            <p>Categories</p>
        </a>
	</li>
	<li class="nav-item <?php  if($page=="log out") { echo 'active';}?>">
		<a class="nav-link" href="#">
            <i class="nc-icon nc-key-25"></i>
            <p>Log out</p>
        </a>                        
    </li>
</ul>
