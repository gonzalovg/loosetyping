<?php
include_once('../model/resolution.php');




$option=$_GET['option'];


switch ($option) {
    case 'delete':
        $id = $_GET['id'];
        $resolution = Resolution::getById($id);
        $resolution->delete();
        echo "Resolución #".$id." eliminada.";
        break;

    case 'rank':


        include_once('../model/user.php');
include_once('../model/text.php');

        $time = $_GET['time'];
        $text=$_GET['text'];


        $resolutions= Resolution::getRankedResolutions($text, $time);

        $resolutionsHTML='';
        $position = 1;
        foreach ($resolutions as $resolution) {
            $user = User::getById($resolution->getIdUser());
            $text= Text::getById($resolution->getIdText());




            $resolutionsHTML.=$resolution->imprimirRank($text->getTitText(), $user->getName(), $user->getId(), $user->getAvatar(), $position);
            $position++;
        }

        echo $resolutionsHTML;

    
        // no break
    default:
        # code...
        break;
}
