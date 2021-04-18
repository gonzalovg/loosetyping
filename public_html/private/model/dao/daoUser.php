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

    public static function delete($user)
    {
        $db= DbConnection::getInstance();
        
        $query="delete * from usuarios where id={$user->getId()} ;";

        $db->query($query);

        // $commit = $db->prepare($query);
        // $commit->execute([$user->getId()]);
    }


    public static function existingUser($user)
    {
        $db=DbConnection::getInstance();
    
        $query="select ema_user from usuarios where ema_user='".$user->getEmail()."';";

        

        $result=$db->query($query)->fetch();
        // var_dump($result);

        if ($result["ema_user"]==$user->getEmail()) {
            return true;
        } elseif ($result["ema_user"]=="") {
            return false;
        }
    }


    public static function getAllUsers()
    {
        $db= DbConnection::getInstance();

        $query = "select * from usuarios";

        $commit=$db->prepare($query);
        $commit->execute();
        
        $arr=$commit->fetchAll();
        
        return $arr;
    }
}
