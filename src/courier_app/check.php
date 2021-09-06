<?php
include('connect.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$page = null;


$items = mysqli_query($con, " select * from admin where username='$username' and password='$password' " ) or die(mysqli_error());
$em = mysqli_query($con, " select * from store_employee where username='$username' and password='$password' " ) or die(mysqli_error());
$tem = mysqli_query($con, " select * from hub_employee where username='$username' and password='$password' " ) or die(mysqli_error());

if( mysqli_num_rows( $em ) != 0   ){
	$page = 'neworder';
	$rows = mysqli_fetch_array($em);
	
}
elseif( mysqli_num_rows( $items ) != 0  ){
	$page='stores';
	$rows = mysqli_fetch_array($items);
}
else if( mysqli_num_rows( $tem ) != 0 ){
	$page='hub_employee';
	$rows = mysqli_fetch_array($tem);
}else{
	exit();
}





if( $rows['username'] == $username && $rows['password'] == $password && !empty( $rows['username']  ) && !empty( $rows['password']  )  ){
	
	switch( $page ){
		case 'neworder' :
			$_SESSION['username'] = $username;
			header("Location: neworder.php");
			exit;
			break;
		case 'hub_employee' :
			$_SESSION['username'] = $username;
			header("Location: hub_employee.php");
			exit;
			break;	
		case 'stores' :
			$_SESSION['username'] = $username;
			header("Location: stores.php");
			exit;
			break;
	}

	
}


else{
	echo $rows['username']  . ' - ' . $rows['password']; 
	header("Location: login.php");
	
}

?>
