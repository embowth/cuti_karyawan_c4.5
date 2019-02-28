<?php  
    date_default_timezone_set("Asia/Bangkok");
    include "config/koneksi.php";

    if($_POST['action']=='check'){

        $nik = $_POST['nik'];
        
        $query = "SELECT * FROM `ct_karyawan` WHERE nik='$nik'";
        $sql = mysqli_query($connect,$query) or die(mysqli_error());

        $count = mysqli_num_rows($sql);
       
        if($count>0){
            $res = mysqli_fetch_array($sql,MYSQLI_ASSOC);
            //print_r($res);
            echo json_encode(array('result'=>true,'data'=>$res));
            return;
        }

        echo json_encode(array('result'=>false));
        return;
    }

   if($_POST['action']=='save'){

       $tanggal = explode(" - ", $_POST['tanggal_cuti']); 


       $id_karyawan = $_POST['id_karyawan'];
       $jenis_cuti = $_POST['jenis_cuti'];
       $mulai_cuti = date('Y-m-d',strtotime($tanggal[0]));
       $selesai_cuti = date('Y-m-d',strtotime($tanggal[1]));
       $alasan_cuti = $_POST['alasan_cuti'];

        $year = date('Y');
        $id = $_POST['id_karyawan'];
        $query = "SELECT count(*) as cuti FROM ct_cuti WHERE YEAR(tgl_mulai)='$year' AND id_karyawan='$id' AND status_cuti=1 AND approval_kabag=1";
        $sql = mysqli_query($connect, $query);
        $cuti = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $sisa = 12-$cuti['cuti'];

        
        $earlier = new DateTime($mulai_cuti);
        $later = new DateTime($selesai_cuti);

        $diff = $later->diff($earlier)->format("%a");
    

        if($cuti['cuti']>=12 || $diff>$sisa){
            echo json_encode(array('result'=>false,'title'=>"Pengajuan Cuti",'msg'=>"Gagal mebuat pengajuan cuti, Jatah Cuti Tahunan Tidak Mencukupi"));
            return;
        }


        $tgl = date('Y-m-d');

        if(strlen($id_karyawan) == 0 || strlen($jenis_cuti) == 0 || strlen($mulai_cuti) == 0 || strlen($selesai_cuti) == 0 || strlen($alasan_cuti) == 0){
            echo json_encode(array('result'=>false,'title'=>"Pengajuan Cuti",'msg'=>"Gagal mebuat pengajuan cuti, isi form yang telah disediakan"));
            return;
        }

        $query = "INSERT INTO ct_cuti (id_karyawan,jenis_cuti,tgl_pengajuan,tgl_mulai,tgl_selesai,alasan_cuti) VALUES ('$id_karyawan','$jenis_cuti','$tgl','$mulai_cuti','$selesai_cuti','$alasan_cuti')";
        $sql = mysqli_query($connect, $query);

        if($sql){
            echo json_encode(array('result'=>true,'title'=>"Pengajuan Cuti",'msg'=>"Berhasil mebuat pengajuan cuti"));
        }else{
            echo json_encode(array('result'=>false,'title'=>"Pengajuan Cuti",'msg'=>"Gagal mebuat pengajuan cuti"));

        }
        return;

   }
?>