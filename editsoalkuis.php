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
		<span><h3 class="text-danger">Edit Soal Kuis<h1></span>
	</div>
</nav>
  <?php require_once "process1.php"; 
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
<body onload="myFunction()">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">

	<form action="process1.php" method="POST">
		<div class="form-group">
		<input type="hidden" name="id_soal" class="form-control" value="<?php echo $idsoal; ?>">
		</div>
		<div class="form-group">
		<label>Kode Materi</label>
		<select id="indexKode" class="custom-select" name="kd_materi">
			<?php
				$quer = mysqli_query($koneksi,"SELECT * FROM materi");
				while ($row1 = mysqli_fetch_array($quer)){
					$kdmat = $row1['kd_materi'];
					$jdul = $row1['judul_materi'];
			?>
			<option value="<?php echo $kdmat;?>"><?php echo $kdmat.' - '.$jdul; ?></option>
			<?php
				}
			?>
		</select>
		</div>
		<div class="form-group">
		<label>Soal</label>
		<input type="text" name="soal" class="form-control" required value="<?php echo $soal; ?>">
		</div>
		<div class="form-group">
		<label>Opsi A</label>
		<input type="text" name="opsi_a" class="form-control" required value="<?php echo $opsia; ?>">
		</div>
		<div class="form-group">
		<label>Opsi B</label>
		<input type="text" name="opsi_b" class="form-control" required value="<?php echo $opsib; ?>">
		</div>
		<div class="form-group">
		<label>Opsi C</label>
		<input type="text" name="opsi_c" class="form-control" required value="<?php echo $opsic; ?>">
		</div>
		<div class="form-group">
		<label>Opsi D</label>
		<input type="text" name="opsi_d" class="form-control" value="<?php echo $opsid; ?>">
		</div>
		<div class="form-group">
		<label>Kunci Jawaban</label>
		<select id="kodeIndexKunci" class="custom-select" name="knc_jawaban">
			<option value="a">a</option>
			<option value="b">b</option>
			<option value="c">c</option>
			<option value="d">d</option>
		</select>
		</div>
		<div class="form-group">
		<label>Level</label>
		<select id="indexKodeLevel" class="custom-select" name="level">
			<option value="1 - Beginner" >1 - Beginner</option>
			<option value="2 - Intermediate">2 - Intermediate</option>
			<option value="3 - Advanced">3 - Advanced</option>
		</select>
		</div>
		<div class="form-group">
		<label>Alasan Jawaban Benar</label>
		<input type="text" name="reason" class="form-control" required value="<?php echo $reason; ?>">
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
<center><h1 class="text-primary">Soal Kuis</h1></center>
	<?php
	$mysqli = new mysqli('localhost','root','','db_soal') or die(mysqli_error($mysqli));
	$result = mysqli_query($mysqli,"SELECT * FROM tbl_soal");
	
	//pre_r($result);
	//pre_r($result->fetch_assoc());
	?>
	

			<table id="myTable" class="table table-striped table-responsive">
				<thead>
					<tr>
						<th>ID Soal</th>
						<th>Kode Materi</th>
						<th>Soal</th>
						<th>A</th>
						<th>B</th>
						<th>C</th>
						<th>D</th>
						<th>Jawaban</th>
						<th>Level</th>
						<th>Reason</th>
						<th width="10%">Action</th>
					</tr>
				</thead><tbody>
		<?php
		while ($row = mysqli_fetch_array($result)){?>
		
			<tr>
				<td><?php echo $row['id_soal']; ?></td>
				<td><?php echo $row['kd_materi']; ?></td>
				<td><?php echo $row['soal']; ?></td>
				<td><?php echo $row['a']; ?></td>
				<td><?php echo $row['b']; ?></td>
				<td><?php echo $row['c']; ?></td>
				<td><?php echo $row['d']; ?></td>
				<td><?php echo $row['knc_jawaban']; ?></td>
				<td><?php echo $row['level']; ?></td>
				<td><?php echo $row['reason']; ?></td>
				<td>
					<a href="editsoalkuis.php?edit=<?php echo $row['id_soal'];?>"
						class="btn btn-info">Edit</a>
					<a href="process1.php?delete=<?php echo $row['id_soal'];?>"
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
    $('#myTable').DataTable( {
		 //"ordering": false,
  "order": []
 
    });
} );
</script>
<script>
	function myLevel(){
		var level = "<?php echo $level; ?>";
		var c = document.getElementById("indexKodeLevel").options.length;
		var j = -1;
		while (j < c){
			j++;
			if (document.getElementById("indexKodeLevel").options[j].value == level){
				document.getElementById("indexKodeLevel").selectedIndex = j;
				break;
			}
		}
		
	}
	
	function myKunci(){
		var kunci = "<?php echo $knc_jwb; ?>";
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

	function myKode(){
		var kode = "<?php echo $kode_materi; ?>";
		var z = document.getElementById("indexKode").options.length;
		var i = -1;
		while (i < z){
			i++;
			if (document.getElementById("indexKode").options[i].value == kode){
				document.getElementById("indexKode").selectedIndex = i;
				break;
			}
		}
	}
	
	function myFunction(){
		myKode();
		myKunci();
		myLevel();
	}
</script>


</body>
</html>
