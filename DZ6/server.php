<?php

if(!extension_loaded("soap")){
    dl("php_soap.dll");
}

ini_set("soap.wsdl_chache_enabled", "0");

$server = new SoapServer("konverzija.wsdl");

function converter($cur,  $val){
        
        if($cur == "bameur"){
            return $val * 0.48 . " EUR";

        }
        if($cur=="bamhrk"){
            return $val * 3.93 . " HRK";

        }

        if($cur == "eurbam"){
            return $val * 1.94 . " BAM";

        }
        if($cur=="eurhrk"){
            return $val * 7.53 . " HRK";

        }
        if($cur == "hrkbam"){
            return $val * 0.26 . " BAM";

        }
        if($cur=="hrkeur"){
            return $val * 0.13 . " EUR";

        }

}
    



$server->AddFunction("converter");
$server->handle();





?>