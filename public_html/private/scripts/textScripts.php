<?php
  
include_once('../model/text.php');

$option = $_GET['option'];


switch ($option) {
    case 'delete':

        $id = $_GET['id'];
        $text = Text::getById($id);
        $text->delete();
        echo "Texto #".$text->getId()." eliminado." ;
        break;
    
    default:
        # code...
        break;
}
