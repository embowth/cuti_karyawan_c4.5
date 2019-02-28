<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT * FROM ct_golongan_usia ORDER BY id_golongan ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']=='del') {
			
			$id_golongan = $_GET['id'];

			$query = "DELETE FROM ct_golongan_usia WHERE id_golongan='$id_golongan'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

            $nama_golongan = $_POST['nama_golongan'];
            $minimum_usia = $_POST['minimum_usia'];
            $maksimum_usia = $_POST['maksimum_usia'];

			$id_golongan = $_POST['id_golongan'];

			//echo $id_golongan;

			if($id_golongan>0){

				$query = "UPDATE ct_golongan_usia SET nama_golongan='$nama_golongan', minimum_usia = '$minimum_usia',maksimum_usia='$maksimum_usia' WHERE id_golongan='$id_golongan'";
				$sql = mysqli_query($connect,$query) or die(mysqli_error($connect));

				return true;

			}else{

				$query = "INSERT INTO ct_golongan_usia (nama_golongan, minimum_usia,maksimum_usia) VALUES('$nama_golongan','$minimum_usia','$maksimum_usia')";
				$sql = mysqli_query($connect,$query) or die(mysqli_error($connect));

				return true;
			}

		}

	}

?>