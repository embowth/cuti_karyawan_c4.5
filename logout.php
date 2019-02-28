<?php
	include "config/koneksi.php";
	session_start();
	session_unset();
	header("location:".$base_url."/login.php");

?>
