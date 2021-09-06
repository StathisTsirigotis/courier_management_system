<!DOCTYPE html>

<?php
  
  mysqli_connect( "localhost" , "root" , "" );
  mysqli_select_db("ceidcourier");
  
?>


<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!--jquery enabled via google cdn -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<h1 style="color:blue;text-align:center" > Ceid Courier Local Store Network</h1>

<p style="color:red;text-align:center;font-size:140%">Nea Apostoli</p>

</head>


<body style="background-color:#e6f7ff;">

<div class="forma">

<form action="" method= "POST" >
   <style>
  First name:<br>
  <input type="text" name="Apo" >
  <br>
  Last name:<br>
  <input type="text" name="Pros" >
  <br>
   <input type="checkbox" name="kanonikh" checked="checked"> Kanonikh Apostoli
  <br>
   <input type="checkbox" name="express" > Express Apostoli
  <br>
  <input type="submit" value="Submit" name="add">
  <br>
</form> 
</div>


 
 
 
 </body>
 </html>
  