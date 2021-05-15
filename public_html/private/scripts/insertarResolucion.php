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



$typedKeys = array();






// if (!Key::registrosDB($user)) {
//     echo  Key::inicializarDB($user, $keyInfo);
// } else {
//     echo   Key::actualizarDB($user, $keyInfo);
// }



// foreach ($keyInfo as $keyChar =>$keyRatio) {
//     // print_r($keyChar);
   
//     // print_r($keyRatio->aciertos);
//     if ($keyRatio->aciertos!=0 || $keyRatio->fallos!=0) {
//         $key = new Key("", $user, $keyChar, $keyRatio->aciertos, $keyRatio->fallos);
//         array_push($typedKeys, $key);
//     }
// }

// var_dump(Key::registrosDB($user));

// echo "<pre>";
// print_r($typedKeys);
// echo "</pre>";

$resolucion = new Resolution("", $user, $text, $wpm, $time, "");

// print_r($resolucion);

$resolucion->insert();
