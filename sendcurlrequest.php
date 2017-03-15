<?php

function sendGCM($message, $id) {


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
            'registration_ids' => array (
                    $id
            ),
            'data' => array (
                    "message" => $message
            )
    );
    $fields = json_encode ( $fields );

    $headers = array (
            'Authorization: key=' . "AAAA_nPHLGY:APA91bGmYaxHGU9So-CXcp67mFZh6wZHJrvhAto1dSzhcItmcPMn3XGP2Pjsog_KCs72MNrIAgRXPyKrpM1KSqRol422GUX_ZFAHjnVt-xcBhyELokMaZbU9i2LsdGsL23r2WCA_EjLl",
            'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    echo $result;
    if(!curl_exec($ch)){
	    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
	}
    curl_close ( $ch );
}

sendGCM('Hello all of you', "dPxYO8bxxvY:APA91bFNvMSRB-ins_dogqiQ-ppDAFrlB7oAlyTLsIkVFL2nNxaKOtq6mXWkSVwfXXoqf2AAz005GzT5ZrXCp1EkhzzMPamLAxemVBobLfTgQOZC_J_2JFWYALWLryJNwMfPMfh9lIyk");
?>