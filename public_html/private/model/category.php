<?php

include_once("dao/daoCategory.php");
include_once('dbConnection.php');

/**
 * Class Category
 */
class Category
{
    private $id;
    private $name;

    /**
     * Category constructor.
     * @param string $id
     * @param string $name
     */
    public function __construct($id="", $name="")
    {
        $this->id=$id;
        $this->name=$name;
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
     * LLama a la clase DaoCategory e inserta la categoría.
     */
    public function insert()
    {
        DaoCategory::insert($this);
    }

    /**
     * Llama a la clase DaoCategory y eliminar la categoría.
     */
    public function delete()
    {
        DaoCategory::delete($this);
    }

    /**
     * Obtiene la categoría a través de DaoCategory y la devuelve.
     *
     *
     * @param $id
     * @return Category
     *
     */
    public function getById($id)
    {
        $daoResult = DaoCategory::getById($id);

        $category= new Category($daoResult['id'], $daoResult['nom_cat']);
    
        return $category;
    }
}
