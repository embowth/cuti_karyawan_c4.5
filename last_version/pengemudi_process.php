<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT * FROM mnj_pengemudi ORDER BY nik ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']=='del') {
			
			$id_pengemudi = $_GET['id'];


			$query = "DELETE FROM mnj_pengemudi WHERE id_pengemudi='$id_pengemudi'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$nik = $_POST['nik'];
			$nama = $_POST['nama'];
			$telp = $_POST['telp'];
			$jenis_kelamin = $_POST['jenis_kelamin'];

			$id_pengemudi = $_POST['id_pengemudi'];

			echo $id_pengemudi;

			//$password = md5($nik);

			if($id_pengemudi>0){

				$query = "UPDATE mnj_pengemudi SET nama='$nama',telp='$telp',jenis_kelamin='$jenis_kelamin' WHERE id_pengemudi='$id_pengemudi'";
				$sql = mysqli_query($connect,$query);

				return true;

			}else{

			
				$query = "INSERT INTO mnj_pengemudi (nik,nama,telp,jenis_kelamin) VALUES('$nik','$nama','$telp','$jenis_kelamin')";
				$sql = mysqli_query($connect,$query);

				return true;
			}

		}

	}

?>