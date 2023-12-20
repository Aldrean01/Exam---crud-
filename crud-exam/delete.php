
<?php
	include('connection.php');
	if(isset($_POST['id'])){
		$id=$_POST['id'];

		$conn->query("delete from item where id='$id'");
	}
?>