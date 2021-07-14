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
		<span><h3 class="text-danger">Edit Soal TOEIC<h1></span>
	</div>
</nav>
  <?php require_once "process2.php"; 
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
<body onload="myKunci()">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">

	<form action="process2.php" method="POST">
		<div class="form-group">
		<input type="hidden" name="id_soal" class="form-control" required value="<?php echo $idsoal; ?>">
		</div>
		<div class="form-group">
		<label>Soal</label>
		<input type="text" name="soal" class="form-control" required value="<?php echo $soal; ?>">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image" class="form-control" value="<?php echo $img; ?>">
		</div>
		<div class="form-group">
		<label>Audio</label>
		<input type="text" name="audio" class="form-control" value="<?php echo $audio; ?>">
		</div>
		<div class="form-group">
		<label>Opsi A</label>
		<input type="text" name="opsia" class="form-control" required value="<?php echo $pil_a; ?>">
		</div>
		<div class="form-group">
		<label>Opsi B</label>
		<input type="text" name="opsib" class="form-control" required value="<?php echo $pil_b; ?>">
		</div>
		<div class="form-group">
		<label>Opsi C</label>
		<input type="text" name="opsic" class="form-control" required value="<?php echo $pil_c; ?>">
		</div>
		<div class="form-group">
		<label>Opsi D</label>
		<input type="text" name="opsid" class="form-control" value="<?php echo $pil_d; ?>">
		</div>
		<div class="form-group">
		<label>Jawaban</label>
		<select id="kodeIndexKunci" class="custom-select" name="knc_jawaban">
			<option value="a">a</option>
			<option value="b">b</option>
			<option value="c">c</option>
			<option value="d">d</option>
		</select>
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
<center><h1 class="text-primary">Soal TOEIC</h1></center>
	<?php
	$mysqli = new mysqli('localhost','root','','db_soal') or die(mysqli_error($mysqli));
	$result = mysqli_query($mysqli,"SELECT * FROM soaltoeic");
	
	//pre_r($result);
	//pre_r($result->fetch_assoc());
	?>
	

			<table id="myTable" class="table table-striped table-responsive">
				<thead>
					<tr>
						<th>ID Soal</th>
						<th>Soal</th>
						<th>Image</th>
						<th>Audio</th>
						<th>Opsi A</th>
						<th>Opsi B</th>
						<th>Opsi C</th>
						<th>Opsi D</th>
						<th>Jawaban</th>
						<th width="10%">Action</th>
					</tr>
				</thead><tbody>
		<?php
		while ($row = $result->fetch_assoc()) {?>
			<tr>
				<td><?php echo $row['id_soal']; ?></td>
				<td><?php echo $row['soal']; ?></td>
				<td><?php echo $row['imagedir']; ?></td>
				<td><?php echo $row['audiodir']; ?></td>
				<td><?php echo $row['a']; ?></td>
				<td><?php echo $row['b']; ?></td>
				<td><?php echo $row['c']; ?></td>
				<td><?php echo $row['d']; ?></td>
				<td><?php echo $row['knc_jawaban']; ?></td>
				<td>
					<a href="editsoaltoeic.php?edit=<?php echo $row['id_soal'];?>"
						class="btn btn-info">Edit</a>
					<a href="process2.php?delete=<?php echo $row['id_soal'];?>"
						class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin dihapus?')">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
			</table>

	
		<?php
		/*
		function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
		}*/
		?>
</div>
</div>

</div>

<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>
<script>
function myKunci(){
		var kunci = "<?php echo $jwb; ?>";
		var x = document.getElementById("kodeIndexKunci").options.length;
		var k = -1;
		while (k < x){
			k++;
			if (document.getElementById("kodeIndexKunci").options[k].value == kunci){
				document.getElementById("kodeIndexKunci").selectedIndex =  k;
				break;
			}
		}
	}
</script>
</body>
</html>
