<?php

class DaoStats
{
    public function __construct()
    {
    }

    public static function insert($stat)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into estadisticas(id_user,wpm,max_wpm,txt_fav,txt_fav,tot_res) values (?,?,?,?,?,?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$stat->getIdUser(),$stat->getWpm(),$stat->getMaxWpm(),$stat->getTxtFav(),$stat->getTotRes()]);
    }

    public static function delete($stat)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from estadisticas where id={$stat->getId()} ;";

        $db->query($query);

        // $commit = $db->prepare($query);
        // $commit->execute([$stat->getId()]);
    }

    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from estadisticas where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    public static function getAllStats()
    {
        $db= DbConnection::getInstance();

        $query = "select * from estadisticas";

        $commit=$db->prepare($query);
        $commit->execute();
        
        $arr=$commit->fetchAll();
       
        return $arr;
    }
}
