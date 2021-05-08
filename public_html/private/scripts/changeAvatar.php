<?php


include_once('../model/user.php');


$avatar = $_GET['avatar'];

$user = User::getByEmail($_GET['userEmail']);

$user->setAvatar($avatar);

echo "actualizado";
$user->updateAvatar();
