<?php
	
	if(isset($_POST['id'])){

		include "config/koneksi.php";


		$id = $_POST['id'];
		$pass_lama = md5($_POST['pass_lama']);
		$pass_baru = md5($_POST['pass_baru']);
		$confirm_pass_baru = md5($_POST['confirm_pass_baru']);

		$query = "SELECT * FROM mnj_login where id_login='$id' AND password='$pass_lama'";
		$sql = mysqli_query($connect,$query);

		if(mysqli_num_rows($sql)>0){
			if($pass_baru === $confirm_pass_baru){
				$query = "UPDATE mnj_login set password='$pass_baru' where id_login='$id'";
				$sql = mysqli_query($connect,$query);

				echo json_encode(array('result'=>"ok"));

			}else{
				echo json_encode(array('result'=>"nos"));
			}
		}else{
			echo json_encode(array('result'=>"pnok"));
		}
	}

?>