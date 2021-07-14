
<?php
include "inc/header.php";
include "inc/navbar.html";
include('login.php');

		if(isset($_GET['info'])){
			$display = "block";
			$pemberitahuan = $_GET['info'];
			}
		else{
			$display = "none";	
			$pemberitahuan = "";
			}
		?>
<html>
<head><title>Eng-Learning</title>
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/popper.js/1.14.7/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<center>
<button class="btn btn-danger">
<div class="info" style="display:<?php echo $display ?>"><?php echo $pemberitahuan; ?></div>
</button>
<body style="background-color: DarkGrey">
<form method='POST'>
<input type='text' name='username' placeholder='Masukkan Username Anda' required><br>
<input type='password' name='password' placeholder='Masukkan Password anda' required ><br>
<input type='submit' name='submit' value='Login'>
</form>
</center>
<br>

</body>
<script src="js/togglelamp.js"></script>
</html>