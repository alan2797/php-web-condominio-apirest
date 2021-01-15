<?php

require_once '../Negocio/FCM.php';

$token = 'dEMBwAWwIuE:APA91bH_PfVRylXm51eLp3zacHPidjwZx7SAmg0z3Uj4txZ3xyED8xlLccVRU8qZxkM92yB0EBXrAy5WvH1QP8FLFKGopnRW-A9fjTRxkyfx0_aSoCmfwn5j5Lxn86iwqLukOtwhLVFS';
sendFCMNotification($token, 'PRUEBA');