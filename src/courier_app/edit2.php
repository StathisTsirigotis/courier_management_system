<?php 
	include('connect.php');
	
?>
<?php
	
		$item_id = $_GET[ 'id' ];
		if( isset( $item_id ) ){
			
			$query = "select * from store_employee where store_id='$item_id' ";
			$result = mysqli_query($con,$query) or die('error');
	        $item = mysqli_fetch_object($result);
		
		}
	
?>
<div class="edit-area">
	<form action="" method="POST">
		<input type="text" name="username" placeholder="username" value="<?php echo $item->username; ?>">
		<input type="text" name="password" placeholder="password" value="<?php echo $item->password; ?>">
		<input type="text" name="store_id" placeholder="store_id" value="<?php echo $item->store_id; ?>">
		<input type="submit" value="submit" name="edit">
	</form>
</div>

<?php 

	if( isset( $_POST['edit']) ){
		
		$a = $_POST['username'];
		$b = $_POST['password'];
		$c = $_POST['store_id'];
		$query = "update store_employee set username='$a' ,password='$b' ,store_id='$c'  where store_id='$item_id'  ";
		$q=mysqli_query($con,$query);
		if($query){
		
		header('Refresh: 0; employees.php');
	
		}
		
	}

?>
