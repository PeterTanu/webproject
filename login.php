

<?php
session_start();
	include "koneksi.php";
	if (isset($_POST['username']))
	{
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$num = "SELECT * FROM `admin` WHERE username='$username'
and password='$pass'";
		$que = mysqli_query($koneksi,$num);
		if (mysqli_num_rows($que) >0) {
		echo " Login success" ;
			$_SESSION['login_user'] = $username;
		header('location:index.php');
		}
		else
		{header("location:loggingin.php?info=Username/password salah");
		} 
	}

?>
