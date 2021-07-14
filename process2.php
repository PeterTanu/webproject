<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	include "koneksi.php";
	
	$idsoal = '';
	$soal = '';
	$img = '';
	$audio = '';
	$pil_a = '';
	$pil_b = '';
	$pil_c = '';
	$pil_d = '';
	$jwb = '';
	$update = false;
	//save button pressed
		if (isset($_POST['save'])){
		
		$idsoal = $_POST['id_soal'];
		$soal = $_POST['soal'];
		$img = $_POST['image'];
		$audio = $_POST['audio'];
		$pil_a = $_POST['opsia'];
		$pil_b = $_POST['opsib'];
		$pil_c = $_POST['opsic'];
		$pil_d = $_POST['opsid'];
		$jwb = $_POST['knc_jawaban'];
		
		//validasi htmlchar
		$soal = htmlspecialchars($soal,ENT_QUOTES);
		
		$img = htmlspecialchars($img);
		
		$audio = htmlspecialchars($audio);

		$pil_a = htmlspecialchars($pil_a,ENT_QUOTES);

		$pil_b = htmlspecialchars($pil_b,ENT_QUOTES);

		$pil_c = htmlspecialchars($pil_c,ENT_QUOTES);

		$pil_d = htmlspecialchars($pil_d,ENT_QUOTES);

		$knc_jwb = htmlspecialchars($knc_jwb);

		$getlatestid = mysqli_query($koneksi,"SELECT * FROM soaltoeic ORDER BY id_soal DESC LIMIT 1");
				$row1 = mysqli_fetch_array($getlatestid);
					$nomor = $row1['id_soal'];
					$realnomor = $nomor + 1;
		mysqli_query($koneksi,"INSERT INTO soaltoeic (id_soal, soal, imagedir, audiodir, a, b, c, d, knc_jawaban) VALUES('$realnomor', '$soal', '$img', '$audio', '$pil_a', '$pil_b', '$pil_c', '$pil_d','$jwb')");
		
		$_SESSION['message'] = "Record has been saved!";
		$_SESSION['msg_type'] = "success";
		
		header("location: editsoaltoeic.php");
	}
	
	//delete button pressed
	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		mysqli_query($koneksi,"DELETE FROM soaltoeic WHERE id_soal='$id'");
		
		$_SESSION['message'] = "Record has been deleted!";
		$_SESSION['msg_type'] = "danger";
		
		header("location: editsoaltoeic.php");
	}
	
	//edit button pressed
	if (isset($_GET['edit'])){
		$id=$_GET['edit'];
		$update = true;
		$result = mysqli_query($koneksi,"SELECT * FROM soaltoeic WHERE id_soal='$id'");
		if (mysqli_num_rows($result)==1) {
			$row = $result->fetch_array();
			$idsoal = $row['id_soal'];
			$soal = $row['soal'];
			$img = $row['imagedir'];
			$audio = $row['audiodir'];
			$pil_a = $row['a'];
			$pil_b = $row['b'];
			$pil_c = $row['c'];
			$pil_d = $row['d'];
			$jwb = $row['knc_jawaban'];
		}
	}
	
	if (isset($_POST['update'])){
		$idsoal = $_POST['id_soal'];
		$soal = $_POST['soal'];
		$img = $_POST['image'];
		$audio = $_POST['audio'];
		$pil_a = $_POST['opsia'];
		$pil_b = $_POST['opsib'];
		$pil_c = $_POST['opsic'];
		$pil_d = $_POST['opsid'];
		$jwb = $_POST['knc_jawaban'];
		
				//validasi htmlchar
		$soal = htmlspecialchars($soal,ENT_QUOTES);
		
		$img = htmlspecialchars($img);
		
		$audio = htmlspecialchars($audio);

		$pil_a = htmlspecialchars($pil_a,ENT_QUOTES);

		$pil_b = htmlspecialchars($pil_b,ENT_QUOTES);

		$pil_c = htmlspecialchars($pil_c,ENT_QUOTES);

		$pil_d = htmlspecialchars($pil_d,ENT_QUOTES);

		$jwb = htmlspecialchars($jwb);
		
		mysqli_query($koneksi,"UPDATE soaltoeic SET soal='$soal', imagedir='$img', audiodir='$audio', a='$pil_a', b='$pil_b', c='$pil_c', d='$pil_d', knc_jawaban='$jwb' WHERE id_soal='$idsoal'");
		
		$_SESSION['message'] = "Record has been updated!";
		$_SESSION['msg_type'] = "primary";
		
		header("location: editsoaltoeic.php");
	}
	?>

	