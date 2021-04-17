<?php

// include("public_html/private/model/dbConnection.php");
// include("..\dbConnection.php");

class DaoUser
{
    private $tabla = "usuarios" ;


    public function __construct()
    {
        // $this->tabla="usuarios";
    }


    public static function insert($user)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into usuarios(nom_user,ema_user,pas_user) values (?,?,?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$user->getName(),$user->getEmail(),md5($user->getPassword())]);
    }

    public static function existingUser($user)
    {
        $db=DbConnection::getInstance();
    
        $query="select ema_user from usuarios where ema_user='".$user->getEmail()."';";

        // $commit= $db->prepare($query);

        $result=$db->query($query)->fetch();
        var_dump($result);

        if ($result["ema_user"]==$user->getEmail()) {
            return true;
        } elseif ($result["ema_user"]=="") {
            return false;
        }
       

        // if ($result) {
        //     return true;
        // }
    }
}
