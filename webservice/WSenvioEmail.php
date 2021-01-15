<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
//incluimos la clase PHPMailer
// Instantiation and passing `true` enables exceptions
//instancio un objeto de la clase PHPMailer
//include "class.phpmailer.php";
//include "class.smtp.php";

$email_user = "vladimi1vasquez1169@gmail.com";
$email_password = "va10203040";
$the_subject = "Phpmailer prueba by vladimir.com";
$address_to = "vasquezvladimir169@gmail.com";
$from_name = "Vladimir";
require 'phpqrcode/qrlib.php';

$dir ='temp/';
	if(!file_exists($dir)){
		mkdir($dir);

	}
	$filename = $dir . 'test.png';
	$tamaño = 10;
	$level = 'M';
	$frameSize = 3;
	$contenido = 'vladimir Alan vasquez desde servidor';

	QRcode::png($contenido,$filename,$level,$tamaño,$frameSize);
 $mail = new PHPMailer;
    try {
        $mail->isSMTP(); $mail->SMTPDebug = 3; $mail->Host = 'smtp.gmail.com'; $mail->Port = 587;
        $mail->SMTPAuth= TRUE;        
        $mail->Username = $email_user;
        $mail->Password = $email_password;            
        $mail->setFrom($email_user, 'administrador');
        $mail->addAddress($address_to, "Usuario"); 
        
        $mail->addAttachment($filename, 'qr.png'); 
        
        $mail->isHTML(true); 
        $mail->Subject = $the_subject; 
        $mail->Body = '<img src ="https://condomiosevilla.000webhostapp.com/webservice/'.$filename.'" />';
        if ($mail->send()){ 
            echo "se evio as___. $filename";
            echo '<img src ="https://condomiosevilla.000webhostapp.com/webservice/'.$filename.'" />';
            return array("response" => true, "message" => "Se ha enviado el correo a $address_to");
        }
        else{
            echo $mail->ErrorInfo;
            return array("response" => false, "message" => "No se ha podido enviar el correo a $address_to");
        }
    } catch (Exception $exc) {
        return array("response" => false, "message" => $exc->getMessage());
    }



