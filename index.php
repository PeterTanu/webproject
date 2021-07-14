<!DOCTYPE html>
<html lang="en">
<head>
  <title>Eng-Learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="datatables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/welcome.css">
<!-- ONLINE SCRIPT
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" ></script>
<script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
-->
  <script src="js/jquery/3.3.1/jquery.min.js"></script>
<script src="datatables/js/jquery.dataTables.min.js"></script>

<script src="datatables/js/moment.min.js" ></script>
<script src="datatables/js/datetime-moment.js"></script>

  <script src="js/popper.js/1.14.7/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</script>
  <style>
  .fakeimg {
	  width: 620px;
    height: 340px;
    background-image: url("http://<?php echo $_SERVER["SERVER_NAME"];?>/db_soal/inc/elearning2.jpg");
  }
  
</style>

</head>
<nav class="navbar navbar-expand-md navbar-light sticky-top justify-content-between" style="background-color: #e3f2fd;">
<!-- Brand -->
	<a class="navbar-brand" href="#"><img src="inc/logo.png" height="auto" width="250px"></a>
<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
<span class="navbar-toggler-icon"></span>
</button>

<!-- Navbar links -->
	<div class="collapse navbar-collapse flex-grow-0" id="collapsibleNavbar">
		<ul class="nav nav-pills text-right">
			<li class="nav-item">
				<a class="nav-link active" data-toogle="pill" href="index.php">Home</a>
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
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
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
</nav>
<body>
<?php
include "koneksi.php";
?>
	<div id="demo" class="carousel slide" data-ride="carousel" data-interval="25000">

	  <ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	  </ul>
	  <div class="carousel-inner">
	  
		<div class="carousel-item active">
			  <img src="inc/International-Telecommunication-Union-BRANDSPURNG.jpg" alt="Los Angeles" style="width:100%; height:700px;">
			<div class="carousel-content">
			
			</div>
			  <div class="carousel-caption">
				<h3>Take a lesson now!</h3>
				<p>Pilih materi yang ingin dipelajari</p>
				
				<form method="POST">
				<select id="kategori" class="custom-select" style="width:200px;">
					<option selected disabled hidden>Pilih Kategori</option>
					<option value="alls">All Category</option>
					<option value="verb">Verbs</option>
					<option value="tenses">Tenses</option>
					<option value="modals">Modals</option>
				</select>
					<select id="materi" class="custom-select" style="width:200px;">
						<option selected disabled hidden>Pilih Materi</option>
						<optgroup label="Verbs">
							<option value='mainverb'>Main Verb</option>
							<option value='infinitives'>Infinitives</option>
							<option value='verb-ing'>Verb -ing</option>
							<option value='verbphrases'>Verb Phrases</option>
							<option value='regandirregverb'>Regular dan Irregular Verb</option>
						</optgroup>
						<optgroup label="Tenses">
							<option value="tenses">Introduction</option>
							<option value="presenttense">Present Tense</option>
							<option value="pasttense">Past Tense</option>
							<option value="futuretense">Future Tense</option>
							<option value="pastfuturetense">Past Future Tense</option>
						</optgroup>
						<optgroup label="Modals">
							<option value="auxiliaryverb">Auxilliary Modal Verb</option>
							<option value="phrasalverb">Phrasal Modal Verb</option>
							<option value="perfectmodal">Perfect Modal</option>
							<option value="usedtobeusedto">Used To and Be Used To</option>
							<option value="preferences">Preferences</option>
							<option value="imperative">Imperative</option>
							<option value="know-knowhow">Know and Know How</option>
						</optgroup>
					</select>
					<input type="submit" class="btn btn-success" name="submit" value="Learn Now" onClick="myFunction()">
				</form> 
			  </div>
			</div>		  
		<div class="carousel-item">
		  <img src="inc/BLX_ELearning_Header.jpg" alt="Chicago" style="width:100%; height:700px;">
		  <div class="carousel-caption">
			<h3>Test you skill now!</h3>
			<p>Pilih jenis tes</p>
			<a href="ambilsoal.php" class="btn btn-primary">Quiz Test</a>
			<a href="ambilsoalt.php" class="btn btn-success">TOEIC Test</a>
		  </div>   
		</div>
		<div class="carousel-item">
		  <img src="inc/18-1871_elearning_webheader_2100x900_FNL.png" alt="New York" style="width:100%; height:700px;">
		  <b><div class="carousel-caption">
			<h3>LEADERBOARD</h3>
			<p>Skor Tertinggi</p>
			<table id="myTable" class="text-light">
			<thead>
				<tr>
				<th>Rank</th>
				<th>Nama</th>
				<th>Level</th>
				<th>Score</th>
				<th>Tanggal submit Skor</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$urut = 1;
			$query=mysqli_query($koneksi,"SELECT * FROM score WHERE NOT level ='TOEIC' ORDER BY level DESC , score DESC");	
				while ($row = mysqli_fetch_array($query)){
					$user = $row['username'];
					$lvl = $row['level'];
					$date = $row['date'];
					$score = $row['score'];
			?>
				<tr>
					<td><?php echo $urut++ ?></td>
					<td><?php echo $user; ?></td>
					<td><?php echo $lvl; ?></td>
					<td><?php echo $score; ?></td>
					<td><?php echo $date; ?></td>
				</tr>
				<?php
			}?>
			</tbody>
			</table>
			<span class="text-warning">Lihat lebih lengkap</span><br>
			<a class="downarrow" href="#fullboard"><i class="fas fa-chevron-down"></i></a>
			<a name="fullboard"></a>
		  </div></b>  
		</div>  
	  </div>
	
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>
	</div>
	
<div class="container-fluid" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-6">
	<h3><b>LEADER BOARD</b></h3>
	<form id="kedua" method="get" action="index.php#fullboard">
	<select name="pilih" id="pilih" onchange="document.getElementById('kedua').submit();">
		<option value="1">World Score</option>
		<option value="2">Full Score</option>
		<option value="3">TOEIC Score</option>
	</select>
	
	<?php
	
	$query=mysqli_query($koneksi,"SELECT * FROM score WHERE NOT level ='TOEIC' ORDER BY level DESC , score DESC ");
		if (isset($_GET['pilih'])){
			$val = $_GET['pilih'];
			if ($val == "1"){
			$query=mysqli_query($koneksi,"SELECT * FROM score WHERE NOT level ='TOEIC' ORDER BY level DESC , score DESC");
			}else if($val == "2"){
			$query=mysqli_query($koneksi,"SELECT * FROM score ORDER BY level DESC , score DESC");
			}else if($val == "3"){
			$query=mysqli_query($koneksi,"SELECT * FROM score WHERE level='TOEIC' ORDER BY score DESC");
			}
		}
	?>
	<table id="myTable2" class="table table-hover">
	<thead>
		<tr>
		<th>Nama</th>
		<th>Level</th>
		<th>Score</th>
		<th>Waktu</th>
		</tr>
	</thead>
	<tbody>
	<?php
		
		while ($row = mysqli_fetch_array($query)){
			$user = $row['username'];
			$lvl = $row['level'];
			$date = $row['date'];
			$score = $row['score'];
	?>
		<tr>
			<td><?php echo $user; ?></td>
			<td><?php echo $lvl; ?></td>
			<td><?php echo $score; ?></td>
			<td><?php echo $date; ?></td>
		</tr>
		<?php
	}?>
	</tbody>
	</table>	
	
	
	<form id="pertama" method="GET" action="index.php#fullboard">
	<p>Personal Score<input type="text" name="nama" placeholder="Masukkan Nama">
	<button class="btn btn-success" onClick="document.getElementById('pertama').submit();">Submit</button></p>
	<?php
	$query1=mysqli_query($koneksi,"SELECT * FROM score WHERE username='peter' ORDER BY level DESC, score DESC");
		if (isset($_GET['nama'])){
			$name = $_GET['nama'];
			$query1 = mysqli_query($koneksi,"SELECT * FROM score WHERE username='$name' ORDER BY level DESC, score DESC");
		}
	?>
	
	<table class="table table-light table-hover" id="myTabled">
	<thead>
		<tr>
		<th>Nama <a href="#" onclick="sortTabled(0)"><i class="fas fa-sort"></i></a></th>
		<th>Level <a href="#" onclick="sortTabled(1)"><i class="fas fa-sort"></i></a></th>
		<th>Score <a href="#" onclick="sortTabledNum(2)"><i class="fas fa-sort"></i></a></th>
		<th>Waktu <a href="#" onclick=""><i class="fas fa-sort"></i></a></th>
		</tr>
	</thead>
	<tbody>
	<?php
		
		while ($row1 = mysqli_fetch_array($query1)){
			$user = $row1['username'];
			$lvl = $row1['level'];
			$date = $row1['date'];
			$score = $row1['score'];
	?>
		<tr>
			<td><?php echo $user; ?></td>
			<td><?php echo $lvl; ?></td>
			<td><?php echo $score; ?></td>
			<td><?php echo $date; ?></td>
		</tr>
		<?php
	}?>
	</tbody>
	</table>

    </div>
    <div class="col-sm-6">
	<center>
      <div class="fakeimg"></div>
      <h2 class="text-info">Learning English Online</h2>
	  <h2 class="text-primary">Grammar, Quizzes, TOEIC Tests</h2></center>
      <h5>You will find a lot of information about the English language on this site. You can learn English words, practise grammar, look at some basic rules, do tests and compete to yourself or other</h5>
      <br>
  </div>
</div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Learn every day!!</p>
</div>


<script>
document.getElementById('pilih').value = "<?php echo $_GET['pilih'];?>";
</script>
<script>
$(document).ready(function() {
    $.fn.dataTable.moment( 'YYYY-MM-D H:m:s' );

    $('#myTable').DataTable( {
        "pageLength": 5,
		"lengthChange": false,
        "info":     false,
		 //"ordering": false,
  "order": []
 
    });
} );
</script>

<script>
$(document).ready(function() {
    $.fn.dataTable.moment( 'YYYY-MM-D H:m:s' );

    $('#myTable2').DataTable( {
        "pageLength": 5,
		"lengthChange": false,
        "info":     false,
		 //"ordering": false,
  "order": []
 
    });
} );
</script>
<script>
var options="";
$("#kategori").on('change',function(){
    var value=$(this).val();
    if(value=="verb")
    {
         options="<option selected disabled hidden>Pilih Materi</option>"
          		+"<option value='mainverb'>Main Verb</option>"
      	 		+"<option value='infinitives'>Infinitives</option>"
				+"<option value='verb-ing'>Verb -ing</option>"
				+"<option value='verbphrases'>Verb Phrases</option>"
				+"<option value='regandirregverb'>Regular dan Irregular Verb</option>";
        $("#materi").html(options);
    }
    else if(value=="tenses")
    {
        options='<option selected disabled hidden>Pilih Materi</option>'
               +'<option value="tenses">Introduction</option>'
      		   +'<option value="presenttense">Present Tense</option>'
			   +'<option value="pasttense">Past Tense</option>'
			   +'<option value="futuretense">Future Tense</option>'
			   +'<option value="pastfuturetense">Past Future Tense</option>';
        $("#materi").html(options);
    }
	else if(value=="modals")
    {
        options='<option selected disabled hidden>Pilih Materi</option>'
               +'<option value="auxiliaryverb">Auxilliary Modal Verb</option>'
      		   +'<option value="phrasalverb">Phrasal Modal Verb</option>'
			   +'<option value="perfectmodal">Perfect Modal</option>'
			   +'<option value="usedtobeusedto">Used To and Be Used To</option>'
			   +'<option value="preferences">Preferences</option>'
			   +'<option value="imperative">Imperative</option>'
			   +'<option value="know-knowhow">Know and Know How</option>';
        $("#materi").html(options);
    }
	else if(value=="alls")
    {
        options='<option selected disabled hidden>Pilih Materi</option>'
				+'<optgroup label="Verbs">'
					+'<option value="mainverb">Main Verb</option>'
					+'<option value="infinitives">Infinitives</option>'
					+'<option value="verb-ing">Verb -ing</option>'
					+'<option value="verbphrases">Verb Phrases</option>'
					+'<option value="regandirregverb">Regular dan Irregular Verb</option>'
				+'</optgroup>'
				+'<optgroup label="Tenses">'
					+'<option value="tenses">Introduction</option>'
					+'<option value="presenttense">Present Tense</option>'
					+'<option value="pasttense">Past Tense</option>'
					+'<option value="futuretense">Future Tense</option>'
					+'<option value="pastfuturetense">Past Future Tense</option>'
				+'</optgroup>'
				+'<optgroup label="Modals">'
					+'<option value="auxiliaryverb">Auxilliary Modal Verb</option>'
					+'<option value="phrasalverb">Phrasal Modal Verb</option>'
					+'<option value="perfectmodal">Perfect Modal</option>'
					+'<option value="usedtobeusedto">Used To and Be Used To</option>'
					+'<option value="preferences">Preferences</option>'
					+'<option value="imperative">Imperative</option>'
					+'<option value="know-knowhow">Know and Know How</option>'
				+'</optgroup>';
        $("#materi").html(options);
    }
    else
        $("#materi").find('option').remove()
});
</script>

<script>
function myFunction(){
    var urldata = $('#materi :selected').val(); // get the selected  option value
	if (urldata=="Pilih Materi")
	{
		window.open("http://<?php echo $_SERVER["SERVER_NAME"];?>/db_soal/content/materi.php")
	}
	else
    window.open("http://<?php echo $_SERVER["SERVER_NAME"];?>/db_soal/content/"+urldata+".php") // open a new window. here you need to change the url according to your wish.
};

</script>
</body>
</html>
