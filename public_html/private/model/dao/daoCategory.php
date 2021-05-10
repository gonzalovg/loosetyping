<?php

/**
 * Class DaoCategory
 */
class DaoCategory
{
    /**
     * DaoCategory constructor.
     */
    public function __construct()
    {
    }

    /**
     * Inserta un objeto Category en la base de datos.
     *
     * @param $category
     */
    public static function insert($category)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into categorias(nom_cat) values (?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$category->getName()]);
    }

    /**
     * Elimina un objeto Category en la base de datos.
     *
     * @param $category
     */
    public static function delete($category)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from categorias where id={$category->getId()} ;";

        $db->query($query);
    }

    /**
     * Obtiene los campos sql de un objeto Category y los devuelve.
     *
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from categorias where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }
}
