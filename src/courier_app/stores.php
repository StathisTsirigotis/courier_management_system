<?php include('connect.php'); ?>
<?php 
   session_start();
   if ( !isset($_SESSION['username']) ) {
         header("Location: login.php");
   }
?>
<title>CeiD CourieR stores</title>
<link rel="stylesheet" type="text/css" href="css/style2.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<div class="wrapper" >
<?php include 'menu.php'; ?>
<div class="container">
<table>
	<tr>
		<th>όνομα καταστήματος</th>
		<th>οδός</th>
		<th>αριθμός</th>
		<th>πόλη</th>
		<th>τηλέφωνο</th>
		<th>latitude</th>
		<th>longitude</th>
		<th>hub_id</th>
		<th></th>
	</tr>
	<?php foreach( $rows as $item): ?>
	<tr>
		<td><?php echo $item['store_name'] ?></td>
		<td><?php echo $item['odos'] ?></td>
		<td><?php echo $item['arithmos'] ?></td>
		<td><?php echo $item['polh'] ?></td>
		<td><?php echo $item['thlefwno'] ?></td>
		<td><?php echo $item['latitude'] ?></td>
		<td><?php echo $item['longitude'] ?></td>
		<td><?php echo $item['hub_id'] ?></td>
		<td><div class="del"><a href="del.php?id=<?php echo $item['id']; ?>">delete</a></div><div class="edit"><a href="edit.php?id=<?php echo $item['id']; ?>">edit</a></div></td>
	</tr>
	<?php endforeach; ?>
	
</table>
<div class="add"><a href="add.php"><span>Add</span></a></div>

</div>
