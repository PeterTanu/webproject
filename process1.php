<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	include "koneksi.php";
	
	$idsoal = '';
	$kode_materi = '';
	$soal = '';
	$opsia = '';
	$opsib = '';
	$opsic = '';
	$opsid = '';
	$knc_jwb = '';
	$level = '';
	$reason = '';
	$update = false;
					

			
		
		
	//save button pressed
		if (isset($_POST['save'])){
		$idsoal = $_POST['id_soal'];
		$kode_materi = $_POST['kd_materi'];
		$soal = $_POST['soal'];
		$opsia = $_POST['opsi_a'];
		$opsib = $_POST['opsi_b'];
		$opsic = $_POST['opsi_c'];
		$opsid = $_POST['opsi_d'];
		$knc_jwb = $_POST['knc_jawaban'];
		$level = $_POST['level'];
		$reason = $_POST['reason'];
		
	//validasi htmlchar
		$kode_materi = htmlspecialchars($kode_materi);

		$soal = htmlspecialchars($soal,ENT_QUOTES);

		$opsia = htmlspecialchars($opsia,ENT_QUOTES);

		$opsib = htmlspecialchars($opsib,ENT_QUOTES);

		$opsic = htmlspecialchars($opsic,ENT_QUOTES);

		$opsid = htmlspecialchars($opsid,ENT_QUOTES);

		$knc_jwb = htmlspecialchars($knc_jwb);

		$level = htmlspecialchars($level);

		$reason = htmlspecialchars($reason,ENT_QUOTES);
		$getlatestid = mysqli_query($koneksi,"SELECT * FROM tbl_soal ORDER BY id_soal DESC LIMIT 1");
				$row1 = mysqli_fetch_array($getlatestid);
					$nomor = $row1['id_soal'];
					$realnomor = $nomor + 1;
		mysqli_query($koneksi,"INSERT INTO tbl_soal (id_soal, kd_materi, soal, a, b, c, d, knc_jawaban, level, reason) VALUES('$realnomor', '$kode_materi', '$soal', '$opsia', '$opsib', '$opsic', '$opsid', '$knc_jwb', '$level', '$reason')");
		
		$_SESSION['message'] = "Record has been saved!";
		$_SESSION['msg_type'] = "success";
		
		header("location: editsoalkuis.php");
	}
	
	//delete button pressed
	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		mysqli_query($koneksi,"DELETE FROM tbl_soal WHERE id_soal='$id'");
		
		$_SESSION['message'] = "Record has been deleted!";
		$_SESSION['msg_type'] = "danger";
		
		header("location: editsoalkuis.php");
	}
	
	//edit button pressed
	if (isset($_GET['edit'])){
		$id=$_GET['edit'];
		$update = true;
		$result = mysqli_query($koneksi,"SELECT * FROM tbl_soal WHERE id_soal='$id'");
		if (mysqli_num_rows($result)==1) {
			$row = $result->fetch_array();
			$idsoal = $row['id_soal'];
			$kode_materi = $row['kd_materi'];
			$soal = $row['soal'];
			$opsia = $row['a'];
			$opsib = $row['b'];
			$opsic = $row['c'];
			$opsid = $row['d'];
			$knc_jwb = $row['knc_jawaban'];
			$level = $row['level'];
			$reason = $row['reason'];
		
		}
	}
	
	if (isset($_POST['update'])){
		$idsoal = $_POST['id_soal'];
		$kode_materi = $_POST['kd_materi'];
		$soal = $_POST['soal'];
		$opsia = $_POST['opsi_a'];
		$opsib = $_POST['opsi_b'];
		$opsic = $_POST['opsi_c'];
		$opsid = $_POST['opsi_d'];
		$knc_jwb = $_POST['knc_jawaban'];
		$level = $_POST['level'];
		$reason = $_POST['reason'];
		
		//validasi htmlchar
		$kode_materi = htmlspecialchars($kode_materi);

		$soal = htmlspecialchars($soal,ENT_QUOTES);

		$opsia = htmlspecialchars($opsia,ENT_QUOTES);

		$opsib = htmlspecialchars($opsib,ENT_QUOTES);

		$opsic = htmlspecialchars($opsic,ENT_QUOTES);

		$opsid = htmlspecialchars($opsid,ENT_QUOTES);

		$knc_jwb = htmlspecialchars($knc_jwb);

		$level = htmlspecialchars($level);

		$reason = htmlspecialchars($reason,ENT_QUOTES);
		
		mysqli_query($koneksi,"UPDATE tbl_soal SET kd_materi='$kode_materi', soal='$soal', a='$opsia', b='$opsib', c='$opsic', d='$opsid', knc_jawaban='$knc_jwb', level='$level', reason='$reason' WHERE id_soal='$idsoal'");
		
		$_SESSION['message'] = "Record has been updated!";
		$_SESSION['msg_type'] = "primary";
		
		header("location: editsoalkuis.php");
	}
	?>

	