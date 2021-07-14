<!DOCTYPE html>
<html lang="en">
<?php
include "../inc/header.php";  
include "../inc/navbar.html";
?>
<head>
  <title>Learn-Eng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/sidebar.css">
  <link rel="stylesheet" href="../css/DynamicPage/style.css">
  <script src="../js/jquery/3.3.1/jquery.min.js"></script>
  <script src="../js/popper.js/1.14.7/popper.min.js"></script>
  <script src='../js/DynamicPage/jquery.ba-hashchange.min.js'></script>
  <script src='../js/DynamicPage/dynamicpage.js'></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>

<div id="wrapper">
<div id="page-wrap">
	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="group">
			<li><a href="materi2.php">Account</a></li>
			<li><a href="materi.php">Settings</a></li>
			<li><a href="#">Logout</a></li>	
	</div>
	<!-- Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<section id="main-content">
						<div id="guts">
						<h1>Part Of Speech</h1>
						<p>I love apple pie. I love apple pie.I love apple pie.I love apple pie.I love apple pie.I love apple pie.I love apple pie.
						I love apple pie.I love apple pie.I love apple pie.I love apple pie.I love apple pie.I love apple pie.
						I love apple pie.I love apple pie.I love apple pie.I love apple pie.I love apple pie.I love apple pie.
						I love apple pie.I love apple pie.I love apple pie.I love apple pie.I love apple pie.I love apple pie.</p>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	<!-- Menu Toogle Script -->
	<script>
		$("#menu-toggle").click( function (e){
			e.preventDefault();
			$("#wrapper").toggleClass("menuDisplayed");
		});
	</script>

</body>
</html>