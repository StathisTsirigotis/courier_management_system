<?php 
	include('connect.php');
	add();
?>

<div class="add-area">
	<form action="" method="POST">
		<input type="text" name="username" placeholder="username">
		<input type="text" name="password" placeholder="password">
		<input type="text" name="hub_id" placeholder="hub_id">
		<input type="submit" value="submit" name="add">
	</form>
</div>

<?php
function add(){
if( isset( $_POST['add'] )){
	
	$usr=$_POST['username'];
	$pass=$_POST['password'];
	$id=$_POST['hub_id'];
	
	$sql = "INSERT INTO hub_employee (username,password,id_topothesias) VALUES ('$usr','$pass','$id')";
	$q = mysqli_query($con,$sql);
	  if( $q ){
		  header('Refresh: 0; transit-hub.php');
	  }
	
	
}
}
?>