<!DOCTYPE html>


<html>
<?php 
include "inc/header.php";

function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
if(isset($_POST['submit'])){
	$nama=test_input($_POST['nama']);
	
	?>
<head>
  <title>Eng-Learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/popper.js/1.14.7/popper.min.js"></script>
    <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  
<script src="js/jquery.plugin.min.js"></script>
<script src="js/jquery.countdown.js"></script>


  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  
  #timer_place{
		margin:0 auto;
		text-align:center;
		
	}
	#timer{
		border-radius:7px;
		border:2px solid gray;
		padding:7px;
		font-size:2em;
		font-weight:bolder;
		color:blue;
	}
  </style>
</head>


<?php
session_start();
if(isset($_SESSION["waktu_start"])){
	$lewat = time() - $_SESSION["waktu_start"];
	}else{
		$_SESSION["waktu_start"] = time();
		$lewat = 0;
	}
?>
<script type="text/javascript">

	function waktuHabis(){
		alert('Waktu Anda telah habis.');
		var frmSoal = document.getElementById("frmSoal"); 
		frmSoal.submit(); 
	}
	function hampirHabis(periods){
		if($.countdown.periodsToSeconds(periods) == 60){
			$(this).css({color:"red"});
		}
	}
	
	$(function(){
		var waktu = 1200; 
		var sisa_waktu = waktu - <?php echo $lewat ?>;
		var longWayOff = sisa_waktu;
		
		$("#timer").countdown({
			until: longWayOff,
			compact:true,
			onExpiry:waktuHabis,
			onTick: hampirHabis

		});
	})
	
</script>

<!-- NAVBAR -->

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
				<a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">Tests</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" data-toogle="tab" href="ambilsoal.php">Quiz Test</a>
				<a class="dropdown-item" data-toogle="tab" href="ambilsoalt.php">TOEIC Test</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toogle="pill" href="content/materi.php">Materi</a>
			</li>
    </ul>
	</div>
  <div id='timer_place'>
	<span id='timer'>00 : 00 : 00</span>
</div>
</nav> 
<!-- try to get confirmation value to send timer value 
<script>
	function getConfirmation(){
		var answer = confirm("Do you want to continue ?");
		if (answer){
                  document.getElementById('waktuspan').value = document.getElementById('timer').innerText;
               } else {
					return answer;
               }
            }
	
	function getConfirmation2() {
               var retVal = confirm("Do you want to continue ?");
               if( retVal == true ) {
                  document.write ("User wants to continue!");
                  return true;
               }
               else {
                  return false;
               }
            }
</script>
-->

<!-- CONTENT -->
<body>
<div class="container-fluid bg-light" style="margin-top:30px; margin-bottom:30px">
<center><h2 class="text-primary">TOEIC Tests</h2></center>

<?php

$koneksi = mysqli_connect("localhost","root","","db_soal");
?>

<div style='width:100%; border: 1px solid #EBEBEB; '>

<form id="frmSoal" action="jawabtoeic.php" method="post" >
<input type="hidden" name="value" value="submit">
<input type="hidden" name="nama" value="<?php echo $nama; ?>">
<input type="hidden" name="level" value="TOEIC">
<table width="100%" border="0">
 <?php

        $hasil=mysqli_query($koneksi,"select * from soaltoeic ORDER BY RAND () LIMIT 30");
        $jumlah=mysqli_num_rows($hasil);
        $urut=0;
        while($row =mysqli_fetch_array($hasil))
        {
            $id=$row["id_soal"];
            $pertanyaan=$row["soal"];
			$img=$row["imagedir"];
			$audio=$row["audiodir"];
            $pilihan_a=$row["a"];
            $pilihan_b=$row["b"];
            $pilihan_c=$row["c"];
            $pilihan_d=$row["d"]; 
            
            ?>

            <input type="hidden" name="id[]" value=<?php echo $id; ?>>
            <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
            <tr>
                  <td width="2%" valign="bottom"><font color="#000000"><?php echo $urut = $urut + 1; ?></font></td>
				  <?php
					if (!empty($img)){
						?>
				<td width="78%" height="10%">Describe the Picture! by listening to the speakers(audio)
				
				<audio controls preload="none">
				<source src="<?php echo $audio; ?>" /></audio>
				</td>
				<?php
							if (empty($pilihan_d)){
								echo "<td rowspan='4' width='20%'><img src='".$img."' alt=' ' width='200' height='200'></td>";
							}else{
						?>
						<td rowspan="5" width="20%"><img src='<?php echo "$img"; ?>' alt=" " width='200' height='200'></td>
							<?php
						}?>
            </tr>
            <tr>
                  <td><font color="#000000">&nbsp;</font></td>
                <td heigth="22.5%"><font color="#000000">
               A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
                ...</font> </td>
            </tr>
            <tr>
                  <td><font color="#000000">&nbsp;</font></td>
                <td heigth="22.5%"><font color="#000000">
               B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
                ...</font> </td>
            </tr>
            <tr>
                  <td><font color="#000000">&nbsp;</font></td>
                <td heigth="22.5%"><font color="#000000">
              C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
                ...</font> </td>
            </tr>
			<?php
				if (empty($pilihan_d)){
					echo "<tr style='border-bottom: 5px solid #ddd;'><td></td>
					</tr>";
				}else{
			?>
            <tr style="border-bottom: 5px solid #ddd;">
                <td><font color="#000000">&nbsp;</font></td>
                <td heigth="22.5%"><font color="#000000">
              D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
                ...</font> </td>
            </tr>
			<?php
				}
					}else if (!empty($audio)){
						?>
						<td width="78%" height="10%">Listen to the speakers(audio)!
						<audio controls preload="none">
						<source src="<?php echo $audio; ?>" /></audio></td>
						</td>
						</tr>
						<tr>
								  <td><font color="#000000">&nbsp;</font></td>
								<td heigth="22.5%"><font color="#000000">
							   A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
								...</font> </td>
							</tr>
							<tr>
								  <td><font color="#000000">&nbsp;</font></td>
								<td heigth="22.5%"><font color="#000000">
							   B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
								...</font> </td>
							</tr>
							<tr>
								  <td><font color="#000000">&nbsp;</font></td>
								<td heigth="22.5%"><font color="#000000">
							  C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
								...</font> </td>
							</tr>
							<?php
								if (empty($pilihan_d)){
									echo "<tr style='border-bottom: 5px solid #ddd;'><td></td>
									</tr>";
								}else{
							?>
							<tr style="border-bottom: 5px solid #ddd;">
								<td><font color="#000000">&nbsp;</font></td>
								<td heigth="22.5%"><font color="#000000">
							  D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
								...</font> </td>
							</tr>
					<?php
								}
					}else{

				  ?>
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
				if (empty($pilihan_d)){
					echo "";
				}else{
			?>
            <tr style="border-bottom: 5px solid #ddd;">
                <td><font color="#000000">&nbsp;</font></td>
                <td><font color="#000000">
              D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
                <?php echo "$pilihan_d";?></font> </td>
            </tr>
        <?php
						}
					}
		}
		
        ?>
            <tr>
                <td>&nbsp;</td>
                  <td><input type="submit" name="submit()" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
            </tr>
            </table>
</form>
        </p>
		
</div>
</div>

<!-- FOOTER -->
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>

<?php
session_destroy();
}else{
header('location:ambilsoalt.php?info=Daftar dulu sebelum memulai kuis');
}
?>
</html>