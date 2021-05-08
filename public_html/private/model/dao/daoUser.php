<?php



class DaoUser
{
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

    public static function updataAvatar($user)
    {
        $db= DbConnection::getInstance();

        $query="UPDATE usuarios SET ava_user=? ;";

        $commit = $db->prepare($query);

        $commit->execute([$user->getAvatar()]);
    }



    public static function delete($user)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from usuarios where id={$user->getId()} ;";

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

    public static function getByEmail($email)
    {
        $db=  DbConnection::getInstance();

        $query="select * from usuarios where ema_user='{$email}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from usuarios where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
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
