<?php

/**
 * Class DaoResolution
 */
class DaoResolution
{
    /**
     * DaoResolution constructor.
     */
    public function __construct()
    {
    }

    /**
     * Inserta un objeto Resolution en la base de datos.
     *
     * @param $resolution
     */
    public static function insert($resolution)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into resoluciones(id_user,id_text,wpm_res,tim_res) values (?,?,?,?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$resolution->getIdUser(),$resolution->getIdText(),$resolution->getWpmRes(),$resolution->getTimeRes()]);
    }
    /**
     * Elimina un objeto Resolution de la base de datos.
     *
     * @param $resolution
     */
    public static function delete($resolution)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from resoluciones where id={$resolution->getId()} ;";

        $db->query($query);
    }


    /**
     * Obtiene el resultado sql de una Resolution y lo devuelve.
     *
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from resoluciones where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    /**
     * Devuelve un array lleno de objetos Resolution.
     *
     * @return array
     */
    public static function getAllResolutions()
    {
        $db= DbConnection::getInstance();

        $query = "select * from resoluciones";

        $commit=$db->prepare($query);
        $commit->execute();
        
        $arr=$commit->fetchAll();
       
        return $arr;
    }

    public static function getUserLastsResolutions($id, $limit)
    {
        $db= DbConnection::getInstance();

        $query = "select * from resoluciones where id_user={$id} order by created_at DESC limit {$limit}";

        $commit=$db->prepare($query);
        $commit->execute();
        
        $arr=$commit->fetchAll();
       
        return $arr;
    }

    public static function getRankedResolutions($text, $time)
    {
        $db = DbConnection::getInstance();

        $query = "select * from resoluciones ";

        if ($text!='any') {
            $query.=" where id_text={$text} ";
        }

        if ($time!='all') {
            if ($text!='any') {
                $query.=" and ";
            }

           


            if ($time=='day') {
                if ($text=="any") {
                    $query.=' where created_at between ';
                }
                $query.=" DATE(now()) and  now() ";
            } elseif ($time == 'month') {
                if ($text=="any") {
                    $query.=' where created_at between ';
                }
                $query.="makedate(year(curdate()), month(curdate())) and curdate()";
            } elseif ($time=='year') {
                if ($text=="any") {
                    $query.=' where created_at between';
                }
                $query.=" makedate(year(curdate()),1) and curdate() ";
            }
        }

        $query.=" order by wpm_res desc limit 100;";
      
   
        $commit=$db->prepare($query);
        $commit->execute();
        
        $arr=$commit->fetchAll();
       
        return $arr;
    }
}
