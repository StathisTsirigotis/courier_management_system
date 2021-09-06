<?php 
	include('connect.php');
	
?>
<?php
	
		$item_id = $_GET[ 'id' ];
		if( isset( $item_id ) ){
			
			$query = "delete from store_employee where store_id='$item_id' ";
			$result = mysqli_query($con,$query) or die('error');
	        //$item = mysqli_fetch_object($result);
		
		}
	
		if($query){
			
			
			header('Refresh: 0; stores.php');
			exit;
	
		}
		

?>