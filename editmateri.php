<!DOCTYPE html>
<html>
<?php
require_once ('session.php');
?>
<b id='welcome'>Welcome : <i><?php echo $login_session; ?></i></b>
<b id='logout'><a href='logout.php'>Log Out</a></b><br>
<head>
<title>Eng-Learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="datatables/css/jquery.dataTables.min.css">
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="datatables/js/jquery.dataTables.min.js"></script>
  <script src="js/popper.js/1.14.7/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
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
				<a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
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
	<div>
		<span><h3 class="text-danger">Edit Materi<h1></span>
	</div>
</nav>
  <?php require_once "process.php"; 
  ?>
  
  <?php 
		if (isset($_SESSION['message'])){ 
	?>
		
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
	
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			unset($_SESSION['msg_type']);
			?>
	
	</div>
		<?php }?>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">

	<form action="process.php" method="POST">
		<div class="form-group">
		<label>KODE</label>
		<input type="text" name="kode" class="form-control" required value="<?php echo $kode; ?>">
		</div>
		<div class="form-group">
		<label>Kategori</label>
		<input type="text" name="kategori" class="form-control" required value="<?php echo $kategori; ?>">
		</div>
		<div class="form-group">
		<label>Judul</label>
		<input type="text" name="judul" class="form-control" required value="<?php echo $judul; ?>">
		</div>
		<div class="form-group">
		<label>Tentang</label>
		<input type="text" name="isi" class="form-control" required value="<?php echo $isi; ?>">
		</div>
		<div class="form-group">
		<label>Link</label>
		<input type="text" name="link" class="form-control" required value="<?php echo $link; ?>">
		</div>
		<div class="form-group">
		<?php
			if ($update == true){		
		?>
			<button type="submit" class="btn btn-info" name="update">Update</button>
			<?php }else{ ?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>
			<?php } ?>
		</div>
	</form>		
</div>
		
<div class="col-md-10">
<center><h1 class="text-primary">Materi</h1></center>
	<?php
	$mysqli = new mysqli('localhost','root','','db_soal') or die(mysqli_error($mysqli));
	$result = mysqli_query($mysqli,"SELECT * FROM materi");
	
	//pre_r($result);
	//pre_r($result->fetch_assoc());
	?>
	

			<table id="myTable" class="table table-striped table-responsive">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Kategori</th>
						<th>Judul</th>
						<th>Tentang</th>
						<th>Lokasi</th>
						<th width="10%">Action</th>
					</tr>
				</thead><tbody>
		<?php
		while ($row = $result->fetch_assoc()) {?>

			<tr>
				<td><?php echo $row['kd_materi']; ?></td>
				<td><?php echo $row['kategori']; ?></td>
				<td><?php echo $row['judul_materi']; ?></td>
				<td><?php echo $row['isi']; ?></td>
				<td><?php echo $row['link']; ?></td>
				<td>
					<a href="editmateri.php?edit=<?php echo $row['kd_materi'];?>"
						class="btn btn-info">Edit</a>
					<a href="process.php?delete=<?php echo $row['kd_materi'];?>"
						class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin dihapus?')">Delete</a>
				</td>
			</tr>
		<?php } ?>
			</tbody>
			</table>

	
		<?php
		
		function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
		}
		?>
</div>
</div>

</div>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>
</body>

</html>
