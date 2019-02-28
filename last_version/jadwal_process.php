<?php

	include "config/koneksi.php";
	date_default_timezone_set("Asia/Bangkok");

	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$today = date('Y-m-d');

			if(isset($_GET['type'])){
				$query = "SELECT a.*,b.nik, b.nama as nama_pengemudi, b.telp, c.nama_jenis, d.nama_merk, e.* FROM mnj_jadwal a
						LEFT JOIN mnj_pengemudi b ON a.id_pengemudi=b.id_pengemudi
						LEFT JOIN mnj_kendaraan e ON a.id_kendaraan=e.id_kendaraan
						LEFT JOIN mnj_jenis_kendaraan c ON e.jenis_kendaraan=c.id_jenis
						LEFT JOIN mnj_merk_kendaraan d ON e.merk=d.id_merk
						WHERE tanggal_berangkat='$today'
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

		}elseif ($_GET['action']=='del') {
			
			$id_jadwal = $_GET['id'];


			$query = "DELETE FROM mnj_jadwal WHERE id_jadwal='$id_jadwal'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$id_jadwal = $_POST['id_jadwal'];
			$pengemudi = $_POST['pengemudi'];
			$kendaraan = $_POST['kendaraan'];
			$penumpang = $_POST['penumpang'];
			$tujuan = $_POST['tujuan'];
			$tanggal_berangkat = date('Y-m-d', strtotime($_POST['tanggal_berangkat']));
			$tanggal_kembali = date('Y-m-d', strtotime($_POST['tanggal_kembali']));
			$jam_berangkat = $_POST['jam_berangkat'];
			$jam_kembali = $_POST['jam_kembali'];

			$action = $_POST['action_pengemudi'];
			$standby = $_POST['standby'];
			$id_jadwal = $_POST['id_jadwal'];

			echo $id_jadwal;

			//$password = md5($id_jadwal);

			if($id_jadwal>0){

				$query = "UPDATE mnj_jadwal SET id_pengemudi='$pengemudi',id_kendaraan='$kendaraan',penumpang='$penumpang',tujuan='$tujuan',
							tanggal_berangkat='$tanggal_berangkat', tanggal_kembali='$tanggal_kembali', jam_berangkat='$jam_berangkat',
							jam_kembali='$jam_kembali', action_p='$action', standby_p='$standby' WHERE id_jadwal='$id_jadwal'";
				$sql = mysqli_query($connect,$query);

				return true;

			}else{

				// $start_date = $tanggal_berangkat." ".$jam_berangkat;
				// $end_date = $tanggal_kembali." ".$jam_kembali;

				$query = "SELECT COUNT(*) as jumlah FROM mnj_jadwal WHERE id_pengemudi='$pengemudi' AND (( tanggal_berangkat between '$tanggal_berangkat' AND '$tanggal_kembali' AND jam_berangkat between '$jam_berangkat' AND '$jam_kembali') OR (tanggal_kembali between '$tanggal_berangkat' AND '$tanggal_kembali' AND jam_kembali between '$jam_berangkat' AND '$jam_kembali'))";
				$sql = mysqli_query($connect,$query) or die(mysqli_error($connect));

				// echo $query;

				$count = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				//echo $count;

				if($count['jumlah']>0){
					echo json_encode(array('result'=>false,'title'=>"Gagal Membuat Jadwal baru",'msg'=>"Pengemudi / kendaraan sudah memiliki jadwal"));
					return true;
				}

				$query = "SELECT COUNT(*) as jumlah FROM mnj_jadwal WHERE id_kendaraan='$kendaraan' AND (( tanggal_berangkat between '$tanggal_berangkat' AND '$tanggal_kembali' AND jam_berangkat between '$jam_berangkat' AND '$jam_kembali') OR (tanggal_kembali between '$tanggal_berangkat' AND '$tanggal_kembali' AND jam_kembali between '$jam_berangkat' AND '$jam_kembali'))";
				$sql = mysqli_query($connect,$query) or die(mysqli_error($connect));

				// echo $query;

				$count = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				//echo $count;

				if($count['jumlah']>0){
					echo json_encode(array('result'=>false,'title'=>"Gagal Membuat Jadwal baru",'msg'=>"Pengemudi / kendaraan sudah memiliki jadwal"));
					return true;
				}


				$query = "INSERT INTO mnj_jadwal (id_pengemudi,id_kendaraan,penumpang,tujuan,jam_berangkat,jam_kembali,tanggal_berangkat,tanggal_kembali,action_p,standby_p)
							VALUES('$pengemudi','$kendaraan','$penumpang','$tujuan','$jam_berangkat','$jam_kembali','$tanggal_berangkat','$tanggal_kembali','$action','$standby')";
				$sql = mysqli_query($connect,$query) or die(mysqli_error($connect));
				
				echo json_encode(array('result'=>true,'title'=>"Berhasi Membuat Jadwal baru",'msg'=>"Jadwal pengemudi berhasil dibuat"));
				return true;
			}

		}else if($_POST['action']=='ch_st'){

			$status = $_POST['status_job'];
			$id = $_POST['st_id_jadwal'];

			$query = "UPDATE mnj_jadwal SET status_job='$status' WHERE id_jadwal='$id'";
			$sql = mysqli_query($connect, $query);

			if($sql){
				echo json_encode(array('result'=>true,'title'=>"Ubah Status", 'msg'=>"Berhasil mengubah status"));
			}else{
				echo json_encode(array('result'=>true,'title'=>"Ubah Status", 'msg'=>"Gagal mengubah status"));
			}

			return true;


		}

	}

?>