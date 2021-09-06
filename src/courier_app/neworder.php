<?php 
session_start();
   if ( !isset($_SESSION['username']) ) {
         header("Location: login.php");
   }
?>
<?php
include('connect.php'); 


  
  //include 'dijkstra.php';
  include 'newDijkstra.php';
  include 'newDijkstra2.php';
  //define('ROOT_PATH', dirname(__DIR__) . '/');
  //include dirname(__FILE__). '/../phpqrcode/qrlib.php';
  require_once('phpqrcode/qrlib.php'); 
  
  
  
?>

<?php
$cost = array(

  'ath' => array('thes' => 5, 'lar' => 2, 'pat' => 2, 'alex' => 10, 'myt' => 8,'kal' => 3, 'hrak' =>10),

  'thes' => array('alex' => 3, 'ath' => 5, 'lar' => 1, 'iwan' => 1),

  'lar' => array('thes' => 1, 'ath' => 2),

  'iwan' => array('thes' => 1, 'pat' => 3),

  'pat' => array('ath' => 2, 'iwan' => 3, 'kal' => 2),

  'alex' => array('thes' => 3, 'ath' => 10, 'hrak' => 15),
  
  'kal' => array('pat' => 2, 'ath' => 3, 'hrak' => 4),
  
  'hrak' => array('kal' => 4, 'ath' => 10, 'alex' => 15),
  
  'myt' => array('ath' => 8)
  
);
$time = array(

  'ath' => array('thes' => 1, 'lar' => 1, 'pat' => 1, 'alex' => 1, 'myt' => 1,'kal' => 1, 'hrak' =>1),

  'thes' => array('alex' => 1, 'ath' => 1, 'lar' => 1, 'iwan' => 1),

  'lar' => array('thes' => 1, 'ath' => 1),

  'iwan' => array('thes' => 1, 'pat' => 1),

  'pat' => array('ath' => 1, 'iwan' => 1, 'kal' => 1),

  'alex' => array('thes' => 1, 'ath' => 1, 'hrak' => 1),
  
  'kal' => array('pat' => 1, 'ath' => 1, 'hrak' => 2),
  
  'hrak' => array('kal' => 2, 'ath' => 1, 'alex' => 1),
  
  'myt' => array('ath' => 1)
  
);
$c = new Dijkstra($cost, $time);
$c2 = new Dijkstra2($cost, $time);
$t = new Dijkstra($time, $cost);
$t2 = new Dijkstra2($time, $cost);

?>




<head>

 

    <link href="css/new_order.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




</head>
<div class="container">

<div class="order-header">
<h1 class="h"> Ceid Courier Local Store Network</h1>
		
<p class="n">Νέα Αποστολή</p>
<div class="logout-order"><a href="logout.php">Αποσύνδεση</a></div>
</div>
<div class="forma">



<form action="" method= "POST" >

<div class="observe"><span>Εισάγετε tracking-number:</span><input type="text" name="tracking-number" ><input type="submit" value="Submit" name="add5454"></div>

 <label>  Από: </label>
  <select  name="taskFrom">
	<option value="ath-1">Athens</option>
	<option value="pat-4">Patra</option>
	<option value="hrak-6">Irakleion</option>
	<option value="thes-2">Thessaloniki</option>
	<option value="lar-3">Larissa</option>
	<option value="kal-9">Kalamata</option>
	<option value="iwan-5">Ioannina</option>
	<option value="alex-7">Alexandroupoli</option>
	<option value="myt-8">Mytilini</option>
  </select



  <label>  Προς: </label>
    <select  name="taskTo">
	<option value="ath">Athens</option>
	<option value="pat">Patra</option>
	<option value="hrak">Irakleion</option>
	<option value="thes">Thessaloniki</option>
	<option value="lar">Larissa</option>
	<option value="kal">Kalamata</option>
	<option value="iwan">Ioannina</option>
	<option value="alex">Alexandroupoli</option>
	<option value="myt">Mytilini</option>
  </select>
  

   <input type="radio" name="apostoli" checked="checked" value="ka"> Κανονική Αποστολή

   <input type="radio" name="apostoli" value="exp"> Express Αποστολή

   <input type="submit" value="Submit" name="add2323">


</form> 

</div>
<div class="main-title">ΣΤΟΙΧΕΙΑ ΑΠΟΣΤΟΛΗΣ</div>
  <?php if( isset($_POST['add2323']) ) : ?>

	    <div class="info">
			<div class="date"><div class="title">ΗΜΕΡΟΜΗΝΙΑ</div><div class="content"><?php  echo date("Y/m/d");?></div></div>
			<div class="time"><div class="title">ΩΡΑ</div><div class="content"><?php  echo date("h:i:sa"); ?></div></div>
		<?php if(   isset($_POST["taskFrom"]) &&    isset($_POST["taskFrom"]) ): ?>
			<?php $a = $_POST["taskFrom"]; ?>
			<?php $b = $_POST["taskTo"]; ?>
			<?php
				$date = date_create();
				$unix =  date_timestamp_get($date);
			?>
			<?php $tracknmbr =  substr( $a, 0, 2 ).$unix.substr( $b, 0, 2 ) ;
				$_SESSION['STATHIS']=$tracknmbr;
			?>
		<?php endif; ?>
		<div class="tracking-number">
			<div class="title">Tracking Number</div>		
			<div class="content"><?php echo $tracknmbr; ?></div>
		</div>
		<?php $ar = explode( '-'  , $a); ?>
		<?php if( $_POST[ 'apostoli' ] == "ka" ): ?>
		<div class="cost">
			<div class="title">ΚΟΣΤΟΣ</div>
			<div class="content"><?php $c->shortestPath($ar[0], $b);  ?></div>
			<div class="title">ΧΡΟΝΟΣ</div>		
			<div class="content"><?php $c2->shortestPath($ar[0], $b); ?></div>
		</div>
		<?php QRcode::png($_SESSION['STATHIS'], 'qr/'.$_SESSION['STATHIS'].'.png'); // creates file ?>
		<?php chmod('qr/'.$_SESSION['STATHIS'].'.png', 0777); ?>
		<?php echo "<img src='qr/".$_SESSION['STATHIS'].".png' alt='No Photo Found' height='150' width='150'>"; ?>
		<?php else: ?>
		<div class="time">
			<div class="title">ΚΟΣΤΟΣ</div>
			<div class="content"><?php $t2->shortestPath($ar[0], $b);  // 7 ?></div>
			<div class="title">ΧΡΟΝΟΣ</div>		
			<div class="content"><?php $t->shortestPath($ar[0], $b);  // 7 ?></div>
		</div>
		<?php QRcode::png($_SESSION['STATHIS'], 'qr/'.$_SESSION['STATHIS'].'.png'); // creates file ?>
		<?php chmod('qr/'.$_SESSION['STATHIS'].'.png', 0777); ?>
		<?php echo "<img src='qr/".$_SESSION['STATHIS'].".png' alt='No Photo Found' height='150' width='150'>"; ?>	
		<?php endif; ?>
		
		<?php $sql = "INSERT INTO apostoli (track_number,apo,pros,current_location) VALUES ('$tracknmbr' ,'$ar[0]','$b','$ar[1]')" ;
				  $q = mysqli_query(  $sql);
		?>
		</div>
 <?php endif; ?>
 <?php if(isset($_POST["add5454"])): ?>
<?php $tr=$_POST['tracking-number']; ?>
	<?php if(!empty($tr)): ?>
	<?php
	
		$sql = "select p.* from poleis as p,apostoli as a where a.current_location=p.id and a.track_number='$tr'";
		$w = mysqli_query($con,$sql) or die('error');
		?>
<?php
			$rows = array();

			while( $row = mysqli_fetch_array($w) ){
				
				$rows[] = $row;
				
			}
?>
 <?php foreach( $rows as $item): ?>

   <div class="cur_loc"> Η αποστολή βρίσκεται στην :<?php echo $item['topothesia']; ?></div>

<?php endforeach; ?>
	<?php endif;?>
	<?php endif;?>
