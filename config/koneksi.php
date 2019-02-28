<?php
	
	$username = 'root';
	$password = '';
	$host = '127.0.0.1';
	$database = 'db_cuti';

	$base_url 	= "http://localhost/cuti_karyawan";

	$connect = mysqli_connect($host,$username,$password,$database);

	if(!$connect){
		echo mysqli_error($connect);
	}

?>