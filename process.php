<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	include "koneksi.php";
	
	$kode = '';
	$kategori = '';
	$judul = '';
	$isi = '';
	$link = '';
	$update = false;
	//save button pressed
		if (isset($_POST['save'])){
		
		$kode = $_POST['kode'];
		$kategori = $_POST['kategori'];
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$link = $_POST['link'];
		
		//validasi htmlchar
		$kode = htmlspecialchars($kode);
		
		$kategori = htmlspecialchars($kategori,ENT_QUOTES);
		
		$judul = htmlspecialchars($judul,ENT_QUOTES);

		$isi = htmlspecialchars($isi,ENT_QUOTES);

		$link = htmlspecialchars($link);
		$getquery=mysqli_query($koneksi,"SELECT * FROM materi where kd_materi='$kode'");
		if (mysqli_num_rows($getquery) == 1){
		$_SESSION['message'] = "Duplicate Record!";
		$_SESSION['msg_type'] = "warning";
		header("location: editmateri.php");
		
		}else{
		mysqli_query($koneksi,"INSERT INTO materi (kd_materi, kategori, judul_materi, isi, link) VALUES('$kode', '$kategori', '$judul', '$isi', '$link')");
		
		$_SESSION['message'] = "Record has been saved!";
		$_SESSION['msg_type'] = "success";
		
		header("location: editmateri.php");
		}
	}
	
	//delete button pressed
	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		mysqli_query($koneksi,"DELETE FROM materi WHERE kd_materi='$id'");
		
		$_SESSION['message'] = "Record has been deleted!";
		$_SESSION['msg_type'] = "danger";
		
		header("location: editmateri.php");
	}
	
	//edit button pressed
	if (isset($_GET['edit'])){
		$id=$_GET['edit'];
		$update = true;
		$result = mysqli_query($koneksi,"SELECT * FROM materi WHERE kd_materi='$id'");
		if (mysqli_num_rows($result)==1) {
			$row = $result->fetch_array();
			$kode = $row['kd_materi'];
			$kategori = $row['kategori'];
			$judul = $row['judul_materi'];
			$isi = $row['isi'];
			$link = $row['link'];
		}
	}
	
	if (isset($_POST['update'])){
		$kode = $_POST['kode'];
		$kategori = $_POST['kategori'];
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$link = $_POST['link'];
				//validasi htmlchar
		$kode = htmlspecialchars($kode);
		
		$kategori = htmlspecialchars($kategori,ENT_QUOTES);
		
		$judul = htmlspecialchars($judul,ENT_QUOTES);

		$isi = htmlspecialchars($isi,ENT_QUOTES);

		$link = htmlspecialchars($link);
		mysqli_query($koneksi,"UPDATE materi SET kategori='$kategori', judul_materi='$judul', isi='$isi', link='$link' WHERE kd_materi='$kode'");
		
		$_SESSION['message'] = "Record has been updated!";
		$_SESSION['msg_type'] = "primary";
		
		header("location: editmateri.php");
	}
	?>

	