<?php

$id_jadwal = $_POST['id'];
$telp = $_POST['telp'];
$pengemudi  = $_POST['pengemudi'];
$plat = $_POST['plat'];
$penumpang = $_POST['penumpang'];
$tujuan = $_POST['tujuan'];
$tgl_berangkat = $_POST['tgl_berangkat'];
$tgl_kembali = $_POST['tgl_kembali'];
$jam_berangkat = $_POST['jam_berangkat'];
$jam_kembali = $_POST['jam_kembali'];
$action_p = $_POST['action_p'];
$standby_p = $_POST['standby_p'];

$msg = "";
$msg .= "Kpd Yth. Bpk. ". $pengemudi .", tgl ". date('d-m-Y',strtotime($tgl_berangkat)) ." mhn untuk ".$action_p." ". $penumpang ." ke ". $tujuan ." jam ". date('H:i', strtotime($jam_berangkat)) .", siap di".$standby_p.". ";
$msg .= "kembali ".date('d-m-Y', strtotime($tgl_kembali)).", ".date('H:i', strtotime($jam_kembali));

$curl = curl_init();

$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTUyODQxOTA5MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjUyOTA2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.eoLidpD7eTLHOrzJuP-FM3zfIKQMWC7Y0cz5dCQYgqc';

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
  CURLOPT_SSL_VERIFYHOST=>0,
  CURLOPT_SSL_VERIFYPEER=>0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "[\r\n  {\r\n    \"phone_number\": \"".$telp."\",\r\n    \"message\": \"".$msg."\",\r\n    \"device_id\": 90029\r\n  }\r\n]",
  CURLOPT_HTTPHEADER => array(
    "Authorization: ".$token,
    "Cache-Control: no-cache",
    "Content-Type: application/json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  // echo "cURL Error #:" . $err;
  echo json_encode(array('result'=>false));
} else {

  include_once "config/koneksi.php";

  $data = json_decode($response,true);
    
  $query = "UPDATE mnj_jadwal SET send_id='".$data[0]['id']."' WHERE id_jadwal='$id_jadwal'";
  $sql = mysqli_query($connect,$query);

  // echo $response;
  echo json_encode(array('result'=>true));
}