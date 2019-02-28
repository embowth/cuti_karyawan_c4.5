<?php
	include "config/koneksi.php";
	date_default_timezone_set("Asia/Bangkok");

	if(isset($_GET['action'])){
		if($_GET['action']=="get"){
			

			$today = date('Y-m-d');

            $query = "SELECT a.*,b.nama_divisi,c.nama_jabatan FROM ct_karyawan a
                        LEFT JOIN ct_divisi b ON a.kd_divisi=b.kd_divisi
                        LEFT JOIN ct_jabatan c ON a.kd_jabatan=c.kd_jabatan
                    ";

			
			$encode = mysqli_set_charset($connect, 'utf8');
			$sql = mysqli_query($connect,$query);

			$karyawan = array();
			while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
				$karyawan[] = $row;
			}
			//print_r($data);
			$data = array(
				'data'	=> $karyawan
			);
			echo json_encode($data);
			return;
		}elseif ($_GET['action']=='del') {
			
			$id_karyawan = $_GET['id'];


			$query = "DELETE FROM ct_karyawan WHERE id_karyawan='$id_karyawan'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

            $nik = $_POST['nik'];
            $nama = $_POST['nama_karyawan'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tgl_lahir = date('Y-m-d', strtotime($_POST['tanggal_lahir']));
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $status_kawin = $_POST['status_kawin'];
            $alamat = $_POST['alamat'];
            $telp = $_POST['telp'];
            $agama = $_POST['agama'];
            $divisi = $_POST['divisi'];
            $jabatan = $_POST['jabatan'];

            $id_karyawan = $_POST['id_karyawan'];

			//echo $id_karyawan;

			//$password = md5($id_karyawan);

			if($id_karyawan>0){

				$query = "UPDATE ct_karyawan SET nama_karyawan='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin',status_kawin='$status_kawin',
                        alamat='$alamat',nomor_tlp='$telp', agama='$agama',kd_divisi='$divisi', kd_jabatan='$jabatan' WHERE id_karyawan='$id_karyawan'";
                $sql = mysqli_query($connect,$query);
                
                echo $query;

				return true;

			}else{

                $query = "SELECT * FROM ct_karyawan WHERE nik='$nik'";
                $sql = mysqli_query($connect,$query);

                $count = mysqli_num_rows($sql);

                if($count>0){
                    echo json_encode(array('result'=>false,'title'=>'Tambah Karyawan','msg'=>'NIK sudah terdaftar'));
                    return;
                }

                $passwd = md5($nik);
                $query = "INSERT INTO mnj_login VALUE('','$nik','$passwd','$nama','3')";
                $sql = mysqli_query($connect,$query);
                $id = mysqli_insert_id($connect);

                $query = "INSERT INTO ct_karyawan VALUES('','$nik','$nama','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$status_kawin','$alamat','$telp','$agama','$divisi','$jabatan','$id')";
                $sql = mysqli_query($connect,$query);
                echo json_encode(array('result'=>true,'title'=>'Tambah Karyawan','msg'=>'Berhasil Menambah Karyawan'));
			}

		}else if($_POST['action']=='ch_st'){

			$status = $_POST['status_job'];
			$id = $_POST['st_id_karyawan'];

			$query = "UPDATE ct_karyawan SET status_job='$status' WHERE id_karyawan='$id'";
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