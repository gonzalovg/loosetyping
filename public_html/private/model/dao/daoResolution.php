<?php

class DaoResolution
{
    public function __construct()
    {
    }

    public static function insert($resolution)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into resoluciones(id_user,id_text,wpm_res,tim_res) values (?,?,?,?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$resolution->getIdUser(),$resolution->getIdText(),$resolution->getWpmRes(),$resolution->getTimeRes()]);
    }

    public static function delete($resolution)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from resoluciones where id={$resolution->getId()} ;";

        $db->query($query);
    }

    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from resoluciones where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    public static function getAllResolutions()
    {
        $db= DbConnection::getInstance();

        $query = "select * from resoluciones";

        $commit=$db->prepare($query);
        $commit->execute();
        
        $arr=$commit->fetchAll();
       
        return $arr;
    }
}
