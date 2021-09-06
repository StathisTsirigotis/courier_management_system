<?php include('connect.php'); ?>
<?php

	$query = 'select * from katastimata';
	$result = mysqli_query($con,$query) or die('error');
	$rows = array();
	while( $row = mysqli_fetch_array($result) )
		$rows[] = $row;
?>
<div class="menu">
	<ul>
		<li><a href='stores.php'>Καταστήματα</a></li>
		<li><a href='transit-hub.php'>Υπάλληλοι Hub</a></li>
		<li class="f">
		<a href = '#'>Υπάλληλοι Καταστημάτων</a>
			<div class="stores">
				<?php foreach( $rows as $key => $value ): ?>
					<div class="store<?php echo $key; ?>"><a href="employees.php?s_id=<?php echo $value['id']; ?>"><?php echo $value['store_name']; ?></a></div>
				<?php endforeach; ?>
			</div>
		</li>
		<li><a href="logout.php">Αποσύνδεση</a></li>
			
	</ul>
</div>
<script>

	jQuery(document).ready( function($){
		
			 var w = $('.stores').outerWidth( true );
			 $(".f").hover(
					function() {
						$('.stores').css("display", "block");
						$('.stores').css("right", "-"+w+"px");
						
					},
					function() {
						$('.stores').css("display", "none");
						$('.stores').css("right", w+"px");
						
					});
				});
			</script>