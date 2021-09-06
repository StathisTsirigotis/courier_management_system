<?php 
	include('connect.php');
	add();
?>

<div class="add-area">
	<form action="" method="POST">
		<input type="text" name="odos" placeholder="odos">
		<input type="text" name="arithmos" placeholder="arithmos">
		<input type="text" name="polh" placeholder="polh">
		<input type="text" name="thlefwno" placeholder="telephone">
		<input type="text" name="latitude" placeholder="latitude">
		<input type="text" name="longitude" placeholder="longitude">
		<input type="text" name="hub_id" placeholder="hub_id">
		<input type="text" name="onoma" placeholder="onoma">
		<input type="submit" value="submit" name="add">
	</form>
</div>

<?php
function add(){
if( isset( $_POST['add'] )){
	
	$odos=$_POST['odos'];
	$arithmos=$_POST['arithmos'];
	$polh=$_POST['polh'];
	$thl=$_POST['thlefwno'];
	$lat=$_POST['latitude'];
	$long=$_POST['longitude'];
	$id=$_POST['hub_id'];
	$name=$_POST['onoma'];
	
	$sql = "INSERT INTO katastimata (odos,arithmos,polh,thlefwno,latitude,longitude,hub_id,store_name) VALUES ('$odos','$arithmos','$polh','$thl','$lat','$long','$id','$name')" ; 
	$q = mysqli_query($con,$sql);
	  if( $q ){
		  header('Refresh: 0; stores.php');
	  }
	
	
}
}
?>