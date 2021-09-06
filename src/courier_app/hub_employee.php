<?php include('connect.php'); ?>
<?php 
session_start();
   if ( !isset($_SESSION['username']) ) {
         header("Location: login.php");
   }
?>
 <head>
  <link href="css/scan.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jsqrcode-master/grid.js"></script>
<script type="text/javascript" src="jsqrcode-master/version.js"></script>
<script type="text/javascript" src="jsqrcode-master/detector.js"></script>
<script type="text/javascript" src="jsqrcode-master/formatinf.js"></script>
<script type="text/javascript" src="jsqrcode-master/errorlevel.js"></script>
<script type="text/javascript" src="jsqrcode-master/bitmat.js"></script>
<script type="text/javascript" src="jsqrcode-master/datablock.js"></script>
<script type="text/javascript" src="jsqrcode-master/bmparser.js"></script>
<script type="text/javascript" src="jsqrcode-master/datamask.js"></script>
<script type="text/javascript" src="jsqrcode-master/rsdecoder.js"></script>
<script type="text/javascript" src="jsqrcode-master/gf256poly.js"></script>
<script type="text/javascript" src="jsqrcode-master/gf256.js"></script>
<script type="text/javascript" src="jsqrcode-master/decoder.js"></script>
<script type="text/javascript" src="jsqrcode-master/qrcode.js"></script>
<script type="text/javascript" src="jsqrcode-master/findpat.js"></script>
<script type="text/javascript" src="jsqrcode-master/alignpat.js"></script>
<script type="text/javascript" src="jsqrcode-master/databr.js"></script>
<script type="text/javascript" src="jsqrcode-master/webqr.js"></script>
<script type="text/javascript" src="FileSaver.js-master/FileSaver.min.js"></script>
<script src="jsqrcode-master/toBlob/js/canvas-to-blob.min.js"></script>
</head>
<script type="text/javascript">
var imageLoader = document.getElementById('imageLoader');

    imageLoader.addEventListener('change', handleImage, false);
function read(a){
	alert(a);
	document.getElementsByClassName("result")[0].value=a;
}	
	
function load(img){
	document.getElementById('bbb').onclick = function(){
		qrcode.callback = read;
		qrcode.decode('demo.png');
		
	}
}

function captureToCanvas() {
		flash = document.getElementById("embedflash");
		flash.ccCapture();
		qrcode.decode();
 }
// Converts canvas to an image

function convertCanvasToImage(canvas) {
	var temp= canvas.toDataURL();
	
	document.getElementsByClassName('canvasImg')[0].src =  temp;
	
	//return image.src;
	return 'demo.png';
}
</script>
 <body onload="init();">
 <div class="header">Σάρωση Qr Code</div>
 <div class="header">Welcome <?php echo $_SESSION['username']; ?></div>
 <div class="logout-order"><a href="logout.php">Αποσύνδεση</a></div>
     <video id="myvideo" width=400 height=400 id="video" controls autoplay></video>	
 <input type='button' id='saveimg' value="Save instance">
 <input type="button" id="bbb" value="Download instance"/>
 <form method="post" action="" >		
	   <input class="result" type="text" name="number"><label class="note">Δεν έχει οριστεί tracking number</label>
	   <input type="submit" name="city" value="Change current location"/>
</form>
	   
	  <img class="canvasImg" src='' alt="">
	  
	   <p class="instances">Στιγμιότυπο</p>
      <canvas  id="myCanvas" width="400" height="350"></canvas> 
  </body>
  <?php if(isset($_POST["city"])): ?>
<?php $number=$_POST['number']; ?>
	<?php if(!empty($number)): ?>
	<?php
		$username=$_SESSION['username'];
		$sql = "update apostoli as a set current_location = (select id_topothesias from hub_employee as h where h.username =  '$username') where a.track_number = '$number' ";
		mysqli_query($sql) or die('error');
		?>
		<?php endif; ?>
		<?php endif; ?>
  <script>
  var cnv = document.getElementById('myCanvas');
  document.getElementById('saveimg').addEventListener( 'click' , function() {
	  var temp= canvas.toDataURL();
     window.location.href=temp;
  });

      //--------------------
      // GET USER MEDIA CODE
      //--------------------
	navigator.getUserMedia = ( navigator.getUserMedia ||
	 navigator.webkitGetUserMedia ||
	 navigator.mozGetUserMedia ||
	 navigator.msGetUserMedia);

      var video;
      var webcamStream;

      function startWebcam() {
        if (navigator.getUserMedia) {
           navigator.getUserMedia (

              // constraints
              {
                 video: true,
                 audio: false
              },

              // successCallback
              function(localMediaStream) {
                  video = document.querySelector('video');
                 video.src = window.URL.createObjectURL(localMediaStream);
                 webcamStream = localMediaStream;
              },

              // errorCallback
              function(err) {
                 console.log("The following error occured: " + err);
              }
           );
        } else {
           console.log("getUserMedia not supported");
        }  
      }
      var canvas, ctx;

      function init() {
	  startWebcam();
        // Get the canvas and obtain a context for
        // drawing in it
        canvas = document.getElementById("myCanvas");
        ctx = canvas.getContext('2d');
      }

      function snapshot() {
         // Draws current image from the video element into the canvas
        ctx.drawImage(video, 0,0, canvas.width, canvas.height);
      }
	window.setInterval(function(){	
	snapshot(video);
	var el = document.getElementById('myCanvas');
	var img = convertCanvasToImage(el);
	//alert(img.src);
	load(img);
	}, 2000);
  </script>