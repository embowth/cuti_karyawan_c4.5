<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT * FROM ct_jabatan ORDER BY kd_jabatan ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']=='del') {
			
			$kd_jabatan = $_GET['id'];

			$query = "DELETE FROM ct_jabatan WHERE kd_jabatan='$kd_jabatan'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$jenis = $_POST['jenis'];

			$kd_jabatan = $_POST['kd_jabatan'];

			//echo $kd_jabatan;

			if($kd_jabatan>0){

				$query = "UPDATE ct_jabatan SET nama_jabatan='$jenis' WHERE kd_jabatan='$kd_jabatan'";
				$sql = mysqli_query($connect,$query);

				return true;

			}else{

				$query = "INSERT INTO ct_jabatan (nama_jabatan) VALUES('$jenis')";
				$sql = mysqli_query($connect,$query);

				return true;
			}

		}

	}

?>