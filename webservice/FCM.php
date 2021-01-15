<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'FirebaseConfig.php';

function sendFCMTitleNotification($token, $messageText, $data, $title = TITLE_APP){
    $headers = array('Content-Type:application/json','Authorization:key=' . API_KEY);
    
    $message = array(
        'to' => $token,
        'notification' => array(
            "title" => $title,
            "body" => $messageText,
            "sound" => "default",
            "icon" => "ic_notif"),
        'data' => $data,
    );    
    $ch = curl_init();    
    curl_setopt ( $ch, CURLOPT_URL, FCM_SERVER);
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($message));

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

function sendFCMNotification($token, $messageText) {
    
    $headers = array('Content-Type:application/json','Authorization:key=' . API_KEY);
    
    $message = array(
        'to' => $token,
        'notification' => array(
            "title" => TITLE_APP,
            "body" => $messageText,
            "icon" => "ic_notif"),
    );
    
    $ch = curl_init();
    
    curl_setopt ( $ch, CURLOPT_URL, FCM_SERVER);
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($message));

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

function sendFCMNotificationExtra($token, $messageText, $data) {
    
    $headers = array('Content-Type:application/json','Authorization:key=' . API_KEY);
    
    $message = array(
        'to' => $token,
        'notification' => array(
            "title" => TITLE_APP,
            "body" => $messageText,
            "sound" => "default",
            "icon" => "ic_notif"),
        'data' => $data,
    );    
    $ch = curl_init();    
    curl_setopt ( $ch, CURLOPT_URL, FCM_SERVER);
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($message));

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
function sendFCMNotificationSinSound($token, $messageText, $data) {
    
    $headers = array('Content-Type:application/json','Authorization:key=' . API_KEY);
    
    $message = array(
        'to' => $token,
        'notification' => array(
            "title" => TITLE_APP,
            "sound"=>null,
            "body" => $messageText,
            "icon" => "ic_notif"),
        'data' => $data,
    );    
    $ch = curl_init();    
    curl_setopt ( $ch, CURLOPT_URL, FCM_SERVER);
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($message));

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
function sendFCMData($token, $data) {
    
    $headers = array('Content-Type:application/json','Authorization:key=' . API_KEY);
    
    $message = array(
        'to' => $token,        
        'data' => $data,
    );
    
    $ch = curl_init();
    
    curl_setopt ( $ch, CURLOPT_URL, FCM_SERVER);
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($message));

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

function sendFCMMultipleNotification($tokens_array, $message_text, $data) {
    
    $headers = array('Content-Type:application/json', 'Authorization:key=' . API_KEY);
    
    $message = array(
        'registration_ids' => $tokens_array,
        'notification' => array(
            "title" => TITLE_APP,
            "body" => $message_text,
            "sound" => "default",
            "icon" => "ic_notif"),
        'data' => $data,
    );

    $ch = curl_init();

    curl_setopt ( $ch, CURLOPT_URL, FCM_SERVER);
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($message));

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
