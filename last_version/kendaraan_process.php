<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT a.*, b.nama_jenis, c.nama_merk 
						FROM mnj_kendaraan a 
						LEFT JOIN mnj_jenis_kendaraan b ON a.jenis_kendaraan=b.id_jenis
						LEFT JOIN mnj_merk_kendaraan c ON a.merk=c.id_merk
						ORDER BY a.id_kendaraan ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']=='del') {
			
			$id_kendaraan = $_GET['id'];

			$query = "DELETE FROM mnj_kendaraan WHERE id_kendaraan='$id_kendaraan'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$plat = $_POST['plat'];
			$jenis = $_POST['jenis'];
			$tahun = $_POST['tahun'];
			$merk = $_POST['merk'];

			$id_kendaraan = $_POST['id_kendaraan'];

			//echo $id_kendaraan;

			if($id_kendaraan>0){

				$query = "UPDATE mnj_kendaraan SET plat_nomor='$plat',jenis_kendaraan='$jenis',tahun='$tahun',merk='$merk' WHERE id_kendaraan='$id_kendaraan'";
				$sql = mysqli_query($connect,$query);

				return true;

			}else{

				$query = "INSERT INTO mnj_kendaraan (plat_nomor,jenis_kendaraan,tahun,merk) VALUES('$plat','$jenis','$tahun','$merk')";
				$sql = mysqli_query($connect,$query);

				return true;
			}

		}

	}

?>