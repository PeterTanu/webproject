<!DOCTYPE html>
<html lang="en">
<?php 
include "../../inc/header.php";
include "../../inc/navbar.html";
?>
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/sidebar.css">
  <link rel="stylesheet" href="../../css/materi.css">
  <link rel="stylesheet" href="../../fontawesome/css/all.css">
  <script src="../../js/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../js/popper.js/1.14.7/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
 </head>


<body>
<div id="wrapper">
<?php
include "../../inc/sidebar.html";

$koneksi = mysqli_connect("localhost","root","","db_soal");

?>
	<!-- Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
				<h1>Latihan Part Of Speech</h1>
				<br><h4>Instruction : You have to read the following sentences and choose the words or words that belong to the part of speech specified in the bracket ().</h2>
				<br><h4>Example :</h3>
				<br><b>QUESTION</b> : She must have reached home. (verb)
				<br><b>ANSWER</b> : She <u>must have reached</u> home.
				<hr>
				<form id="frmSoal" action="#" method="post" >
				<table border="0">
					<?php
						$hasil=mysqli_query($koneksi,"SELECT * FROM tbl_soal WHERE kd_materi='G006' and kategori='latihan'");
						$urut=0;
						while ($row=mysqli_fetch_array($hasil)){
							$id=$row["id_soal"];
							$pertanyaan=$row["soal"];
							$pilihan_a=$row["a"];
							$pilihan_b=$row["b"];
							$pilihan_c=$row["c"];
					?>
			<input type="hidden" name="id[]" value=<?php echo $id; ?>>
            <tr>
                  <td width="17"><font color="#000000"><?php echo $urut = $urut + 1; ?></font></td>
                  <td width="430"><font color="#000000"><?php echo "$pertanyaan"; ?></font></td>
            </tr>
            <tr>
                  <td height="21"><font color="#000000">&nbsp;</font></td>
                <td><font color="#000000">
               A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
                <?php echo "$pilihan_a";?></font> </td>
            </tr>
            <tr>
                  <td><font color="#000000">&nbsp;</font></td>
                <td><font color="#000000">
               B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
                <?php echo "$pilihan_b";?></font> </td>
            </tr>
            <tr>
                  <td><font color="#000000">&nbsp;</font></td>
                <td><font color="#000000">
              C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
                <?php echo "$pilihan_c";?></font> </td>
            </tr>
			<?php
			}
			?>
			<tr>
                <td>&nbsp;</td>
                  <td><input type="submit" name="submit" value="Jawab"></td>
            </tr>
            </table>
			</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="../../js/togglesidebar.js"></script>
</body>
</html>