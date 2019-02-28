<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=m_sl" title="Data Soal" class="tip-bottom"><i class="icon-file"></i>Paket Soal</a>    	
    	<a href="<?php echo $base_url;?>/?p=p_sl&id=<?php echo $_GET['id'];?>" title="Detail Peserta" class="tip-bottom"><i class="icon-user"></i> Peserta Assessment</a>    	
    	<a href="javascript:;" title="Export sebagai excel" class="tip-bottom"><i class="icon-user"></i> Export Excel</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->

<div class="container-fluid">

	<div class="row-fluid">
		<div class="alert alert-info alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
		    <h4 class="alert-heading">Download File!</h4>
		    Dokumen anda telah di download dalam bentuk excel, <a href="?p=p_sl&id=<?php echo $_GET['id'];?>">klik disini untuk kembali</a>
		</div>	
	</div>
	
</div>