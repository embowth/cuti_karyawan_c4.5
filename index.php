  <?php
  date_default_timezone_set("Asia/Bangkok");
  session_start();
  include "config/koneksi.php";

  if(!isset($_SESSION['login'])){
    header("location:".$base_url."/login.php");
  }

  $page = '';
  if(isset($_GET['p'])){
    $page = $_GET['p'];
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo ($page=="m_rk" ? "Rekap - Tanggal cetak : ".date('d-m-Y') : "Manajemen Cuti Karyawan");?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/datepicker.css" />
    <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link rel="stylesheet" href="css/jquery.gritter.css" />
    <link rel="stylesheet" href="js/datatables/extensions/select/css/select.jqueryui.min.css" />
    <link rel="stylesheet" href="css/metro/easyui.css" />
    <link rel="stylesheet" href="css/timeline.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="js/daterangepicker-master/daterangepicker.css" />

    <script src="js/jquery.min.js"></script> 
    <script src="js/jquery.ui.custom.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.uniform.js"></script> 
    <script src="js/select2.min.js"></script> 
    <script src="js/jquery.gritter.min.js"></script> 
    <script src="js/datatables/media/js/jquery.dataTables.min.js"></script> 
    <script src="js/datatables/extensions/Select/js/dataTables.select.min.js"></script> 
    <script src="js/matrix.js"></script> 
    <script src="js/jquery.easyui.min.js"></script> 
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/bootstrap-timepicker.min.js"></script> 
    <script src="js/moment.min.js"></script> 
    <script src="js/daterangepicker-master/daterangepicker.js"></script> 

    <style>
      .datepicker{
        z-index:999999;
      }
    </style>

  </head>
  <body>

    <!--Header-part-->
    <div id="header">
      <h4><a href="<?php echo $base_url;?>">Cuti Karyawan</a></h4>
    </div>
    <!--close-Header-part--> 


    <!-- top header menu and search -->
    <?php include "top_header.php"; ?>
    <!-- end top header menu and search -->

    <!--sidebar-menu-->
    <?php include "sidebar_menu.php";?>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
      <?php 


        if($page=='') include "blank_page.php";
        elseif($page=='m_dv') include "divisi_manage.php";
        elseif($page=='m_jb') include "jabatan_manage.php";
        elseif($page=='m_jc') include "jenis_cuti_manage.php";
        elseif($page=='m_kw') include "karyawan_manage.php";
        elseif($page=='log_acc') include "akun_login.php";
        elseif($page=='c_app') include "pengajuan_cuti.php";
        elseif($page=='lc_app') include "list_pengajuan_cuti.php";
        elseif($page=='gl_us') include "golongan_usia.php";
        elseif($page=='pc') include "prediksi_cuti.php";
        elseif($page=='pfl') include "profile.php";
        elseif($page=='gr_app') include "grafik_cuti.php";

      ?>
    </div>

    <!--end-main-container-part-->

    <!--Footer-part-->

    <div class="row-fluid">
      <!-- <div id="footer" class="span12"> <?php echo date('Y');?> &copy; Sistem Manajemen Cuti </div> -->
    </div>

  <!--end-Footer-part-->

    

  </body>
  <script>
    
    $('.datepicker').datepicker({
      autoClose:true
    });
    $('.timepicker').timepicker({
      maxHours:24,
      showMeridian:false
    });
  </script>
</html>
