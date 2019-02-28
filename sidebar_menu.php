<?php  if($_SESSION['role']==1){ ?>

  <div id="sidebar"><a href="#" class="visible-phone"><i class="icon-list"></i> Menu</a>
    <ul>
      <li class="active"><a href="<?php echo $base_url;?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Data Umum</span> <span class="label label-success"><i class="icon-chevron-down"></i></span></a>
        <ul>
          <li><a href="?p=m_dv">Divisi</a></li>
          <li><a href="?p=m_jb">Jabatan</a></li>
          <li><a href="?p=m_jc">Jenis Cuti</a></li>
          <li><a href="?p=gl_us">Golongan Usia</a></li>
          <li><a href="?p=log_acc">Akun Login</a></li>
        </ul>
      </li>
      <li><a href="?p=m_kw"><i class="icon icon-user"></i> <span>Karyawan</span></a> </li>
      <li><a href="?p=c_app"><i class="icon icon-random"></i> <span>Pengajuan Cuti</span></a> </li>
      <li><a href="?p=lc_app"><i class="icon icon-list"></i> <span>List Pengajuan Cuti</span></a> </li>
      <li><a href="?p=gr_app"><i class="icon icon-align-center"></i> <span>Grafik Cuti</span></a> </li>
      <li><a href="?p=pc"><i class="icon icon-refresh"></i> <span>Prediksi Cuti</span></a> </li>
    </ul>
  </div>

<?php }else if ($_SESSION['role']==2){ ?>
  <div id="sidebar"><a href="#" class="visible-phone"><i class="icon-list"></i> Menu</a>
    <ul>
      <li class="active"><a href="<?php echo $base_url;?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li><a href="?p=c_app"><i class="icon icon-random"></i> <span>Pengajuan Cuti</span></a> </li>
      <li><a href="?p=lc_app"><i class="icon icon-list"></i> <span>List Pengajuan Cuti</span></a> </li>
    </ul>
  </div>
<?php }else if($_SESSION['role']==2){ ?>
  <div id="sidebar"><a href="#" class="visible-phone"><i class="icon-list"></i> Menu</a>
    <ul>
      <li class="active"><a href="<?php echo $base_url;?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li><a href="?p=c_app"><i class="icon icon-random"></i> <span>Pengajuan Cuti</span></a> </li>
      <li><a href="?p=lc_app"><i class="icon icon-list"></i> <span>List Pengajuan Cuti</span></a> </li>
    </ul>
  </div>
<?php }else if ($_SESSION['role']==3){ ?>
  <div id="sidebar"><a href="#" class="visible-phone"><i class="icon-list"></i> Menu</a>
    <ul>
      <li class="active"><a href="<?php echo $base_url;?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li><a href="?p=c_app"><i class="icon icon-random"></i> <span>Pengajuan Cuti</span></a> </li>
      <li><a href="?p=lc_app"><i class="icon icon-list"></i> <span>List Pengajuan Cuti</span></a> </li>
    </ul>
  </div>
<?php }else if($_SESSION['role']==4){ ?>
  <div id="sidebar"><a href="#" class="visible-phone"><i class="icon-list"></i> Menu</a>
    <ul>
      <li class="active"><a href="<?php echo $base_url;?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li><a href="?p=c_app"><i class="icon icon-random"></i> <span>Pengajuan Cuti</span></a> </li>
    </ul>
  </div>
<?php } ?>

