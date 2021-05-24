<?php
include_once("dao/daoUser.php");
include_once("dbConnection.php");

/**
 * Class User
 */
class User
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $avatar;
    private $createdAt;
    private $permisos;

    /**
     * User constructor.
     * @param string $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $avatar
     * @param string $createdAt
     * @param string $permisos
     */
    public function __construct($id="", $name="", $email="", $password="", $avatar="", $createdAt="", $permisos="")
    {
        $this->id=$id;
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
        $this->avatar=$avatar;
        $this->createdAt=$createdAt;
        $this->permisos=$permisos;
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

    /**
     * Get the value of permisos
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Set the value of permisos
     *
     * @return  self
     */
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;

        return $this;
    }


    /**
     * Llama a DaoUser e inserta el usuario.
     */
    public function insert()
    {
        DaoUser::insert($this);
    }


    /**
     * Actualiza los datos del objeto usuario a través de DaoUser.
     */
    public function update()
    {
        DaoUser::update($this);
    }

    /**
     * Actualiza el avatar del usuario a través de DaoUser.
     */
    public function updateAvatar()
    {
        DaoUser::updataAvatar($this);
    }


    /**
     * Elimina el usuario a través de DaoUser.
     */
    public function delete()
    {
        DaoUser::delete($this);
    }


    /**
     * Obtiene un usuario a través de DaoUser, por el Id.
     *
     * @param $id
     * @return User
     */
    public static function getById($id)
    {
        $daoResult =DaoUser::getById($id);

        $user = new User($daoResult['id'], $daoResult['nom_user'], $daoResult['ema_user'], $daoResult['pas_user'], $daoResult['ava_user'], $daoResult['created_at'], $daoResult['per_user']);

        return $user ;
    }

    /**
     * Obtiene un usuario a través de DaoUser, por el Correo.
     *
     * @param $email
     * @return User
     */
    public static function getByEmail($email)
    {
        $daoResult =DaoUser::getByEmail($email);

        $user = new User($daoResult['id'], $daoResult['nom_user'], $daoResult['ema_user'], $daoResult['pas_user'], $daoResult['ava_user'], $daoResult['created_at'], $daoResult['per_user']);

        return $user ;
    }

    /**
     * Comprueba si el usuario ya existe a través de DaoUser.
     *
     *
     * @return bool
     */
    public function existingUser()
    {
        return DaoUser::existingUser($this);
    }

    /**
     * Obtiene todos los usuarios a través de DaoUser y los devuelve en un array lleno de Usuarios.
     *
     *
     * @return array
     */
    public static function getAllUsers()
    {
        $daoResult = DaoUser::getAllUsers();
        $users = array();
        foreach ($daoResult as $daoUser) {
            array_push($users, new User($daoUser['id'], $daoUser['nom_user'], $daoUser['ema_user'], $daoUser['pas_user'], $daoUser['ava_user'], $daoUser['created_at'], $daoUser['per_user']));
        }

        return $users;
    }

    public function getStats()
    {
        return DaoUser::getStats($this);
    }

    public function imprimirStats()
    {
        $stats = $this->getStats();


        $html='';
        if ($stats[0][0]!=null) {
            for ($i=0; $i <sizeof($stats[0]) ; $i++) {
                $html.='<div class="stat"><p class="stat-value">'.$stats[0][$i].'</p><p>'.$stats[1][$i].'</p></div>';
            }
        }
        

        return $html;
    }

    public function logIn()
    {
        return  DaoUser::logIn($this->email, $this->password);
    }


    public function imprimir()
    {
        $html="";
        $rand = rand(0, 100000);
        $html.="<div id='{$rand}' class='user-div record-row'>";
        $html.="<div class='record-data' ><a href='profile.php?id=".$this->id."'>#{$this->getId()}</a></div>";
        $html.="<div class='record-data'>{$this->getName()}</div>";
        $html.="<div class='record-data small'>{$this->getEmail()}</div>";
        $html.="<div class='{$this->getAvatar()} record-data center'></div>";
        $html.="<div class='record-data small center'>{$this->getCreatedAt()}</div>";
        $html.="<div class='record-data center'>{$this->getPermisos()}</div>";
        $html.="<div class='user-div-buttons' record-data>";
        $html.="<a class='button' onclick='eliminarUsuario({$rand},{$this->id})' >Eliminar</a>";
        $html.="<a class='button'  href='actualizarUsuario.php?userId={$this->id}'>Actualizar</a>";
        $html.="</div>";
        $html.="</div>";

        return $html;
    }
}
