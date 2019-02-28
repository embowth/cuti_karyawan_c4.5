<style>

.bg_lb{
	color:white;
}

.quick-actions li{
	padding:10px 3px;
}
</style>

<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<div class="container-fluid">
	<div class="row-fluid">
	  <div class="span6">
			<div class="your-clock" style="padding-left:25px;margin-top:30px;"></div>
			
		</div>
		<div class="span6">
		<div class="quick-actions_homepage">
      <ul class="quick-actions">
				<?php $hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');?>
        <li class="bg_lb"><h1><?php echo $hari[date('N')];?></h1><a>Hari</a></li>
        <li class="bg_lb"><h1><?php echo date('d');?></h1><a>Tanggal</a></li>
        <li class="bg_lb"><h1><?php echo date('m');?></h1><a>Bulan</a></li>
        <li class="bg_lb"><h1><?php echo date('Y');?></h1><a>Tahun</a></li>

      </ul>
    </div>
		</div>
	</div>

	<br>
	<?php if(strtolower($_SESSION['username'])!='admin') include "dashboard_component.php"; ?>
</div>

<link rel="stylesheet" href="css/flipclock.css" />
<!-- <link rel="stylesheet" href="css/date.css" /> -->
<script src="js/flipclock.min.js"></script> 
<!-- <script src="js/date.js"></script>  -->

<script>
	var tbl_data;
	$(document).ready(function () {
			

		//Setup - add a text input to each footer cell
		// $('#tbl_mekanikthead th').each( function () {
		//     var title = $(this).text();
		//     $(this).html( title + '<br><input type="text" placeholder="Search '+title+'" />' );
		// } );

	});
	var clock = $('.your-clock').FlipClock({
		clockFace: 'TwentyFourHourClock'
	});
</script>