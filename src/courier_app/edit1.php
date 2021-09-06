<?php 
	include('connect.php');
	
?>
<?php
	
		$item_id = $_GET[ 'id' ];
		if( isset( $item_id ) ){
			
			$query = "select * from hub_employee where id_topothesias='$item_id' ";
			$result = mysqli_query($con,$query) or die('error');
	        $item = mysqli_fetch_object($result);
		
		}
	
?>
<div class="edit-area">
	<form action="" method="POST">
		<input type="text" name="username" placeholder="username" value="<?php echo $item->username; ?>">
		<input type="text" name="password" placeholder="password" value="<?php echo $item->password; ?>">
		<input type="text" name="hub_id" placeholder="hub_id" value="<?php echo $item->id_topothesias; ?>">
		<input type="submit" value="submit" name="edit">
	</form>
</div>

<?php 

	if( isset( $_POST['edit']) ){
		
		$a = $_POST['username'];
		$b = $_POST['password'];
		$c = $_POST['hub_id'];
		$query = "update hub_employee set username='$a' ,password='$b' ,id_topothesias='$c'  where id_topothesias='$item_id'  ";
		$q=mysqli_query($con,$query);
		if($query){
			
			
			header('Refresh: 0; transit-hub.php');
	
		}
		
	}

?>
