<?php

include_once('../model/user.php');
include_once('../model/resolution.php');
include_once('../model/key.php');


$keyInfo= $_GET['data'];
$user = $_GET['user'];
$text= $_GET['text'];
$wpm = $_GET['wpm'];
$time = $_GET['time'];



// echo $keyRatio;
// echo gettype($keyRatio);

$keyInfo=json_decode($keyInfo);





if (!Key::registrosDB($user)) {
    echo  Key::inicializarDB($user, $keyInfo);
} else {
    echo   Key::actualizarDB($user, $keyInfo);
}




$resolucion = new Resolution("", $user, $text, $wpm, $time, "");



$resolucion->insert();
