<?
require_once('site_db.php');
require_once('site_core.php');
require_once('site_nav.php');

 

echo_head('Control Panel');


echo '<div class="container"><a class="btn btn-success" href="insert_page.php">Insert Page</a> <br><br>
<a class="btn btn-success" href="insert_aside.php">Insert Aside</a> <br><br>
<a class="btn btn-danger" href="basic_delete.php">Delete a Page</a><br><br>
<a class="btn btn-warning" href="basic_update.php">Update a Page</a>





<br><br>
<a href="/rj28morv/project2/" class="btn btn-secondary">Home</a>
		</form>

</div>';


echo_foot();
?>