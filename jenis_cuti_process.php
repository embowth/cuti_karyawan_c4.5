<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT * FROM ct_jenis_cuti ORDER BY id_jenis_cuti ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']=='del') {
			
			$id_jenis_cuti = $_GET['id'];

			$query = "DELETE FROM ct_jenis_cuti WHERE id_jenis_cuti='$id_jenis_cuti'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$jenis = $_POST['jenis'];

			$id_jenis_cuti = $_POST['id_jenis_cuti'];

			//echo $id_jenis_cuti;

			if($id_jenis_cuti>0){

				$query = "UPDATE ct_jenis_cuti SET nama_jenis='$jenis' WHERE id_jenis_cuti='$id_jenis_cuti'";
				$sql = mysqli_query($connect,$query);

				return true;

			}else{

				$query = "INSERT INTO ct_jenis_cuti (nama_jenis) VALUES('$jenis')";
				$sql = mysqli_query($connect,$query);

				return true;
			}

		}

	}

?>