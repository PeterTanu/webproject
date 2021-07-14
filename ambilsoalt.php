<?php
include "inc/header.php";
?>

</script>

<head>
  <title>Eng-Learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/popper.js/1.14.7/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<?php
if(isset($_GET['info'])){
			$display = "block";
			$pemberitahuan = $_GET['info'];
			}
		else{
			$display = "none";	
			$pemberitahuan = "";
			}
	// Membuat variabel
	$nama="";
	$username_valid = true;
	$username_valid_msg = "";
	
	// Cek form sudah di klik submit/belum
	if(isset($_GET['submit'])){
		$nama = trim($_GET['nama']);
		
		// Kode cek username hanya boleh huruf a-z dan A-Z
		if(!preg_match("/^[a-zA-Z]*$/",$nama)){
			$username_valid = false;
			$username_valid_msg = "Hanya huruf yang diijinkan, dan tidak boleh menggunakan spasi.<br>";
		}
		
	}
	
?>	


<style>
.info{
	background:#912828;
	color:#FFFFFF;
	text-align:center;
	padding:5px;
	}	
</style>

<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
	  <!-- Brand -->

	  <!-- Toggler/collapsibe Button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Navbar links -->
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="nav nav-pills">
		  <li class="nav-item">
			<a class="nav-link" data-toogle="pill" href="index.php">Home</a>
		  </li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">Tests</a>
			<div class="dropdown-menu">
			<a class="dropdown-item" data-toogle="tab" href="ambilsoal.php">Quiz Test</a>
			<a class="dropdown-item" data-toogle="tab" href="ambilsoalt.php">TOEIC Test</a>
			</div>
		</li>
		<li class="nav-item">
				<a class="nav-link" data-toogle="pill" href="content/materi.php">Materi</a>
			</li>
		</ul>
	  </div>
	</nav>
	
<body>
<div class="container bg-light" style="margin-top:30px; margin-bottom:30px">
<div class="info" style="display:<?php echo $display ?>"><?php echo $pemberitahuan; ?></div>

	<form id="frmAmbil" action="soaltoeic.php" method="POST">
	<center>
	Nama 	:<input type="text" name="nama" placeholder="Masukkan Nama Anda" required>
	<hr>Instruksi : 
	<ul>
		<li>Soal Terdiri dari 30 soal acak</li>
		<li>Soal bisa berupa gambar / audio atau gabungan dari keduanya</li>
		<li>Satu soal ada 4 atau 3 pilihan jawaban, dan terdapat hanya satu jawaban yang paling benar</li>
		<li>Waktu yang diberikan untuk mengerjakan soal adalah 20 menit</li>
		<li>Jika waktu yang diberikan sudah habis maka akan di submit secara otomatis meskipun memiliki jawaban yang kosong</li>
		<li>Jawaban kosong akan dianggap sebagai jawaban yang salah</li>
		<li>Penilaian skor dihitung dengan rumus = 100 * Jumlah soal dibagi jumlah jawaban benar</li>
	</ul>
				<input type="submit" name="submit" value="Mulai">
				<hr>
</center>
				</div>
</body>