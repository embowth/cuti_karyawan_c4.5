<?php

	include "config/koneksi.php";
	date_default_timezone_set("Asia/Bangkok");

	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

            

			if(strlen($_GET['tanggal_awal']) && strlen($_GET['tanggal_akhir'])>0){

                $start = date('Y-m-d', strtotime($_GET['tanggal_awal']));
                $end = date('Y-m-d', strtotime($_GET['tanggal_akhir']));

				$query = "SELECT a.*,b.nik, b.nama as nama_pengemudi, b.telp, c.nama_jenis, d.nama_merk, e.* FROM mnj_jadwal a
						LEFT JOIN mnj_pengemudi b ON a.id_pengemudi=b.id_pengemudi
						LEFT JOIN mnj_kendaraan e ON a.id_kendaraan=e.id_kendaraan
						LEFT JOIN mnj_jenis_kendaraan c ON e.jenis_kendaraan=c.id_jenis
						LEFT JOIN mnj_merk_kendaraan d ON e.merk=d.id_merk
						WHERE tanggal_berangkat >= '$start' AND
                        tanggal_berangkat <= '$end'
						ORDER BY id_jadwal ASC";
			}else{
				$query = "SELECT a.*,b.nik, b.nama as nama_pengemudi, b.telp, c.nama_jenis, d.nama_merk, e.* FROM mnj_jadwal a
						LEFT JOIN mnj_pengemudi b ON a.id_pengemudi=b.id_pengemudi
						LEFT JOIN mnj_kendaraan e ON a.id_kendaraan=e.id_kendaraan
						LEFT JOIN mnj_jenis_kendaraan c ON e.jenis_kendaraan=c.id_jenis
						LEFT JOIN mnj_merk_kendaraan d ON e.merk=d.id_merk
						ORDER BY id_jadwal ASC";
			}

			

			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));
        
        }

	}
?>