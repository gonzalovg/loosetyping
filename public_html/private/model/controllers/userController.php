<?php



// include("");
include "../User.php";


class UserController
{
    private $name;

    public function __construct($name)
    {
        $this->name=$name;
    }


    public function storeUser($data)
    {
    }



    public function getUser($id)
    {
    }


    public function getUsers($key, $filter, $quantity)
    {
    }
}
