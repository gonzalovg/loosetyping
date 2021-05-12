<?php
include_once('../model/user.php');

$id=$_GET["id"];

print_r($_GET);
$option=$_GET["option"];

switch ($option) {
    case 'delete':
        $user = User::getById($id);
        $user->delete();
        echo "Usuario #".$user->getId()." eliminado." ;
        break;
    
    default:
        # code...
        break;
}
