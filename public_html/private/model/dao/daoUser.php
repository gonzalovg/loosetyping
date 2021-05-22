<?php


/**
 * Class DaoUser
 */
class DaoUser
{
    /**
     * DaoUser constructor.
     */
    public function __construct()
    {
        // $this->tabla="usuarios";
    }

    /**
     * Inserta un objeto User en la base de datos.
     *
     * @param $user
     */
    public static function insert($user)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into usuarios(nom_user,ema_user,pas_user,per_user) values (?,?,?,?)";


       
        $commit = $db->prepare($query);
        $commit->execute([$user->getName(),$user->getEmail(),md5($user->getPassword()), $user->getPermisos()]);
    }

    /**
     * Actualiza los datos de un usario en la base de datos
     *
     * @param $user
     */
    public static function update($user)
    {
        $db= DbConnection::getInstance();

        $query = "";

        if ($user->getPassword()=="") {
            $query= "UPDATE usuarios SET nom_user=?,ema_user=?,per_user=? where id={$user->getId()} ";
            $commit = $db->prepare($query);
        
            
            $commit->execute([$user->getName(),$user->getEmail(),$user->getPermisos()]);
        } elseif ($user->getPassword()!="") {
            $query= "UPDATE usuarios SET nom_user=?,ema_user=?,pas_user=?, per_user=? where id={$user->getId()} ";
           
            $commit = $db->prepare($query);
            $commit->execute([$user->getName(),$user->getEmail(), md5($user->getPassword()),$user->getPermisos()]);
        }
    }


    public function getStats($user)
    {
        $db = DbConnection::getInstance();

        $maxWpmQuery = "select max(wpm_res) as `maxWpm`,avg(wpm_res) as `avgWpm`,max(id_text) as `txtFav`,count(*) as `totRes` from resoluciones where id_user=".$user->id." ;";
    }

    /**
     * Actualiza el avatar de un usuario en la base de datos.
     *
     * @param $user
     */
    public static function updataAvatar($user)
    {
        $db= DbConnection::getInstance();

        $query="UPDATE usuarios SET ava_user=? where id=?;";

        $commit = $db->prepare($query);

        $commit->execute([$user->getAvatar(),$user->getId()]);
    }


    /**
     * Elimina un usarios de la base de datos.
     *
     * @param $user
     */
    public static function delete($user)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from usuarios where id={$user->getId()} ;";

        $db->query($query);

        // $commit = $db->prepare($query);
        // $commit->execute([$user->getId()]);
    }

    /**
     * Comprueba si el usuario ya existe.
     *
     * @param $user
     * @return bool
     */
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

    /**
     * True si el usuario aporta los credenciales correctos a los respectivos en la base de datos.
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public static function logIn($email, $password)
    {
        $db = DbConnection::getInstance();

        $query = "select * from usuarios where ema_user='{$email}' and pas_user=md5('$password') ;";
     

        $result = $db->query($query)->fetch();

        
        if ($result!="") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Obtiene el resultado sql de un objeto User de la base de datos, por email.
     *
     * @param $email
     * @return mixed
     */
    public static function getByEmail($email)
    {
        $db=  DbConnection::getInstance();

        $query="select * from usuarios where ema_user='{$email}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    /**
     * Obtiene el resultado sql de un objeto User de la base de datos, por id   *
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from usuarios where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    /**
     * Obtiene un array de Users de la base de datos
     *
     * @return array
     */
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
