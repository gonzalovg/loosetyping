<?php
include_once('dao/daoResolution.php');
include_once('dbConnection.php');

/**
 * Abstracción del resultado de un usuario al realizar una resolución en la aplicación.
 *
 * Class Resolution
 */
class Resolution
{
    private $id;
    private $idUser;
    private $idText;
    private $wpmRes;
    private $timeRes;
    private $createdAt;

    /**
     * Resolution constructor.
     * @param string $id
     * @param string $idUser
     * @param string $idText
     * @param string $wpmRes
     * @param string $timeRes
     * @param string $createdAt
     */
    public function __construct($id="", $idUser="", $idText="", $wpmRes="", $timeRes="", $createdAt="")
    {
        $this->id=$id;
        $this->idUser=$idUser;
        $this->idText=$idText;
        $this->wpmRes=$wpmRes;
        $this->timeRes=$timeRes;
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
     * Get the value of idText
     */
    public function getIdText()
    {
        return $this->idText;
    }

    /**
     * Set the value of idText
     *
     * @return  self
     */
    public function setIdText($idText)
    {
        $this->idText = $idText;

        return $this;
    }

    /**
     * Get the value of wpmRes
     */
    public function getWpmRes()
    {
        return $this->wpmRes;
    }

    /**
     * Set the value of wpmRes
     *
     * @return  self
     */
    public function setWpmRes($wpmRes)
    {
        $this->wpmRes = $wpmRes;

        return $this;
    }

    /**
     * Get the value of timeRes
     */
    public function getTimeRes()
    {
        return $this->timeRes;
    }

    /**
     * Set the value of timeRes
     *
     * @return  self
     */
    public function setTimeRes($timeRes)
    {
        $this->timeRes = $timeRes;

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
     * Llama a DaoResolution e inserta la resolucíón
     *
     */
    public function insert()
    {
        DaoResolution::insert($this);
    }


    /**
     * Llama da DaoResolución y elimina la resolución.
     */
    public function delete()
    {
        DaoResolution::delete($this);
    }

    /**
     *
     * Obtiene una resolución a través de DaoCategory .
     *
     * @param $id
     * @return Resolution
     */
    public static function getById($id)
    {
        $daoResult =DaoResolution::getById($id);

        $text = new Resolution($daoResult['id'], $daoResult['id_user'], $daoResult['id_text'], $daoResult['wpm_res'], $daoResult['tim_res'], $daoResult['created_at']);

        return $text ;
    }

    /**
     * Obtiene todas las resoluciones desde DaoResolutions y las devuelve en un array lleno de objetos Resolution.
     *
     *
     * @return array
     */
    public static function getAllResolutions()
    {
        $daoResult = DaoResolution::getAllResolutions();
        $resolutions = array();
        foreach ($daoResult as $daoResolution) {
            array_push($resolutions, new Resolution($daoResolution['id'], $daoResolution['id_user'], $daoResolution['id_text'], $daoResolution['wpm_res'], $daoResolution['tim_res'], $daoResolution['created_at']));
        }

        return $resolutions;
    }


    public function imprimir()
    {
        $rand=rand(0, 10000000);
        $html="";

        $html.="<div id='{$rand}' class='record-row'>";
        $html.=" <div class='record-data'>#".$this->id."    </div>";
        $html.=" <div class='record-data'><a href='profile.php?id=".$this->idUser." '>".$this->idUser."</a>    </div>";
        $html.=" <div class='record-data'>".$this->idText."    </div>";
        $html.=" <div class='record-data'>".$this->wpmRes."    </div>";
        $html.=" <div class='record-data'>".$this->timeRes."    </div>";
        $html.=" <div class='record-data'>".$this->createdAt."    </div>";
        $html.=" <div class='record-data'><span onclick='eliminarResolution({$this->id},{$rand})' class='ec ec-negative-squared-cross-mark'></span></div>";
        $html.="</div>";

        return $html;
    }
}
