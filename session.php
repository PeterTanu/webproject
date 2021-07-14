<?php
include "koneksi.php";
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($koneksi,"SELECT * from admin where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
$login_id = $row['id_adm'];

	if (!isset($login_session)){
	mysqli_close($koneksi);
	
	header('location:loggingin.php?info=LOGIN TERLEBIH DAHULU SEBELUM EDIT DATA (Admin Previleges)');
	}
?>
