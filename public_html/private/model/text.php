<?php

class Text
{
    private $id;
    private $idText;
    private $txtText;
    private $lang;
    private $idCat;
    private $autorText;
    private $createdAt;
    


    public function __construct($id="", $idText="", $txtText="", $lang="", $idCat="", $autorText="", $createdAt="")
    {
        $this->id=$id;
        $this->idText=$idText;
        $this->txtText=$txtText;
        $this->lang=$lang;
        $this->idCat=$idCat;
        $this->autorText=$autorText;
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
     * Get the value of txtText
     */
    public function getTxtText()
    {
        return $this->txtText;
    }

    /**
     * Set the value of txtText
     *
     * @return  self
     */
    public function setTxtText($txtText)
    {
        $this->txtText = $txtText;

        return $this;
    }

    /**
     * Get the value of lang
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set the value of lang
     *
     * @return  self
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get the value of idCat
     */
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * Set the value of idCat
     *
     * @return  self
     */
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;

        return $this;
    }

    /**
     * Get the value of autorText
     */
    public function getAutorText()
    {
        return $this->autorText;
    }

    /**
     * Set the value of autorText
     *
     * @return  self
     */
    public function setAutorText($autorText)
    {
        $this->autorText = $autorText;

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
}
