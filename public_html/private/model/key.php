<?php
include_once('../model/dbConnection.php');
/**
 * Clase que abstrae el ratio de pulsaciones acertadas/fallidas por tecla.
 *
 * Class Key
 */
class Key
{
    private $id;
    private $idUser;
    private $keyChar;
    private $aciertos;
    private $fallos;

    public function __construct($id="", $idUser="", $keyChar="", $aciertos="", $fallos="")
    {
        $this->id=$id;
        $this->idUser=$idUser;
        $this->keyChar=$keyChar;
        $this->aciertos=$aciertos;
        $this->fallos=$fallos;
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
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of keyChar
     */
    public function getKeyChar()
    {
        return $this->keyChar;
    }

    /**
     * Set the value of keyChar
     *
     * @return  self
     */
    public function setKeyChar($keyChar)
    {
        $this->keyChar = $keyChar;

        return $this;
    }

    /**
     * Get the value of aciertos
     */
    public function getAciertos()
    {
        return $this->aciertos;
    }

    /**
     * Set the value of aciertos
     *
     * @return  self
     */
    public function setAciertos($aciertos)
    {
        $this->aciertos = $aciertos;

        return $this;
    }

    /**
     * Get the value of fallos
     */
    public function getFallos()
    {
        return $this->fallos;
    }

    /**
     * Set the value of fallos
     *
     * @return  self
     */
    public function setFallos($fallos)
    {
        $this->fallos = $fallos;

        return $this;
    }


    public static function inicializarDB($user, $keysInfo)
    {
        $db = DbConnection::getInstance();
        // echo "<pre>";
        // print_r($keysInfo);
        // echo "</pre>";
        $keysLength =sizeof(self::convertirJsonAll($user, $keysInfo));

        $query = "insert into teclas(id_user,tecla,aciertos,fallos) values ";
        $index=0;
        foreach ($keysInfo as $key => $keyRatio) {
            $query.="({$user},'{$key}',{$keyRatio->aciertos},{$keyRatio->fallos}) ";

            

            if ($index!=$keysLength-1) {
                $query.=",";
            }
            $index++;
        }

        $db->query($query);

        // return $query;
    }

    public static function actualizarDB($user, $keysInfo)
    {
        $db = DbConnection::getInstance();
        // echo "<pre>";
        // print_r($keysInfo);
        // echo "</pre>";
        $keysLength =sizeof(self::convertirJsonTyped($user, $keysInfo));

        $query = " ";
        $index=0;
        foreach ($keysInfo as $key => $keyRatio) {
            if ($keyRatio->aciertos!=0 || $keyRatio->fallos!=0) {
                // $query.="aciertos=(" . $keyRatio->aciertos."+ teclas.aciertos), fallos=(".$keyRatio->fallos."+ teclas.fallos) where tecla='".$key."' && id_user=".$user."";
                // $query.= "update teclas set  aciertos=(( select aciertos from teclas where id_user=".$user." && tecla='".$key."' collate utf8_spanish_ci )+ ".$keyRatio->aciertos." )  , fallos=(( select fallos from teclas where id_user=".$user." && tecla='".$key."' collate utf8_spanish_ci )+ ".$keyRatio->fallos."  ) where id_user=".$user." && tecla='".$key."' collate utf8_spanish_ci ;";
                $query.= "update teclas set  aciertos=(( select aciertos from teclas where id_user=".$user." && BINARY  tecla='".$key."'  )+ ".$keyRatio->aciertos." )  , fallos=(( select fallos from teclas where id_user=".$user." && BINARY tecla='".$key."'  )+ ".$keyRatio->fallos."  ) where id_user=".$user." && BINARY tecla='".$key."'  ;";
                // if ($index!=$keysLength-1) {
                //     $query.=",";
                // }
    
                $index++;
            }
        }

        $db->query($query);

        // return $query;
    }


    public static function registrosDB($user)
    {
        $db = DbConnection::getInstance();


        $query ="select * from teclas where id_user={$user}"  ;


        $result=$db->query($query)->fetchColumn();

        // ($result);

        return $result;
    }

    public static function convertirJsonTyped($user, $keysInfo)
    {
        $typedKeys=array();

        foreach ($keysInfo as $keyChar =>$keyRatio) {
            if ($keyRatio->aciertos!=0 || $keyRatio->fallos!=0) {
                $key = new Key("", $user, $keyChar, $keyRatio->aciertos, $keyRatio->fallos);
                array_push($typedKeys, $key);
            }
        }

        return $typedKeys;
    }

    public static function convertirJsonAll($user, $keysInfo)
    {
        $typedKeys=array();

        foreach ($keysInfo as $keyChar =>$keyRatio) {
            $key = new Key("", $user, $keyChar, $keyRatio->aciertos, $keyRatio->fallos);
            array_push($typedKeys, $key);
        }

        return $typedKeys;
    }
}
