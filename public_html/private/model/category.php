<?php

include_once("dao/daoCategory.php");
include_once('dbConnection.php');

class Category
{
    private $id;
    private $name;


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

    public function insertar()
    {
        DaoCategory::insert($this);
    }

    public function delete()
    {
        DaoCategory::delete($this);
    }

    public function getById($id)
    {
        $daoResult = DaoCategory::getById($id);

        $category= new Category($daoResult['id'], $daoResult['nom_cat']);
    
        return $category;
    }
}
