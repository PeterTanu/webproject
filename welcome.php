<!DOCTYPE html>
<html lang="en">

<head>
  <title>Eng-Learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/welcome.css">
	
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/popper.js/1.14.7/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light sticky-top justify-content-between" style="background-color: #e3f2fd;">
<!-- Brand -->
	<a class="navbar-brand" href="#"><img src="inc/logo.png" height="auto" width="250px"></a>
<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
<span class="navbar-toggler-icon"></span>
</button>

<!-- Navbar links -->
	<div class="collapse navbar-collapse flex-grow-0" id="collapsibleNavbar">
		<ul class="nav nav-pills text-right">
			<li class="nav-item">
				<a class="nav-link active" data-toogle="pill" href="index.php">Home</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Tests</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" data-toogle="tab" href="ambilsoal.php">Quiz Test</a>
				<a class="dropdown-item" data-toogle="tab" href="ambilsoalt.php">TOEIC Test</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toogle="pill" href="content/materi.php">Materi</a>
			</li>
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Edit
				</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" data-toogle="tab" href="editmateri.php">Materi</a>
				<a class="dropdown-item" data-toogle="tab" href="editsoalkuis.php">Soal Kuis</a>
				<a class="dropdown-item" data-toogle="tab" href="editsoaltoeic.php">Soal TOEIC</a>
			</div>
			</li>
		</ul>
	</div>
</nav>
	<div id="demo" class="carousel slide" data-ride="carousel" data-interval="25000">

	  <ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	  </ul>
	  <div class="carousel-inner">
	  
		<div class="carousel-item active">
			  <img src="inc/International-Telecommunication-Union-BRANDSPURNG.jpg" alt="Los Angeles" width="1100" height="700">
			<div class="carousel-content">
			
			</div>
			  <div class="carousel-caption">
				<h3>Take a lesson now!</h3>
				<p>Pilih materi yang ingin dipelajari</p>
				<form method="POST">
					<select id="materi" class="custom-select" style="width:200px;">
						<option selected disabled hidden>Pilih Materi</option>
						<option value="mainverb">Main Verb</option>
						<option value="tenses">Tenses</option>
						<option value="auxiliaryverb">Auxilliary Modal Verb</option>
					</select>
					<input type="submit" class="btn btn-success" name="submit" value="Learn Now">
				</form> 
			  </div>
			</div>		  
		<div class="carousel-item">
		  <img src="inc/BLX_ELearning_Header.jpg" alt="Chicago" width="1100" height="700">
		  <div class="carousel-caption">
			<h3>Test you skill now!</h3>
			<p>Pilih jenis tes</p>
			<a href="ambilsoal" class="btn btn-primary">Quiz Test</a>
			<a href="ambilsoalt" class="btn btn-success">TOEIC Test</a>
		  </div>   
		</div>
		<div class="carousel-item">
		  <img src="inc/18-1871_elearning_webheader_2100x900_FNL.png" alt="New York" width="1100" height="700">
		  <div class="carousel-caption">
			<h3>LEADERBOARD</h3>
			<p>Skor Tertinggi</p>
		  </div>   
		</div>
	  </div>
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>
	</div>

</body>

<script>
$('.btn').click(function(){ // on submit button click

    var urldata = $('#materi :selected').val(); // get the selected  option value
    window.open("http://<?php echo $_SERVER["SERVER_NAME"];?>/db_soal/content/"+urldata+".php") // open a new window. here you need to change the url according to your wish.
});

</script>
</html>