<?php
include('../model/user.php');

$id=$_GET["id"];
$option=$_GET['option'];

switch ($option) {
    case 'delete':
        $user = User::getById($id);
        $user->delete();
        break;
    
    default:
        # code...
        break;
}
