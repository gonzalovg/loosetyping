<?php

$type=$_GET["type"];
$id=$_GET["id"];

$_GET["option"]="delete";


switch ($type) {
    case 'user':
        # code...
        include("../model/controllers/userController.php");
        
     
        $controller = new UserController();
        $controller->doGet($_GET);



        break;
    
    default:
        # code...
        break;
}
