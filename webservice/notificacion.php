<?php

  require_once __DIR__ . '/FCM.php';
  
  $token = "ckpedwegfFs:APA91bH59wrk7pLtGgaE7sPpRNSug85k0c-nfxw08cxj-6ew2R-AdXt79IoMN5Qcc7LaulV9q9_0KCaia_ZJ71HOLRT2fQLX6aeTnXw1m5VYXsUneAaOqERevgT9wBK_Hi_xW9DB2Yi3";
  $data = "HOLA MUNDO";
  sendFCMData($token, $data);
  
