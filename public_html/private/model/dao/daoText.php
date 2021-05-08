<?php

class DaoText
{
    public function __construct()
    {
    }

    public static function insert($texto)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into textos(tit_text,txt_text,lang_text,id_cat,ori_text) values (?,?,?,?,?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$texto->getTitText(),$texto->getTxtText(),$texto->getLang(),$texto->getIdCat(),$texto->getAutorText()]);
    }

    public static function delete($texto)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from textos where id={$texto->getId()} ;";

        $db->query($query);

        // $commit = $db->prepare($query);
        // $commit->execute([$texto->getId()]);
    }

    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from textos where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    public static function getAllTexts()
    {
        $db= DbConnection::getInstance();

        $query = "SELECT * from textos";

        $commit=$db->prepare($query);
        $commit->execute();
        
        $arr=$commit->fetchAll();
       
        return $arr;
    }

    public static function getRandomText()
    {
        $db= DbConnection::getInstance();

        $query="SELECT * FROM textos
        ORDER BY RAND()
        LIMIT 1";

 

        $result = $db->query($query)->fetch();

        return $result;
    }
}
