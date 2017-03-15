<?php
error_reporting(1);
$curl = curl_init();
$request_headers[] = 'Content-Type:application/json';
$request_headers[] = 'Authorization:key=AAAA_nPHLGY:APA91bGmYaxHGU9So-CXcp67mFZh6wZHJrvhAto1dSzhcItmcPMn3XGP2Pjsog_KCs72MNrIAgRXPyKrpM1KSqRol422GUX_ZFAHjnVt-xcBhyELokMaZbU9i2LsdGsL23r2WCA_EjLl';
$data = array("data"=>array("scor"=>"da", "time"=>"12:33"), "to"=> "dPxYO8bxxvY:APA91bFNvMSRB-ins_dogqiQ-ppDAFrlB7oAlyTLsIkVFL2nNxaKOtq6mXWkSVwfXXoqf2AAz005GzT5ZrXCp1EkhzzMPamLAxemVBobLfTgQOZC_J_2JFWYALWLryJNwMfPMfh9lIyk");
$data_json = json_encode($data);
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
	CURLOPT_POST => 1,
	CURLOPT_HTTPHEADER => $request_headers,
	CURLOPT_POSTFIELDS => $data_json
));

if($res = curl_exec($curl)) {
	echo "success";
} 
else {
	echo "failure";
}

if(!curl_exec($curl)){
    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
?>