<?xml version="1.0" ?>
<?php

$url = "http://xml.fastbooking.com/PORTAL/sites/xmlgen/xmlrequest.phtml";

$post_string = '<?xml version="1.0" encoding="UTF-8"?>
<REQUEST>
<REQUEST_AVAILABILITY>
<HEADER LOGIN="mylogin" PASS="mypass" CURRENCY="EUR" LANG="EN"/>
<CRITERIA NBADUL="2" NBCHIL="0" DATE="2008-10-12" NBDAYS="2" ZONE="Nice"
NBSTAR="3" CODETX="FB-DISTRIB"/>
</REQUEST_AVAILABILITY>
</REQUEST>';


$header  = "POST HTTP/1.0 \r\n";
$header .= "Content-type: text/xml \r\n";
$header .= "Content-length: ".strlen($post_string)." \r\n";
$header .= "Content-transfer-encoding: text \r\n";
$header .= "Connection: close \r\n\r\n"; 
$header .= $post_string;

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 4);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,$header);

$data = curl_exec($ch); 

if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);

?>


