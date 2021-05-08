<?php
include_once("dao/daoUser.php");
include_once("dbConnection.php");


class User
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $avatar;
    private $createdAt;


    public function __construct($id="", $name="", $email="", $password="", $avatar="", $createdAt="")
    {
        $this->id=$id;
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
        $this->avatar=$avatar;
        $this->createdAt=$createdAt;
    }

    

    



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function insert()
    {
        DaoUser::insert($this);
    }

    public function delete()
    {
        DaoUser::delete($this);
    }
    
    public static function getById($id)
    {
        $daoResult =DaoUser::getById($id);

        $user = new User($daoResult['id'], $daoResult['nom_user'], $daoResult['ema_user'], $daoResult['pas_user'], $daoResult['ava_user'], $daoResult['created_at']);

        return $user ;
    }
    public static function getByEmail($email)
    {
        $daoResult =DaoUser::getByEmail($email);

        $user = new User($daoResult['id'], $daoResult['nom_user'], $daoResult['ema_user'], $daoResult['pas_user'], $daoResult['ava_user'], $daoResult['created_at']);

        return $user ;
    }


    public function existingUser()
    {
        return DaoUser::existingUser($this);
    }


    public static function getAllUsers()
    {
        $daoResult = DaoUser::getAllUsers();
        $users = array();
        foreach ($daoResult as $daoUser) {
            array_push($users, new User($daoUser['id'], $daoUser['nom_user'], $daoUser['ema_user'], $daoUser['pas_user'], $daoUser['ava_user'], $daoUser['created_at']));
        }

        return $users;
    }

    public function logIn()
    {
        return  DaoUser::logIn($this->email, $this->password);
    }


    public function imprimir()
    {
        $html="";
        $rand = rand(0, 100000);
        $html.="<div id='{$rand}' class='user-div'>";
        $html.="<span >{$this->getId()}</span>";
        $html.="<span>{$this->getName()}</span>";
        $html.="<span>{$this->getEmail()}</span>";
        $html.="<span class='{$this->getAvatar()}'></span>";
        $html.="<span class='{$this->getCreatedAt()}'></span>";
        $html.="<div class='user-div-buttons'>";
        $html.="<a class='button' onclick='eliminarUsuario($rand)' >Eliminar</a>";
        $html.="<a class='button'  href='actualizarUsuario.php?userId={$this->getId()}'>Actualizar</a>";
        $html.="</div>";
        $html.="</div>";

        return $html;
    }
}
