<?php

/**
 * Class Stats
 */
class Stats
{
    private $id;
    private $idUser;
    private $wpm;
    private $maxWpm;
    private $txtFav;
    private $totRes;

    /**
     * Stats constructor.
     * @param string $id
     * @param string $idUser
     * @param string $wpm
     * @param string $maxWpm
     * @param string $txtFav
     * @param string $totRes
     */
    public function __construct($id="", $idUser="", $wpm="", $maxWpm="", $txtFav="", $totRes="")
    {
        $this->id=$id;
        $this->idUser=$idUser;
        $this->wpm=$wpm;
        $this->maxWpm=$maxWpm;
        $this->txtFav=$txtFav;
        $this->totRes=$totRes;
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
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of wpm
     */
    public function getWpm()
    {
        return $this->wpm;
    }

    /**
     * Set the value of wpm
     *
     * @return  self
     */
    public function setWpm($wpm)
    {
        $this->wpm = $wpm;

        return $this;
    }

    /**
     * Get the value of maxWpm
     */
    public function getMaxWpm()
    {
        return $this->maxWpm;
    }

    /**
     * Set the value of maxWpm
     *
     * @return  self
     */
    public function setMaxWpm($maxWpm)
    {
        $this->maxWpm = $maxWpm;

        return $this;
    }

    /**
     * Get the value of txtFav
     */
    public function getTxtFav()
    {
        return $this->txtFav;
    }

    /**
     * Set the value of txtFav
     *
     * @return  self
     */
    public function setTxtFav($txtFav)
    {
        $this->txtFav = $txtFav;

        return $this;
    }

    /**
     * Get the value of totRes
     */
    public function getTotRes()
    {
        return $this->totRes;
    }

    /**
     * Set the value of totRes
     *
     * @return  self
     */
    public function setTotRes($totRes)
    {
        $this->totRes = $totRes;

        return $this;
    }


    /**
     * Llama a DaoStats e inserta las estadísticas
     */
    public function insert()
    {
        DaoStats::insert($this);
    }

    /**
     * Llama a DaoStats y elimina las estadísiticas
     *
     */
    public function delete()
    {
        DaoStats::delete($this);
    }


    /**
     * Obtiene estadísticas a través de DaoCategory
     *
     * @param $id
     * @return Stats
     */
    public static function getById($id)
    {
        $daoResult =DaoStats::getById($id);

        $stat = new Stats($daoResult['id'], $daoResult['id_user'], $daoResult['wpm'], $daoResult['max_wpm'], $daoResult['txt_fav'], $daoResult['tot_res']);

        return $stat ;
    }

    /**
     * Obtiene todas las estadísticas de DaoStats y las devuelve con un array lleno de objetos Stat.
     *
     *
     * @return array
     */
    public static function getAllStats()
    {
        $daoResult = DaoStats::getAllStats();
        $stats = array();
        foreach ($daoResult as $daoStat) {
            array_push($stats, new Stats($daoStat['id'], $daoStat['id_user'], $daoStat['wpm'], $daoStat['max_wpm'], $daoStat['txt_fav'], $daoStat['tot_res']));
        }
        return $stats;
    }
}
