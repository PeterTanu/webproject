<html>
<head><title>Eng-Learning</title>

</head>
<body>
<form method='POST'>
<input type='text' name='username' placeholder='Masukkan Username Anda' required><br>
<input type='text' name='nama' placeholder='Masukkan Nama anda' required ><br>
<input type='password' name='password' placeholder='Masukkan Password anda' required ><br>
<input type='submit' name='submit' value='Register'>
</form>

<?php
	include "koneksi.php";
	if (isset($_POST['username']))
	{
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$num = "SELECT * FROM `users` WHERE ( username = "."'".$_POST['username']."')";
		$que = mysqli_query($koneksi,$num);
		if (mysqli_num_rows($que) >0) {
		echo " Duplicate username " ;}
		else
		{
		$reg = "INSERT INTO `users` (`id_user`,`username`,`nama`,`password`) VALUES (NULL,'$username','$nama','$pass')";
		$result = mysqli_query($koneksi,$reg);
		
			if ($result) {
				
				echo "<meta http-equiv='refresh' content='0; URL=/db_soal/auth.html'>";
			}else
			{
				echo "ERROR";
			}
		} 
	}
?>
</body>
</html>