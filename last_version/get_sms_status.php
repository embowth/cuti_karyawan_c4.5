<?php

// $response = '{
//     "id": 64334374,
//     "device_id": 90029,
//     "phone_number": "089634408090",
//     "message": "Kpd Yth. Bpk. sukro, tgl 01-05-2018 mhn untuk antar Simi ke Jakarta jam 13:40, siap dikantor. kembali 01-05-2018, 14:00",
//     "status": "sent",
//     "log": [
//         {
//             "status": "pending",
//             "occurred_at": "2018-06-08T00:54:59+00:00"
//         },
//         {
//             "status": "queued",
//             "occurred_at": "2018-06-08T00:55:01+00:00"
//         },
//         {
//             "status": "sent",
//             "occurred_at": "2018-06-08T00:55:05+00:00"
//         }
//     ],
//     "updated_at": "2018-06-08T00:55:05+00:00",
//     "created_at": "2018-06-08T00:54:59+00:00"
// }';

$sms_id = $_POST['id'];
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTUyODQxOTA5MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjUyOTA2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.eoLidpD7eTLHOrzJuP-FM3zfIKQMWC7Y0cz5dCQYgqc';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://smsgateway.me/api/v4/message/".$sms_id,
  CURLOPT_SSL_VERIFYHOST=>0,
  CURLOPT_SSL_VERIFYPEER=>0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
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
    //echo "cURL Error #:" . $err;
    echo json_encode(array('result'=>false));
  }else{
    $parsed = json_decode($response,true);
    // print_r($parsed);

    $log = $parsed['log'];
    $log = array_reverse($log,true);
    $timeline="";

    if(count($log)==0){
        echo json_encode(array('result'=>false));
    }else{
        foreach($log as $key => $value){
            if($key%2==0){
                $timeline .='<div class="container left bg-lg">';
            }else{
                $timeline .='<div class="container right">';
            }
    
            $label ='';
            if($value['status']=='sent'){
                $label='label-success';
            }else{
                $label='label-warning';
            }
    
            $timeline .= '<div class="content ">';
            $timeline .= '<p><b>'.date('d-m-Y H:i:s', strtotime($value['occurred_at'])).'</b></p>';
            $timeline .= '<span class="label '.$label.'"><h5>'.$value['status'].'</h5></span>';
            $timeline .='</div>';
            $timeline .='</div>';
        }
    
        echo json_encode(array('result'=>true,'data'=>$timeline,'msg'=>$parsed['message']));
    }
    
}