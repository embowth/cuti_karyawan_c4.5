<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT * FROM mnj_jenis_kendaraan ORDER BY id_jenis ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']=='del') {
			
			$id_jenis = $_GET['id'];

			$query = "DELETE FROM mnj_jenis_kendaraan WHERE id_jenis='$id_jenis'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$jenis = $_POST['jenis'];

			$id_jenis = $_POST['id_jenis'];

			//echo $id_jenis;

			if($id_jenis>0){

				$query = "UPDATE mnj_jenis_kendaraan SET nama_jenis='$jenis' WHERE id_jenis='$id_jenis'";
				$sql = mysqli_query($connect,$query);

				return true;

			}else{

				$query = "INSERT INTO mnj_jenis_kendaraan (nama_jenis) VALUES('$jenis')";
				$sql = mysqli_query($connect,$query);

				return true;
			}

		}

	}

?>