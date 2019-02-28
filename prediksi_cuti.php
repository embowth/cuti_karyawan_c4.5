<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=pc" title="Data Jabatan" class="tip-bottom"><i class="icon-user"></i> Prediksi Cuti</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->

<?php
    $bln_mulai = '';
    $bln_selesai = '';
    $thn_mulai = '';
    $thn_selesai = '';
    if(isset($_GET['pre'])){
        $bln_mulai = $_GET['bulan_mulai'];
        $bln_selesai = $_GET['bulan_selesai'];
        $thn_mulai = $_GET['tahun_mulai'];
        $thn_selesai = $_GET['tahun_selesai'];

        $t_mulai = $thn_mulai."-".$bln_mulai."-01";
        $t_selesai = $thn_selesai."-".$bln_selesai."-".cal_days_in_month(CAL_GREGORIAN,$bln_selesai,$thn_selesai);
        
    }
     
     
?>
<div class="container-fluid">
    <div class="row-fluid add_form_content">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-plus"></i></span>
                        <h5>Prediksi Cuti</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" id="form-add">
                            <div class="control-group">
                                <label class="control-label">Bulan Mulai</label>
                                <div class="controls">
                                    <select name="bulan_mulai" class="span5">
                                        <option value="" <?php echo ($bln_mulai=='' ? 'selected' : '');?> >Pilih Bulan</option>
                                        <option value="1" <?php echo ($bln_mulai=='1' ? 'selected' : '');?> >Januari</option>
                                        <option value="2" <?php echo ($bln_mulai=='2' ? 'selected' : '');?> >Februari</option>
                                        <option value="3" <?php echo ($bln_mulai=='3' ? 'selected' : '');?> >Maret</option>
                                        <option value="4" <?php echo ($bln_mulai=='4' ? 'selected' : '');?> >April</option>
                                        <option value="5" <?php echo ($bln_mulai=='5' ? 'selected' : '');?> >Mei</option>
                                        <option value="6" <?php echo ($bln_mulai=='6' ? 'selected' : '');?> >Juni</option>
                                        <option value="7" <?php echo ($bln_mulai=='7' ? 'selected' : '');?> >Juli</option>
                                        <option value="8" <?php echo ($bln_mulai=='8' ? 'selected' : '');?> >Agustus</option>
                                        <option value="9" <?php echo ($bln_mulai=='9' ? 'selected' : '');?> >September</option>
                                        <option value="10" <?php echo ($bln_mulai=='10' ? 'selected' : '');?> >Oktober</option>
                                        <option value="11" <?php echo ($bln_mulai=='11' ? 'selected' : '');?> >November</option>
                                        <option value="12" <?php echo ($bln_mulai=='12' ? 'selected' : '');?> >Desember</option>
                                    </select>

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Tahun Mulai</label>
                                <div class="controls">
                                    <input type="text" class="span5" name="tahun_mulai" value="<?php echo ($thn_mulai=='' ? date('Y', strtotime('-1 Years')) : $thn_mulai);?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Bulan Selesai</label>
                                <div class="controls">
                                    <select name="bulan_selesai" class="span5">
                                        <option value="" <?php echo ($bln_selesai=='' ? 'selected' : '');?> >Pilih Bulan</option>
                                        <option value="1" <?php echo ($bln_selesai=='1' ? 'selected' : '');?> >Januari</option>
                                        <option value="2" <?php echo ($bln_selesai=='2' ? 'selected' : '');?> >Februari</option>
                                        <option value="3" <?php echo ($bln_selesai=='3' ? 'selected' : '');?> >Maret</option>
                                        <option value="4" <?php echo ($bln_selesai=='4' ? 'selected' : '');?> >April</option>
                                        <option value="5" <?php echo ($bln_selesai=='5' ? 'selected' : '');?> >Mei</option>
                                        <option value="6" <?php echo ($bln_selesai=='6' ? 'selected' : '');?> >Juni</option>
                                        <option value="7" <?php echo ($bln_selesai=='7' ? 'selected' : '');?> >Juli</option>
                                        <option value="8" <?php echo ($bln_selesai=='8' ? 'selected' : '');?> >Agustus</option>
                                        <option value="9" <?php echo ($bln_selesai=='9' ? 'selected' : '');?> >September</option>
                                        <option value="10" <?php echo ($bln_selesai=='10' ? 'selected' : '');?> >Oktober</option>
                                        <option value="11" <?php echo ($bln_selesai=='11' ? 'selected' : '');?> >November</option>
                                        <option value="12" <?php echo ($bln_selesai=='12' ? 'selected' : '');?> >Desember</option>
                                    </select>
                                    <input type="hidden" name="pre" value="1">
                                    <input type="hidden" name="p" value="pc">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Tahun Selesai</label>
                                <div class="controls">
                                    <input type="text" class="span5" name="tahun_selesai" value="<?php echo ($thn_selesai == '' ? date('Y') : $thn_selesai);?>">
                                </div>
                            </div>

                            <div class="form-actions">
                                <center>
                                    <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Submit</button>
                                    <button type="button" class="btn" style="margin-left: 10px;" onclick="hideAddForm()"><i class="icon-remove"></i> Cancel</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 

        if(isset($_GET['pre'])){

            $bulan_mulai = $_GET['bulan_mulai'];
            $bulan_selesai = $_GET['bulan_selesai'];

            $tahun_mulai = $_GET['tahun_mulai'];
            $tahun_selesai = $_GET['tahun_selesai'];

            $query1 = "SELECT * FROM ct_karyawan WHERE kd_jabatan > 2 AND kd_divisi > 1";
            $sql1 = mysqli_query($connect,$query1);

            $count_karyawan = mysqli_num_rows($sql1);

            $query2 = "SELECT a.id_karyawan, count(*) as total_cuti FROM ct_cuti a  
                        LEFT JOIN ct_karyawan b ON a.id_karyawan = b.id_karyawan
                        WHERE
                        (a.tgl_mulai >= '$t_mulai' AND a.tgl_mulai < '$t_selesai')
                        AND b.kd_jabatan > 2
                        AND b.kd_divisi > 1
                        AND a.jenis_cuti='2'
                        GROUP BY a.id_karyawan ORDER BY a.tgl_pengajuan ASC";

            // $query2 = "SELECT a.id_karyawan, COUNT(*) as total_cuti FROM ct_karyawan a
            //             LEFT JOIN ct_cuti b ON a.id_karyawan = b.id_karyawan AND b.tgl_mulai >= '2018-9-01' AND b.tgl_mulai < '2019-8-31'
            //             WHERE
            //             a.kd_divisi > 1 AND
            //             a.kd_jabatan > 2
            //             GROUP BY a.id_karyawan";
            $sql2 = mysqli_query($connect, $query2);

            // echo $query2;

            $stat = array(
                0 => 0,
                1 => 0,
            );

            // echo $query2;
            
            while($result = mysqli_fetch_array($sql2, MYSQLI_ASSOC)){
                
                if($result['total_cuti'] >= 0 && $result['total_cuti'] < 7){
                    $stat[0]++;
                }else{
                    $stat[1]++;
                }
            }

            $count_cuti = $stat[0];
            $count_sisa = $stat[1];

            // echo $query2;

            //$count_cuti = mysqli_num_rows($sql2);

            $query3 = "SELECT * FROM ct_divisi WHERE kd_divisi > 1";
            $sql3 = mysqli_query($connect, $query3);

            
            if(true){
                
    
                
                //$log2 = log($count_cuti/$count_karyawan,2);
                

    ?>

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                    <h5></h5>
                </div>
                <div class="widget-content nopadding"> 
                    

                <table class="table table-striped table-hover table-bordered" id="table_pre">
                    <thead>
                        <tr>
                            <th>Node</th>
                            <th >Atribut</th>
                            <th width="200px">Nilai Atribut</th>
                            <th>Jumlah Kasus Total</th>
                            <th>Prioritas</th>
                            <th>Tidak Prioritas</th>
                            <th>Entropi</th>
                            <th>Gain</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th><?php echo $count_karyawan;?></th>
                            <th><?php echo $count_cuti;?></th>
                            <th><?php echo $count_sisa;?></th>
                            <th>
                                <?php
                                    $entropi_global =  (-$count_cuti/$count_karyawan)*log($count_cuti/$count_karyawan,2);
                                    $entropi_global = $entropi_global+(-$count_sisa/$count_karyawan)*log($count_sisa/$count_karyawan,2);
                                    // var_dump($entropi_global)   ;
                                    echo number_format($entropi_global,4,',','.');
                                ?>
                            </th>
                            <th></th>
                        <tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td></td>
                            <td>Gender</td>
                            <td>
                                <?php
                                    $q = "SELECT jenis_kelamin,COUNT(*) as jumlah_jk FROM ct_karyawan WHERE kd_jabatan > 2 AND kd_divisi > 1 GROUP BY jenis_kelamin";
                                    $sg = mysqli_query($connect,$q);
                                    // echo $q;
                                    
                                    $jumlah_jk = array();
                                    while($data = mysqli_fetch_array($sg,MYSQLI_ASSOC)){
                                        echo "<p>";
                                        array_push($jumlah_jk, $data['jumlah_jk']);
                                        if($data['jenis_kelamin']==1){
                                            echo "Laki-laki";
                                        }else{
                                            echo "Perempuan";
                                        } 
                                        echo "</p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        echo "<p class='text-center'>";
                                        echo $jumlah_jk[$i];
                                        echo "</p>";
                                    }
                                ?>
                            </td>
                            <?php
                                $q = "SELECT
                                            b.jenis_kelamin,
                                            COUNT(*) AS jumlah_jk
                                        FROM
                                            ct_cuti a
                                        LEFT JOIN ct_karyawan b ON
                                            a.id_karyawan = b.id_karyawan
                                        LEFT JOIN ct_divisi c ON
                                            b.kd_divisi = c.kd_divisi
                                        WHERE
                                            a.jenis_cuti = '2' AND b.kd_jabatan > 2 AND b.kd_divisi > 1 AND
                                            a.tgl_mulai >= '$t_mulai' AND a.tgl_mulai < '$t_selesai'
                                        GROUP BY
                                            b.jenis_kelamin, a.id_karyawan";
                                $sc = mysqli_query($connect,$q);

                                $stat = array(
                                    0 => array(
                                       0 => 0,
                                       1 => 0,
                                    ),
                                    1 => array(
                                        0 => 0,
                                        1 => 0,
                                    )
                                );
                                
                               
                                    
                                    
                                while($result = mysqli_fetch_array($sc, MYSQLI_ASSOC)){
                                    if($result['jumlah_jk'] >= 0 && $result['jumlah_jk'] < 7){
                                        
                                        if($result['jenis_kelamin']== 1){
                                            $stat[0][0]++;
                                        }else{
                                            $stat[0][1]++;
                                        }

                                    }else{
                                        if($result['jenis_kelamin']== 1){
                                            $stat[1][0]++;
                                        }else{
                                            $stat[1][1]++;
                                        }
                                    }
                                }
                                    
                                    
                                

                                // print_r($stat);
                                
                                // echo $q;
                            ?>
                            <td>
                                <?php

                                    $jumlah_jk_ct = array();
                                    foreach ($stat[0] as $key => $value) {
                                        echo "<p class='text-center'>";
                                        array_push($jumlah_jk_ct, $value);
                                        echo $value;
                                        echo "</p>";
                                    }
                                
                                ?>
                            </td>
                            <td>
                                <?php
                                    $jumlah_jk_sisa = array();
                                      foreach ($stat[1] as $key => $value) {
                                        echo "<p class='text-center'>";
                                        array_push($jumlah_jk_sisa, $value);
                                        echo $value;
                                        echo "</p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $jumlah_entropi = array();
                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        echo "<p class='text-center'>";
                                        $entropi =  (-$jumlah_jk_ct[$i]/$jumlah_jk[$i])*log($jumlah_jk_ct[$i]/$jumlah_jk[$i],2);
                                        $entropi = $entropi+(-$jumlah_jk_sisa[$i]/$jumlah_jk[$i])*log($jumlah_jk_sisa[$i]/$jumlah_jk[$i],2);
                                        
                                        echo (!is_nan($entropi) ? number_format($entropi,4,',','.') : 0 );
                                        echo "</p>";
                                        array_push($jumlah_entropi,$entropi);
                                    }
                                ?>


                            </td>
                            <td>
                                <?php
                                    
                                    $temp_gain = 0;

                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        $jml_ent = (is_nan($jumlah_entropi[$i]) ? 0 : $jumlah_entropi[$i]);
                                        $p = number_format( (($jumlah_jk[$i]/$count_karyawan)*$jml_ent),'4','.',',' );     
                                        // echo $p."<br>";
                                        $temp_gain = $temp_gain+$p;
                                    }
                                    $gain = $entropi_global-$temp_gain;
                                    
                                    echo "<p>";
                                    echo "<br>";
                                    echo number_format($gain,4,',','.');
                                    echo "</p>";
                                
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>Divisi</td>
                            <td>
                                <?php
                                    $q = "SELECT b.kd_divisi, b.nama_divisi, COUNT(*) as jumlah_jk FROM ct_karyawan a
                                            LEFT JOIN ct_divisi b ON a.kd_divisi = b.kd_divisi
                                            WHERE b.kd_divisi > 1
                                            GROUP BY b.kd_divisi ORDER BY b.kd_divisi ASC";
                                    $sg = mysqli_query($connect,$q);
                                    
                                    $jumlah_jk = array();
                                    $kd_div = array();
                                    while($data = mysqli_fetch_array($sg,MYSQLI_ASSOC)){
                                        echo "<p>";
                                        array_push($jumlah_jk, $data['jumlah_jk']);
                                        array_push($kd_div, $data['kd_divisi']);
                                        echo $data['nama_divisi'];
                                        echo "</p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        echo "<p class='text-center'>";
                                        echo $jumlah_jk[$i];
                                        echo "</p>";
                                    } 
                                ?>
                            </td>
                            <?php
                                $q = "SELECT
                                    a.id_karyawan,
                                    b.kd_divisi,
                                    COUNT(*) as total_div
                                FROM
                                    ct_cuti a
                                LEFT JOIN ct_karyawan b ON
                                    a.id_karyawan = b.id_karyawan
                                WHERE
                                    a.jenis_cuti = '2' AND b.kd_jabatan > 2 AND b.kd_divisi > 1 AND 
                                    a.tgl_mulai >= '$t_mulai' AND a.tgl_mulai < '$t_selesai'
                                GROUP BY
                                    b.kd_divisi, a.id_karyawan
                                ORDER BY b.kd_divisi ASC";
                                $sc = mysqli_query($connect,$q);

                                $stat = array(
                                    0 => array(
                                        
                                    ),
                                    1 => array(

                                    )
                                );

                                foreach ($kd_div as $key => $value) {
                                    array_push($stat[0],0);
                                    array_push($stat[1],0);
                                }
                                
                                // echo $q;
                               
                                    
                                
                                while($result = mysqli_fetch_array($sc, MYSQLI_ASSOC)){
                                    foreach ($kd_div as $key => $value) {
                                        
                                        if($value == $result['kd_divisi']){

                                            if($result['total_div'] >= 0 && $result['total_div'] < 7){
                                                
                                                if(!isset($stat[0][$key])){
                                                    $stat[0][$key] = 0;
                                                }

                                                $stat[0][$key]++;
                                            
                                            }else{

                                                if(!isset($stat[1][$key])){
                                                    $stat[1][$key] = 0;
                                                }
                                                $stat[1][$key]++;
                                            
                                            }

                                        }

                                    }
                                }

                                // echo "<pre>";
                                // print_r($stat);
                                // echo "</pre>";
                            ?>
                            <td>
                                <?php

                                    $jumlah_jk_ct = array();
                                    foreach ($kd_div as $key => $value) {
                                        echo "<p class='text-center'>";
                                        if(isset($stat[0][$key])){
                                            echo $val = $stat[0][$key];
                                            
                                        }else{
                                            echo $val = 0;
                                        }

                                        array_push($jumlah_jk_ct, $val);
                                        echo "</p>";
                                    }
                                
                                ?>
                            </td>
                            <td>
                                <?php
                                    $jumlah_jk_sisa = array();
                                    foreach ($stat[1] as $key => $value) {
                                        echo "<p class='text-center'>";
                                        array_push($jumlah_jk_sisa, $value);
                                        echo $value;
                                        echo "</p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $jumlah_entropi = array();
                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        echo "<p class='text-center'>";
                                        $entropi =  (-$jumlah_jk_ct[$i]/$jumlah_jk[$i])*log($jumlah_jk_ct[$i]/$jumlah_jk[$i],2);
                                        $entropi = $entropi+(-$jumlah_jk_sisa[$i]/$jumlah_jk[$i])*log($jumlah_jk_sisa[$i]/$jumlah_jk[$i],2);
                                        $ent =  (is_nan($entropi) ? 0 : $entropi);
                                        echo ($ent==0 ? 0 :number_format($ent,4,',','.'));
                                        echo "</p>";
                                        array_push($jumlah_entropi,$entropi);
                                    }
                                ?>


                            </td>
                            <td>
                                <?php
                                    
                                    $temp_gain = 0;

                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        $jml_ent = (is_nan($jumlah_entropi[$i]) ? 0 : $jumlah_entropi[$i]);
                                        $p = number_format( (($jumlah_jk[$i]/$count_karyawan)*$jml_ent),'4','.',',' );     
                                        // echo $p."<br>";
                                        $temp_gain = $temp_gain+$p;
                                    }
                                    $gain = $entropi_global-$temp_gain;
                                    
                                    echo "<p>";
                                    echo "<br>";
                                    echo number_format($gain,4,',','.');
                                    echo "</p>";
                                
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>Golongan Usia</td>
                            <td>
                                <?php
                                    $q = "SELECT a.nama_golongan, count(a.id_karyawan) as jumlah_jk
                                    FROM (SELECT b.id_karyawan, b.nik, c.id_golongan, c.nama_golongan, c.minimum_usia, b.kd_jabatan, b.kd_divisi, (SELECT TIMESTAMPDIFF(YEAR, b.tanggal_lahir, CURDATE())) as age FROM ct_karyawan b, ct_golongan_usia c WHERE (SELECT TIMESTAMPDIFF(YEAR, b.tanggal_lahir, CURDATE()) BETWEEN c.minimum_usia AND c.maksimum_usia) ORDER BY c.id_golongan ASC) a WHERE a.kd_jabatan > 2 AND a.kd_divisi > 1 GROUP BY a.id_golongan";
                                    $sg = mysqli_query($connect,$q);
                                    
                                    $jumlah_jk = array();
                                    while($data = mysqli_fetch_array($sg,MYSQLI_ASSOC)){
                                        echo "<p>";
                                        array_push($jumlah_jk, $data['jumlah_jk']);
                                        echo $data['nama_golongan'];
                                        echo "</p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        echo "<p class='text-center'>";
                                        echo $jumlah_jk[$i];
                                        echo "</p>";
                                    }
                                ?>
                            </td>
                            <?php
                                $q = "SELECT
                                            a.nama_golongan,
                                            COUNT(b.id_karyawan) AS jml_gol
                                        FROM
                                            ct_golongan_usia a
                                        LEFT JOIN(
                                            SELECT
                                                c.id_cuti,
                                                c.id_karyawan,
                                                c.jenis_cuti,
                                                c.tgl_mulai,
                                                d.nik,
                                                d.tanggal_lahir,
                                                d.kd_jabatan,
                                                d.kd_divisi
                                            FROM
                                                ct_cuti c
                                            LEFT JOIN ct_karyawan d ON
                                                c.id_karyawan = d.id_karyawan
                                        ) b
                                        ON
                                            (
                                            SELECT
                                                TIMESTAMPDIFF(
                                                    YEAR,
                                                    b.tanggal_lahir,
                                                    CURDATE())
                                                ) BETWEEN a.minimum_usia AND a.maksimum_usia AND b.jenis_cuti = 2
                                            WHERE b.tgl_mulai >= '$t_mulai' AND b.tgl_mulai < '$t_selesai'                                            
                                            AND b.kd_jabatan > 2
                                            AND b.kd_divisi > 1
                                            GROUP BY
                                                a.id_golongan, b.id_karyawan
                                            ORDER BY
                                                a.id_golongan ASC";
                                $sc = mysqli_query($connect,$q);

                                $stat = array(
                                    0 => array(
                                        0 => 0,
                                        1 => 0,
                                        2 => 0
                                    ),
                                    1 => array(
                                        0 => 0,
                                        1 => 0,
                                        2 => 0
                                    ),
                                    
                                );
                                
                                // echo $q;
                               
                                    
                                
                                while($result = mysqli_fetch_array($sc, MYSQLI_ASSOC)){
                                        
                                        
                                    

                                    if($result['jml_gol'] >= 0 && $result['jml_gol'] < 7){
                                        
                                        if($result['nama_golongan'] == "Golongan 1"){
                                            $stat[0][0]++;
                                        }else if($result['nama_golongan'] == "Golongan 2"){
                                            $stat[0][1]++;
                                            
                                        }else{
                                            
                                            $stat[0][2]++;
                                        }

                                        
                                    
                                    }else{

                                        if($result['nama_golongan'] == "Golongan 1"){
                                            $stat[1][0]++;
                                        }else if($result['nama_golongan'] == "Golongan 2"){
                                            $stat[1][1]++;
                                            
                                        }else{
                                            
                                            $stat[1][2]++;
                                        }
                                    
                                    }

                                    

                                    
                                }
                            ?>
                            <td>
                                <?php

                                    $jumlah_jk_ct = array();
                                    foreach ($stat[0] as $key => $value) {
                                        echo "<p class='text-center'>";
                                        array_push($jumlah_jk_ct, $value);
                                        echo $value;
                                        echo "</p>";
                                    }
                                
                                ?>
                            </td>
                            <td>
                                <?php
                                    $jumlah_jk_sisa = array();
                                    foreach ($stat[1] as $key => $value) {
                                        echo "<p class='text-center'>";
                                        array_push($jumlah_jk_sisa, $value);
                                        echo $value;
                                        echo "</p>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $jumlah_entropi = array();
                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        echo "<p class='text-center'>";
                                        $entropi =  (-$jumlah_jk_ct[$i]/$jumlah_jk[$i])*log($jumlah_jk_ct[$i]/$jumlah_jk[$i],2);
                                        $entropi = $entropi+(-$jumlah_jk_sisa[$i]/$jumlah_jk[$i])*log($jumlah_jk_sisa[$i]/$jumlah_jk[$i],2);
                                        $ent =  (is_nan($entropi) ? 0 : $entropi);
                                        echo ($ent==0 ? 0 :number_format($ent,4,',','.'));
                                        echo "</p>";
                                        array_push($jumlah_entropi,$entropi);
                                    }
                                ?>


                            </td>
                            <td>
                                <?php
                                    
                                    $temp_gain = 0;

                                    

                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        $jml_ent = (is_nan($jumlah_entropi[$i]) ? 0 : $jumlah_entropi[$i]);
                                        $p = number_format( (($jumlah_jk[$i]/$count_karyawan)*$jml_ent),'4','.',',' );     
                                        // echo $p."<br>";
                                        $temp_gain = $temp_gain+$p;
                                    }
                                    $gain = $entropi_global-$temp_gain;
                                    
                                    echo "<p>";
                                    echo "<br>";
                                    echo number_format($gain,4,',','.');
                                    echo "</p>";
                                
                                ?>
                            </td>
                        </tr>

                         <tr>
                            <td></td>
                            <td>Jumlah Ambil Cuti</td>
                            <td>
                                <p>1-4</p> 
                                <p>5-8</p>
                                <p>9-12</p>
                            </td>
                            <td>
                                <?php
                                    

                                    $query = "SELECT b.id_karyawan, count(*) as total_cuti FROM ct_cuti a 
                                                LEFT JOIN ct_karyawan b ON a.id_karyawan = b.id_karyawan
                                                WHERE a.tgl_mulai >= '$t_mulai' AND a.tgl_mulai < '$t_selesai'
                                                AND b.kd_divisi > 1
                                                AND b.kd_jabatan > 2
                                                GROUP BY a.id_karyawan";
                                    $sql = mysqli_query($connect, $query);
                                    
                                    // echo $query;                                    
                                    $data_cuti = array(

                                        0  => 0,
                                        1  => 0,
                                        2  => 0,

                                    );

                                    $stat = array(
                                        0 => array(
                                            0 => 0,
                                            1 => 0,
                                            2 => 0,
                                        ),
                                        1 => array(
                                            0 => 0,
                                            1 => 0,
                                            2 => 0,
                                        ),
                                        
                                    );

                                    while($dct = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                        if($dct['total_cuti'] > 8){
                                            $data_cuti[2] += 1;
                                        }else if($dct['total_cuti'] > 4){
                                            $data_cuti[1] += 1;
                                        }else{
                                            $data_cuti[0] += 1;
                                        }

                                        
                                        if($dct['total_cuti'] >= 0 && $dct['total_cuti'] < 7){

                                            if($dct['total_cuti'] > 8){
                                                $stat[0][2]++;
                                            }else if($dct['total_cuti'] > 4){
                                                $stat[0][1]++;
                                            }else{
                                                $stat[0][0]++;
                                            }                                            
                                        
                                        }else{

                                            if($dct['total_cuti'] > 8){
                                                $stat[1][2]++;
                                            }else if($dct['total_cuti'] > 4){
                                                $stat[1][1]++;
                                            }else{
                                                $stat[1][0]++;
                                            } 
                                        
                                        }
                                    }

                                    //  $stat[0][1] = CEIL($stat[0][1]/2);
                                    //  $stat[0][2] = 0;

                                    //  $stat[1][0] = 0;
                                    //  $stat[1][1] = FLOOR($stat[1][1]/2);
                                ?>

                                
                                    <center>
                                        <?php 

                                            echo "<p>".$data_cuti[0]."</p>";
                                            echo "<p>".$data_cuti[1]."</p>";
                                            echo "<p>".$data_cuti[2]."</p>";
                                        ?>
                                    </center>
                                
                                    
                            </td>
                            <td>
                                    
                                    
                                        <?php

                                            $jumlah_jk_ct = array();
                                            foreach ($stat[0] as $key => $value) {
                                                echo "<p class='text-center'>";
                                                array_push($jumlah_jk_ct, $value);
                                                echo $value;
                                                echo "</p>";
                                            }
                                        ?>
                                    
                            
                            </td>
                            <td>
                                
                                
                                    <?php

                                            $jumlah_jk_sisa = array();
                                            foreach ($stat[1] as $key => $value) {
                                                echo "<p class='text-center'>";
                                                array_push($jumlah_jk_sisa, $value);
                                                echo $value;
                                                echo "</p>";
                                            }
                                        ?>
                                
                            </td>
                            <td>
                                <center>
                                <?php 
                                    $jumlah_entropi = array();
                                    for($i=0;$i<count($jumlah_jk);$i++){
                                        echo "<p class='text-center'>";

                                        if($data_cuti[$i] == 0){
                                            echo $ent = 0;
                                        }else{
                                            $entropi =  (-$jumlah_jk_ct[$i]/$data_cuti[$i])*log($jumlah_jk_ct[$i]/$data_cuti[$i],2);
                                            $entropi = $entropi+(-$jumlah_jk_sisa[$i]/$data_cuti[$i])*log($jumlah_jk_sisa[$i]/$data_cuti[$i],2);
                                            $ent =  (is_nan($entropi) ? 0 : $entropi);
                                            echo ($ent==0 ? 0 :number_format($ent,4,',','.'));
                                        }
                                        
                                        
                                        echo "</p>";
                                        array_push($jumlah_entropi,$entropi);
                                    }
                                ?>

                                </center>
                            </td>
                            <td>
                                <?php
                                    
                                    $temp_gain = 0;

                                    for($i=0;$i<count($data_cuti);$i++){
                                        $jml_ent = (is_nan($jumlah_entropi[$i]) ? 0 : $jumlah_entropi[$i]);
                                        $p = number_format( (($data_cuti[$i]/$count_karyawan)*$jml_ent),'4','.',',' );     
                                        // echo $p."<br>";
                                        $temp_gain = $temp_gain+$p;
                                    }
                                    $gain = $entropi_global-$temp_gain;
                                    
                                    echo "<p>";
                                    echo "<br>";
                                    echo number_format($gain,4,',','.');
                                    echo "</p>";
                                
                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>

                    <br>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <h3><center>Tidak ada data yang dapat diolah!</center></h3>
    <?php }} ?>
</div>