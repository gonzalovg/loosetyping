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

    public function doGet($request)
    {
        $option = $request["option"];




        if ($option = "allU") {
            $allUsersSQL= User::getAllUsers();

            $allUsersArray = array();

            foreach ($allUsersSQL as $user) {
                # code...
                $newUser = new User($user["id"], $user["nom_user"], $user["pas_user"], $user["ema_user"], $user["ava_user"], $user["created_at"]);

                array_push($allUsersArray, $newUser);
            }

            return $allUsersArray;
        } elseif ($option="delete") {
            $id=$request['id'];
            $user = new User($id);

            header("location: ../settings.php");

            echo $user;
            $user->delete();
        }
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
