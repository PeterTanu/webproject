<!DOCTYPE html>
<?php
include "inc/header.php";

if(isset($_POST['submit()']) or ($_POST['value'] == "submit")){
$koneksi = mysqli_connect("localhost","root","","db_soal");


		$pilihan=$_POST["pilihan"];
		$id_soal=$_POST["id"];
		$jumlah=$_POST['jumlah'];
		$nama=$_POST['nama'];
		$level=$_POST['level'];
?>
<html lang="en">

<head>
  <title>Eng-Learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/button.css"> 
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/popper.js/1.14.7/popper.min.js"></script>
  <script src="js/tooltip.js"></script>
  <script src="js/bootstrap.min.js"></script>
 <script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover({html:true});   
});

</script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
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
</nav>
<body>

<div class="container bg-light" style="margin-top:30px; margin-bottom:30px">
<center><h2 class="text-info">Quiz Tests</h2></center>
<div class="row">
<div class="col-sm-8">
<div style='width:100%; border: 1px solid #EBEBEB; overflow:scroll;height:700px;'>
<table width="100%" border="0">

<?php     		
			$urut=0;
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
          $nomor=$id_soal[$i];
			$query1 = mysqli_query($koneksi,"select * from tbl_soal where id_soal='$nomor'");
						$cek1=mysqli_num_rows($query1);
						while ($row = mysqli_fetch_array($query1)){
						$nomer = $row['id_soal'];
						$pertanyaan = $row['soal'];
						$pil_a = $row['a'];
						$pil_b = $row['b'];
						$pil_c = $row['c'];
						$pil_d = $row['d'];
						$jwb = $row['knc_jawaban'];
						$reason = $row['reason'];
						$level = $row['level'];
						$kode = $row['kd_materi'];
						}
						$urut = $urut + 1;
						echo '<tr><td>'.$urut.'. ';
				
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $query=mysqli_query($koneksi,"select * from tbl_soal where id_soal='$nomer' and knc_jawaban='$jawaban'");
                    
                    $cek=mysqli_num_rows($query);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
						$benar++;
							// output pertanyaan+jawaban(benar)
							if ($jawaban=="A") {
							echo '<font color="blue">'.$pertanyaan.'</font></td></tr>
							<tr><td><font color="green">A.  <input type="radio" checked disabled>'.$pil_a.'</font></td></tr>
							<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
							<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
							}elseif($jawaban=="B"){
							echo '<font color="blue">'.$pertanyaan.'</font></td></tr>
							<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
							<tr><td><font color="green">B.  <input type="radio" checked disabled>'.$pil_b.'</font></td></tr>
							<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
							}elseif($jawaban=="C"){
							echo '<font color="blue">'.$pertanyaan.'</font></td></tr>
							<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
							<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
							<tr><td><font color="green">C.  <input type="radio" checked disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
							}elseif($jawaban=="D"){
							echo '<font color="blue">'.$pertanyaan.'</font></td></tr>
							<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
							<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
							<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="green">D.  <input type="radio" checked disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="green">D.  <input type="radio" checked disabled>'.$pil_d.'</font></td></tr>';
							}
							}
						}else{
                        //jika salah
						$salah++;						
						echo '<font color="red">'.$pertanyaan;
						$q_materi=mysqli_query($koneksi,"select * from materi where kd_materi='$kode'");
						$cek1=mysqli_num_rows($q_materi);
						while ($row1 = mysqli_fetch_array($q_materi)){
							$judul = $row1['judul_materi'];
							$link = $row1['link'];
						}
						if($cek1) {
						?>
						
						<button class="btn btn-info btn-circle" data-toggle="popover" data-trigger="" title="<a href='<?php echo $link; ?>.php' target='_blank'><?php echo $judul; ?></a>" data-content="<?php echo $reason; ?>">?</button>
						<?php
						}
						// output pertanyaan+jawaban(salah)
						if ($jawaban=="A" and $jwb=="b") {
						echo 
						'<tr><td><font color="red">A.  <input type="radio" checked disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="green">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="A" and $jwb=="c"){
						echo '
						<tr><td><font color="red">A.  <input type="radio" checked disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="green">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="A" and $jwb=="d"){
						echo '
						<tr><td><font color="red">A.  <input type="radio" checked disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="green">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="green">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="B" and $jwb=="a"){
						echo '
						<tr><td><font color="green">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="red">B.  <input type="radio" checked disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="B" and $jwb=="c"){
						echo '
						<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="red">B.  <input type="radio" checked disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="green">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="B" and $jwb=="d"){
						echo '
						<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="red">B.  <input type="radio" checked disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="green">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="green">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="C" and $jwb=="a"){
						echo '
						<tr><td><font color="green">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="red">C.  <input type="radio" checked disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="C" and $jwb=="b"){
						echo '
						<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="green">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="red">C.  <input type="radio" checked disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="black">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="C" and $jwb=="d"){
						echo '
						<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="red">C.  <input type="radio" checked disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="green">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}else{
								echo '<tr><td style="display:block;"><font color="green">D.  <input type="radio" disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="D" and $jwb=="a"){
						echo '
						<tr><td><font color="green">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="red">D.  <input type="radio" checked disabled>'.$pil_d.'</font></td></tr>';
							}else{
							echo '<tr><td style="display:block;"><font color="red">D.  <input type="radio" checked disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="D" and $jwb=="b"){
						echo '
						<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="green">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="black">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="red">D.  <input type="radio" checked disabled>'.$pil_d.'</font></td></tr>';
							}else{
							echo '<tr><td style="display:block;"><font color="red">D.  <input type="radio" checked disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}elseif($jawaban=="D" and $jwb=="c"){
						echo '
						<tr><td><font color="black">A.  <input type="radio" disabled>'.$pil_a.'</font></td></tr>
						<tr><td><font color="black">B.  <input type="radio" disabled>'.$pil_b.'</font></td></tr>
						<tr><td><font color="green">C.  <input type="radio" disabled>'.$pil_c.'</font></td></tr>';
							if (empty($pil_d)){
								echo '<tr><td style="display:none;"><font color="red">D.  <input type="radio" checked disabled>'.$pil_d.'</font></td></tr>';
							}else{
							echo '<tr><td style="display:block;"><font color="red">D.  <input type="radio" checked disabled>'.$pil_d.'</font></td></tr>';
							}
						
						}
                    }
				}
				
			}  
      
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                //$result=mysqli_query($koneksi,"select * from tbl_soal WHERE aktif='Y'");
                //$jumlah_soal=mysqli_num_rows($result);
                $score = 100/30*$benar;
                $hasil = number_format($score,2);  
				date_default_timezone_set("Asia/Hong_Kong");
				$getdate = date('Y-m-d H:i:s');
				$getlatestid = mysqli_query($koneksi,"SELECT * FROM score ORDER BY id DESC LIMIT 1");
				$row1 = mysqli_fetch_array($getlatestid);
					$idskor = $row1['id'];
					$realidskor = $idskor + 1;
					/*
				mysqli_query($koneksi,"INSERT INTO score (id, username, level, date, score) VALUES ('$realidskor', '$nama', '$level', '$getdate', '$hasil')");				
				*/
		
?>
</table>
</div>
</div>
<div class="col-sm-4">
<?php
echo "	<table width='100%' border='1'>
		<tr><td>Nama Anda</td><td> : $nama </td></tr>
		<tr><td>Level</td><td> : $level </td></tr>
         <tr><td>Jumlah Jawaban Benar</td><td> : $benar </td></tr>
         <tr><td>Jumlah Jawaban Salah</td><td> : $salah</td></tr>
         <tr><td>Jumlah Jawaban Kosong</td><td>: $kosong</td></tr>
		 <tr><td>Jumlah skor</td><td>: $hasil</td></tr>
		 <tr><td>Tanggal/Waktu</td><td> : $getdate </td></tr>
        </table>"; 
?>
</div>	
</div>
</div>
 
</body>

<?php
}else{
header('location:ambilsoal.php?info=Masukkan nama anda');
}
?>
<script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>
</html>