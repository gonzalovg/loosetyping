<?php

class DaoCategory
{
    public function __construct()
    {
    }


    public static function insert($category)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into categorias(nom_cat) values (?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$category->getName()]);
    }


    public static function delete($category)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from categorias where id={$category->getId()} ;";

        $db->query($query);
    }


    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from categorias where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }
}
