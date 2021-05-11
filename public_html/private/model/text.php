<?php

include_once('dao/daoText.php');
include_once('dbConnection.php');

/**
 * Class Text
 */
class Text
{
    private $id;
    private $titText;
    private $txtText;
    private $lang;
    private $idCat;
    private $autorText;
    private $createdAt;


    /**
     * Text constructor.
     * @param string $id
     * @param string $titText
     * @param string $txtText
     * @param string $lang
     * @param string $idCat
     * @param string $autorText
     * @param string $createdAt
     */
    public function __construct($id="", $titText="", $txtText="", $lang="", $idCat="", $autorText="", $createdAt="")
    {
        $this->id=$id;
        $this->titText=$titText;
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
     * Get the value of titText
     */
    public function getIdText()
    {
        return $this->titText;
    }

    /**
     * Set the value of titText
     *
     * @return  self
     */
    public function setIdText($titText)
    {
        $this->titText = $titText;

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
     * Get the value of titText
     */
    public function getTitText()
    {
        return $this->titText;
    }

    /**
     * Set the value of titText
     *
     * @return  self
     */
    public function setTitText($titText)
    {
        $this->titText = $titText;

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


    /**
     * Llama a DaoText e inserta el texto.
     */
    public function insert()
    {
        DaoText::insert($this);
    }

    /**
     * Llama a DaoText y elimina el texto
     */
    public function delete()
    {
        DaoText::delete($this);
    }


    /**
     * Obtiene un texto a través de DaoText
     *
     * @param $id
     * @return Text
     */
    public static function getById($id)
    {
        $daoResult =DaoText::getById($id);

        $text = new Text($daoResult['id'], $daoResult['tit_text'], $daoResult['txt_text'], $daoResult['lang_text'], $daoResult['id_cat'], $daoResult['ori_text'], $daoResult['created_at']);

        return $text ;
    }

    /**
     * Obtiene todos los textos a través de DaoText y los devuelve en un array lleno de objetos Text
     *
     *
     * @return array
     */
    public static function getAllTexts()
    {
        $daoResult = DaoText::getAllTexts();
        $texts = array();
        foreach ($daoResult as $daoText) {
            array_push($texts, new Text($daoText['id'], $daoText['tit_text'], $daoText['txt_text'], $daoText['lang_text'], $daoText['id_cat'], $daoText['ori_text'], $daoText['created_at']));
        }

        return $texts;
    }

    /**
     * Obtiene un texto aleatorio desde la base de datos.
     *
     * @return Text
     */
    public static function getRandomText()
    {
        $daoResult =DaoText::getRandomText();

        $text = new Text($daoResult['id'], $daoResult['tit_text'], $daoResult['txt_text'], $daoResult['lang_text'], $daoResult['id_cat'], $daoResult['ori_text'], $daoResult['created_at']);

        return $text;
    }
}
