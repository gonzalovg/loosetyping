<?php

/**
 * Class DaoStats
 */
class DaoStats
{
    /**
     * DaoStats constructor.
     */
    public function __construct()
    {
    }

    /**
     * Inserta un objeto Stat en la base de datos.
     *
     * @param $stat
     */
    public static function insert($stat)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into estadisticas(id_user,wpm,max_wpm,txt_fav,txt_fav,tot_res) values (?,?,?,?,?,?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$stat->getIdUser(),$stat->getWpm(),$stat->getMaxWpm(),$stat->getTxtFav(),$stat->getTotRes()]);
    }

    /**
     * Elimina un objeto Stat de la base de datos.
     *
     * @param $stat
     */
    public static function delete($stat)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from estadisticas where id={$stat->getId()} ;";

        $db->query($query);

        // $commit = $db->prepare($query);
        // $commit->execute([$stat->getId()]);
    }


    /**
     * Obtiene un objeto Stat de la base de datos.
     *
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from estadisticas where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    /**
     * Obtiene un array lleno de todos los objetos Stat desde la base de datos.
     *
     * @return array
     */
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
