<?php
$con = mysqli_connect( "localhost" , "root" , "" );
mysqli_query($con ,"SET NAMES UTF8");
mysqli_select_db($con , "ceid_courier");
?>

<meta name="viewport" content="width=device-width, initial-scale=1">

<head>

<link rel="stylesheet" type="text/css" href="css/customerinfo.css">
	


 
</head>


<body>
<h1> Welcome to Customer Service </h1>
 <form action=""  method="POST">
 
  Your Tracking Number:<br>
  <input type="text" name="tracknumber" value="">
  <br>
  <input type="submit" value="View my order" name="submit">
</form> 
 <?php if(isset($_POST["submit"])): ?>
<?php $tr=$_POST['tracknumber']; ?>
	<?php if(!empty($tr)): ?>
	<?php
	
		$sql = "select p.* from poleis as p,apostoli as a where a.current_location=p.id and a.track_number='$tr'";
		$w = mysqli_query($sql) or die('error');
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

         <div id="map"></div>
</body>
	<script>
        function initMap() {
				var map = new google.maps.Map(document.getElementById('map'), {

          center: new google.maps.LatLng(-33.863276, 11.207977),

          zoom: 12
  

        });
		}
  </script>
      <script async defer

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-FpZ0MWUBPvbFwiSJYGRyRbps57CTHgQ&callback=initMap"
	type="text/javascript">

    </script>
