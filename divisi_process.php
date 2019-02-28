<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT * FROM ct_divisi ORDER BY kd_divisi ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']=='del') {
			
			$kd_divisi = $_GET['id'];

			$query = "DELETE FROM ct_divisi WHERE kd_divisi='$kd_divisi'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$jenis = $_POST['jenis'];

			$kd_divisi = $_POST['kd_divisi'];

			//echo $kd_divisi;

			if($kd_divisi>0){

				$query = "UPDATE ct_divisi SET nama_divisi='$jenis' WHERE kd_divisi='$kd_divisi'";
				$sql = mysqli_query($connect,$query);

				return true;

			}else{

				$query = "INSERT INTO ct_divisi (nama_divisi) VALUES('$jenis')";
				$sql = mysqli_query($connect,$query);

				return true;
			}

		}

	}

?>