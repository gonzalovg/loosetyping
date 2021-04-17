<?php



include("../private/model/user.php");
include("../private/model/dbConnection.php");
include("../private/model/dao/daoUser.php");
// var_dump(scandir("../private/model"));


class UserController
{
    private $name;

    public function __construct()
    {
    }

    public function doGet($request, $reponse)
    {
    }



    public function doPost($request, $reponse)
    {
        $this->storeUser($request);
    }



    public function storeUser($request)
    {
        $user = new User("", $request["username"], $request["pass"], $request["correo"], "", "");

        if ($user->existingUser()) {
            return false;
        } else {
            $user->insert();
        }
    }



    public function getUser($id)
    {
    }


    public function getUsers($key, $filter, $quantity)
    {
    }
}
