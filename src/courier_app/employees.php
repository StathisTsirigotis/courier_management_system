<?php include('connect.php'); ?>
<title>CeiD CourierR Stores-employees</title>
<link rel="stylesheet" type="text/css" href="css/style2.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<div class="wrapper" >
<?php include 'menu.php'; ?>
<?php
	
		$s_id = $_GET[ 's_id' ];
		if( isset( $s_id ) ){
			
			$query = "select * from store_employee where store_id='$s_id' ";
			$result = mysqli_query($con,$query) or die('error');
			$rows = array();
			while( $row = mysqli_fetch_array($result) ){
				
				$rows[] = $row;
				
			}
		}
?>

<div class="container">
<table>
	<tr>
		<th>username</th>
		<th>password</th>
		<th>store_id</th>
		<th></th>
	</tr>
	<?php foreach( $rows as $item): ?>
	<tr>
		<td><?php echo $item['username'] ?></td>
		<td><?php echo $item['password'] ?></td>
		<td><?php echo $item['store_id'] ?></td>
		<td><div class="del">delete</div><div class="edit"><a href="edit2.php?id=<?php echo $item['store_id']; ?>">edit</div></td>
	</tr>
	<?php endforeach; ?>
	
</table>
<div class="add"><a href="add2.php"><span>Add</span></a></div>

</div>