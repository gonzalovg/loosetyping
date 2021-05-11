<?php
include_once('../model/resolution.php');


$id = $_GET['id'];
$option=$_GET['option'];


switch ($option) {
    case 'delete':
        $resolution = Resolution::getById($id);
        $resolution->delete();
        echo "Resolución #".$id." eliminada.";
        break;
    
    default:
        # code...
        break;
}
