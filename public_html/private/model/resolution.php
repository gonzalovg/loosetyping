<?php
include_once('dao/daoResolution.php');
include_once('dbConnection.php');
class Resolution
{
    private $id;
    private $idUser;
    private $idText;
    private $wpmRes;
    private $timeRes;
    private $createdAt;

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

    public function insert()
    {
        DaoResolution::insert($this);
    }

    public function delete()
    {
        DaoResolution::delete($this);
    }
    
    public static function getById($id)
    {
        $daoResult =DaoResolution::getById($id);

        $text = new Resolution($daoResult['id'], $daoResult['id_user'], $daoResult['id_text'], $daoResult['wpm_res'], $daoResult['tim_res'], $daoResult['created_at']);

        return $text ;
    }


    public static function getAllTexts()
    {
        $daoResult = DaoResolution::getAllResolutions();
        $resolutions = array();
        foreach ($daoResult as $daoResolution) {
            array_push($resolutions, new Resolution($daoResolution['id'], $daoResolution['id_user'], $daoResolution['id_text'], $daoResolution['wpm_res'], $daoResult['tim_res'], $daoResult['created_at']));
        }

        return $resolutions;
    }
}
