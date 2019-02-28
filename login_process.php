<?php

	session_start();

	include "config/koneksi.php";

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$token = $_POST['token'];

	if('marganusantarajaya'==$token){
		$query = "SELECT * FROM mnj_login WHERE username='$username' AND password='$password' limit 1";
		$sql = mysqli_query($connect,$query);

		$count = mysqli_num_rows($sql);

		if($count>0){

			$data = mysqli_fetch_array($sql,MYSQLI_BOTH);

			$_SESSION['login'] = true;
			$_SESSION['user_id'] = $data['id_login'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['role'] =	$data['id_role'];

			header("location:".$base_url);

		}else{

			$_SESSION['notice']		= "Gagal Login!";
			$_SESSION['notice_msg']	= "Username atau password salah, silahkan mencoba kembali";

			header("location:".$base_url."/login.php");

		}
	}

?>