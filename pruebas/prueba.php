<?php


// var_dump($_GET);

$datos = $_GET["data"];
// var_dump($datos);
var_dump($datos);
// echo(gettype($datos));
// echo(strlen($datos));
$datosJson = json_decode($datos, true);


echo gettype($datosJson);

// echo "<br>";
// header("Content-Type: application/json");
// var_dump($datos);


// var_dump($datosJson);
