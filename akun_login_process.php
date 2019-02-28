<?php

	include "config/koneksi.php";


	if(isset($_GET['action'])){

		if($_GET['action']=="get"){

			$query = "SELECT a.*, b.nama_role as role FROM mnj_login a LEFT JOIN mnj_role b ON a.id_role=b.id_role  ORDER BY id_login ASC";
			$sql = mysqli_query($connect,$query);

			$data = array();
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}

			echo json_encode(array('data'=>$data));

		}elseif ($_GET['action']='del') {
			
			$id_login = $_GET['id'];

			$query = "DELETE FROM mnj_login WHERE id_login='".$id_login."'";
			$sql = mysqli_query($connect,$query);

			return true;

		}

	}elseif(isset($_POST['action'])){

		if($_POST['action']=="add"){

			$username = $_POST['username'];
			$role = $_POST['role'];
			$nama = $_POST['nama'];

			$id_login = $_POST['id_login'];

			$password = md5($_POST['password']);

			if($id_login>0){

				$password = md5($_POST['password']);

				if($_POST['password'] != ""){
					$query = "UPDATE mnj_login SET username='$username',id_role='$role',password='$password',nama_user='$nama' WHERE id_login='$id_login'";
					$sql = mysqli_query($connect,$query);
					echo "edit";
				}else{
					$query = "UPDATE mnj_login SET username='$username',id_role='$role',nama_user='$nama' WHERE id_login='$id_login'";
					$sql = mysqli_query($connect,$query);
					echo "edit";
				}

				
				return true;

			}else{

				$query = "INSERT INTO mnj_login (username,password,id_role,nama_user) VALUES('$username','$password','$role','$nama')";
				$sql = mysqli_query($connect,$query);

				return true;
			}

		}

	}

?>