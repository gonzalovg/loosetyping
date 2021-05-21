<?php

/**
 * Class DaoText
 */
class DaoText
{
    /**
     * DaoText constructor.
     */
    public function __construct()
    {
    }

    /**
     * Inserta un objeto Text en la base de datos.
     *
     * @param $texto
     */
    public static function insert($texto)
    {
        $db= DbConnection::getInstance();
        
        $query="insert into textos(tit_text,txt_text,lang_text,id_cat,ori_text) values (?,?,?,?,?)";
       
        $commit = $db->prepare($query);
        $commit->execute([$texto->getTitText(),$texto->getTxtText(),$texto->getLang(),$texto->getIdCat(),$texto->getAutorText()]);
    }


    /**
     * Actualiza un texto en la bd
     */
    public static function update($texto)
    {
        $db = DbConnection::getInstance();

        $query = "UPDATE textos set tit_text=?,txt_text=?,lang_text=?,ori_text=? where id=? ;";
        $commit=$db->prepare($query);
        print_r($texto);
        $commit->execute([$texto->getTitText(),$texto->getTxtText(),$texto->getLang(),$texto->getAutorText(),$texto->getId()]);
    }


    /**
     * Elimina un objeto Text de la base de datos.
     *
     * @param $texto
     */
    public static function delete($texto)
    {
        $db= DbConnection::getInstance();
        
        $query="delete from textos where id={$texto->getId()} ;";

        $db->query($query);

        // $commit = $db->prepare($query);
        // $commit->execute([$texto->getId()]);
    }

    /**
     *
     * Obtiene un objeto Text de la base de datos.
     *
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $db=  DbConnection::getInstance();

        $query="select * from textos where id='{$id}';";

        $result = $db->query($query)->fetch();

        return $result;
    }

    /**
     * Obtiene un array de todos los objetos Text de la base de datos.
     *
     * @return array
     */
    public static function getAllTexts()
    {
        $db= DbConnection::getInstance();

        $query = "SELECT * from textos";

        $commit=$db->prepare($query);
        $commit->execute();
        
        $arr=$commit->fetchAll();
       
        return $arr;
    }

    /**
     * Obtiene el resultado sql de un objeto Text de la base de datos.
     *
     * @return mixed
     */
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
