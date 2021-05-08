<?php

include_once('../model/user.php');
include_once('../model/resolution.php');


$keyRatio= $_GET['data'];
$user = $_GET['user'];
$text= $_GET['text'];
$wpm = $_GET['wpm'];
$time = $_GET['time'];


$resolucion = new Resolution("", $user, $text, $wpm, $time, "");

print_r($resolucion);

$resolucion->insert();
