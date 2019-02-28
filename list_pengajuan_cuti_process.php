<?php
    date_default_timezone_set("Asia/Bangkok");
    include "config/koneksi.php";
    if(isset($_GET['action']) && $_GET['action']=='get'){

        $year = date('Y');

        if(isset($_GET['bulan_m'])){
            $bulan_mulai=  $_GET['bulan_m'];
            $tahun_mulai = $_GET['tahun_m'];
            $bulan_selesai = $_GET['bulan_s'];
            $tahun_selesai = $_GET['tahun_s'];

            $t_mulai = $tahun_mulai."-".$bulan_mulai."-01";
            $t_selesai = $tahun_selesai."-".$bulan_selesai."-".cal_days_in_month(CAL_GREGORIAN,$bulan_selesai,$tahun_selesai);

            $query = "SELECT
                    a.*,
                    datediff(a.tgl_selesai, a.tgl_mulai)+1 as total_hari,
                    YEAR(a.tgl_mulai) as year_cuti,
                    b.nik,
                    b.nama_karyawan,
                    c.nama_jenis,
                    d.count_cuti,
                    f.nama_divisi
                FROM
                    ct_cuti a
                LEFT JOIN ct_karyawan b ON
                    b.id_karyawan = a.id_karyawan
                LEFT JOIN ct_jenis_cuti c ON
                    c.id_jenis_cuti = a.jenis_cuti
                LEFT JOIN 
                (
                    SELECT
                        COUNT(*) AS count_cuti, e.id_karyawan
                    FROM
                        ct_cuti e
                    WHERE
                        e.tgl_mulai >= '$t_mulai' AND e.tgl_mulai < '$t_selesai' AND e.status_cuti = 1 AND e.approval_kabag = 1 GROUP BY e.id_karyawan
                ) d ON a.id_karyawan = d.id_karyawan
                LEFT JOIN ct_divisi f ON 
                    b.kd_divisi = f.kd_divisi
                WHERE  a.tgl_mulai >= '$t_mulai' AND a.tgl_mulai < '$t_selesai'
                AND b.kd_divisi > 1 AND b.kd_jabatan > 2";
        }
        

        
        // echo $query;
        if(isset($_GET['id'])){
            $query = "SELECT * FROM ct_cuti a LEFT JOIN ct_karyawan b ON b.id_karyawan = a.id_karyawan LEFT JOIN ct_jenis_cuti c ON c.id_jenis_cuti=a.jenis_cuti
                        WHERE a.id_karyawan='".$_GET['id']."'";
        }
        // echo $query;
        $sql = mysqli_query($connect,$query) or die(mysqli_error());

        $data = array();
        while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
            // $data[] = $row;
            // print_r($row);
            array_push($data, $row);
        }
        


        $json = json_encode(array('data' => $data));
        echo $json;
        // echo json_encode(array('data'=>'a'));
        return;
    }

    if(isset($_GET['action']) && $_GET['action'] == 'get_div'){

        $bulan_mulai=  $_GET['bulan_m'];
        $tahun_mulai = $_GET['tahun_m'];
        $bulan_selesai = $_GET['bulan_s'];
        $tahun_selesai = $_GET['tahun_s'];

        $t_mulai = $tahun_mulai."-".$bulan_mulai."-01";
        $t_selesai = $tahun_selesai."-".$bulan_selesai."-".cal_days_in_month(CAL_GREGORIAN,$bulan_selesai,$tahun_selesai);
        
        $query = "SELECT a.*,
                    COUNT(*) as total_cuti
                    FROM ct_divisi a
                    LEFT JOIN ct_karyawan b ON b.kd_divisi = a.kd_divisi
                    LEFT JOIN ct_cuti c ON c.id_karyawan = b.id_karyawan
                    WHERE a.kd_divisi > 1 AND
                    c.tgl_mulai >= '$t_mulai' AND c.tgl_mulai < '$t_selesai'
                    GROUP BY a.kd_divisi";
        
        $sql = mysqli_query($connect, $query);

        // echo $query;
        
        $data = array();
        while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
            // $data[] = $row;
            // print_r($row);
            array_push($data, $row);
        }
        


        $json = json_encode(array('data' => $data));
        echo $json;
        // echo json_encode(array('data'=>'a'));
        return;
    }

    if(isset($_POST['action']) && $_POST['action']=='acc_hr'){
        $id = $_POST['id_'];

        $query = "UPDATE ct_cuti SET status_cuti='1' WHERE id_cuti='$id'";
        $sql = mysqli_query($connect, $query);
        return;
    }

    if(isset($_POST['action']) && $_POST['action']=="den_hr"){
        $id = $_POST['id_'];
        $query = "UPDATE ct_cuti SET status_cuti='2' WHERE id_cuti='$id'";
        $sql = mysqli_query($connect, $query);
        return;
    }

    if(isset($_POST['action']) && $_POST['action']=='acc_kabag'){
        $id = $_POST['id_'];

        $query = "UPDATE ct_cuti SET approval_kabag='1' WHERE id_cuti='$id'";
        $sql = mysqli_query($connect, $query);
        return;
    }

    if(isset($_POST['action']) && $_POST['action']=="den_kabag"){
        $id = $_POST['id_'];
        $query = "UPDATE ct_cuti SET approval_kabag='2' WHERE id_cuti='$id'";
        $sql = mysqli_query($connect, $query);
        return;
    }


?>