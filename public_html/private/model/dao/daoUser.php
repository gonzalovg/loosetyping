<?php

include "public_html\private\model\dbConnection.php";

class DaoUser
{
    private $tabla ="usuarios";


    public function insertar($user)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into {$this->tabla}(nom_user,ema_user,pas_user) values (?,?,?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$user->getName(),$user->getEmail(),md5($user->getPassword())]);
    }
}
