<?php

/**
 * Class Comment
 */
class Comment
{
    private $id;
    private $idUser;
    private $txtComment;
    private $createdAt;

    /**
     * Comment constructor.
     * @param string $id
     * @param string $idUser
     * @param string $txtComment
     * @param string $createdAt
     */
    private function __construct($id="", $idUser="", $txtComment="", $createdAt="")
    {
        $this->id=$id;
        $this->idUser=$idUser;
        $this->txtComment=$txtComment;
        $this->createdAt=$createdAt;
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
     * Get the value of txtComment
     */
    public function getTxtComment()
    {
        return $this->txtComment;
    }

    /**
     * Set the value of txtComment
     *
     * @return  self
     */
    public function setTxtComment($txtComment)
    {
        $this->txtComment = $txtComment;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
