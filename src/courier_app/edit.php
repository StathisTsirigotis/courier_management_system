<?php 
	include('connect.php');
	
?>
<?php
	
		$item_id = $_GET[ 'id' ];
		if( isset( $item_id ) ){
			
			$query = "select * from katastimata where id='$item_id' ";
			$result = mysqli_query($con,$query) or die('error');
	        $item = mysqli_fetch_object($result);
		
		}
	
?>
<div class="edit-area">
	<form action="" method="POST">
		<input type="text" name="odos" placeholder="odos" value="<?php echo $item->odos; ?>">
		<input type="text" name="arithmos" placeholder="arithmos" value="<?php echo $item->arithmos; ?>">
		<input type="text" name="polh" placeholder="polh" value="<?php echo $item->polh; ?>">
		<input type="text" name="thlefwno" placeholder="telephone" value="<?php echo $item->thlefwno; ?>">
		<input type="text" name="latitude" placeholder="latitude" value="<?php echo $item->latitude; ?>">
		<input type="text" name="longitude" placeholder="longitude" value="<?php echo $item->longitude; ?>">
		<input type="text" name="hub_id" placeholder="hub_id" value="<?php echo $item->hub_id; ?>">
		<input type="text" name="name" placeholder="onoma katastimatos" value="<?php echo $item->store_name; ?>">
		<input type="submit" value="submit" name="edit">
	</form>
</div>

<?php 

	if( isset( $_POST['edit']) ){
		
		$a = $_POST['odos'];
		$b = $_POST['arithmos'];
		$c = $_POST['polh'];
		$d = $_POST['thlefwno'];
		$e = $_POST['latitude'];
		$f = $_POST['longitude'];
		$g = $_POST['hub_id'];
		$h = $_POST['name'];
		$query = "update katastimata set odos='$a' ,arithmos='$b' ,polh='$c' ,thlefwno='$d' ,latitude='$e' ,longitude='$f' , hub_id='$g'  , store_name='$h'  where id='$item_id'  ";
		$q=mysqli_query($con,$query);
		if($query){
			
			
			header('Refresh: 0; stores.php');
	
		}
		
	}

?>


