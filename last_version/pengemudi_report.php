<!DOCTYPE html>
<html>
<head>
	<title>Report Mekanik</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/matrix-style.css" />
	<style type="text/css">
		@media print {

		  @page {                
		    size: A4;
		    margin: 0cm;
		    padding-top: 2cm;
		    padding-left: 3cm;
		    padding-right: 3cm;

		  }

		  html, body {
		    width: 1024px;
		  }

		  body {
		    margin: 0 auto;
		    line-height: 1em;
		    word-spacing:1px;
		    letter-spacing:0.2px;
		    font: 14px "Times New Roman", Times, serif;
		    background:white;
		    color:black;
		    width: 100%;
		    float: none;
		  }

		  /* avoid page-breaks inside a listingContainer*/
		  .listingContainer{
		    page-break-inside: avoid;
		  }

		  h1 {
		    font: 28px "Times New Roman", Times, serif;
		  }

		  h2 {
		    font: 24px "Times New Roman", Times, serif;
		  }

		  h3 {
		    font: 20px "Times New Roman", Times, serif;
		  }

		  /* Improve colour contrast of links */
		  a:link, a:visited {
		    color: #781351
		  }

		  /* URL */
		  a:link, a:visited {
		    background: transparent;
		    color:#333;
		    text-decoration:none;
		  }

		  a[href]:after {
		    content: "" !important;
		  }

		  a[href^="http://"] {
		    color:#000;
		  }

		  ul li{
		  	font-size: 18px;
		  }

		  #header {
		    height:75px;
		    font-size: 24pt;
		    color:black
		  }

		.table td, .table th{
		  	font-size: 20px !important;
		  }
		}
	</style>
</head>

<?php
	
	include "config/koneksi.php";

	$query = "SELECT * FROM sis_mekanik WHERE id_mekanik='".$_GET['id']."'";
	$sql = mysqli_query($connect,$query);

	$data_mekanik = mysqli_fetch_array($sql,MYSQLI_ASSOC);

?>

<body onload="window.print();history.back();">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2><center>Laporan Hasil Ujian Mekanik</center></h2></div>
			<div class="col-md-12">
				<ul>
					<li>Detail Mekanik</li>
				</ul>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th width="30%">NRP</th>
							<th width="1%">:</th>
							<td><?php echo $data_mekanik['nrp'];?></td>
						</tr>

						<tr>
							<th>Nama</th>
							<th>:</th>
							<td><?php echo $data_mekanik['nama'];?></td>
						</tr>

						<tr>
							<th>Level</th>
							<th>:</th>
							<td><?php echo $data_mekanik['level'];?></td>
						</tr>

						<tr>
							<th>Nama</th>
							<th>:</th>
							<td><?php echo $data_mekanik['section'];?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<?php 

			$query = "SELECT a.*,b.* FROM sis_participant a LEFT JOIN sis_assessment b ON a.id_assessment=b.id_assessment WHERE a.id_mekanik='".$_GET['id']."' ORDER BY tanggal_assign DESC";
			$sql = mysqli_query($connect,$query);


		?>

		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>Detail Assessment</li>
				</ul>
				<?php while($data_assign = mysqli_fetch_array($sql,MYSQLI_ASSOC)){ ?>
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th width="30%">Type</th>
								<th width="1%">:</th>
								<td><?php echo ($data_assign['type']==1 ? "POWERTRAIN" : "ENGINE");?></td>
							</tr>

							<tr>
								<th>Kode Assessment</th>
								<th>:</th>
								<td><?php echo $data_assign['kode'];?></td>
							</tr>

							<tr>
								<th><?php echo ($data_assign['type']==1 ? "Unit" : "Seri Engine");?></th>
								<th>:</th>
								<td><?php echo $data_assign['object'];?></td>
							</tr>

							<tr>
								<th>Produk</th>
								<th>:</th>
								<td><?php echo $data_assign['produk'];?></td>
							</tr>

							<tr>
								<th><?php echo ($data_assign['type']==1 ? "ID Unit" : "Engine");?></th>
								<th>:</th>
								<td><?php echo $data_assign['id_object'];?></td>
							</tr>

							<tr>
								<th><?php echo ($data_assign['type']==1 ? "Unit" : "Seri Engine");?></th>
								<th>:</th>
								<td><?php echo $data_assign['object'];?></td>
							</tr>

							<tr>
								<th>Tanggal Assign</th>
								<th>:</th>
								<td><?php echo date('d-m-Y', strtotime($data_assign['tanggal_assign']));?></td>
							</tr>

							<tr>
								<th>Status Ujian Teori</th>
								<th>:</th>
								<td><?php echo ($data_assign['status_assign']==1 ? "Finish" : "Expired");?></td>
							</tr>

							<tr>
								<th>Nilai Teori</th>
								<th>:</th>
								<td><?php echo $data_assign['nilai_teori'];?></td>
							</tr>

							<tr>
								<th>Nilai Praktek</th>
								<th>:</th>
								<td><?php echo $data_assign['nilai_praktek'];?></td>
							</tr>
						</tbody>
					</table>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>