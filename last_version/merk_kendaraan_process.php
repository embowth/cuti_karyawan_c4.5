<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT * FROM mnj_merk_kendaraan ORDER BY id_merk ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']=='del') {
			
			$id_merk = $_GET['id'];

			$query = "DELETE FROM mnj_merk_kendaraan WHERE id_merk='$id_merk'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$merk = $_POST['merk'];

			$id_merk = $_POST['id_merk'];

			//echo $id_merk;

			if($id_merk>0){

				$query = "UPDATE mnj_merk_kendaraan SET nama_merk='$merk' WHERE id_merk='$id_merk'";
				$sql = mysqli_query($connect,$query);

				return true;

			}else{

				$query = "INSERT INTO mnj_merk_kendaraan (nama_merk) VALUES('$merk')";
				$sql = mysqli_query($connect,$query);

				return true;
			}

		}

	}

?>