<?php


include("../private/model/user.php");

//////////////////////////////////////////////
//OBTENCIÓN DE TODOS LOS USUARIOS
session_start();
if (isset($_SESSION)&& !empty($_SESSION)) {
    $user = User::getByEmail($_SESSION['user']);
}


//////////////////////////////////////////////


?>


<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Profile </title>
    <meta name='author' content='Gonzalo Verdugo'>
    <meta name='description' content='Sitio de Gonzalo Verdugo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' type='image/icon' href='../favicon.ico'>
    <link rel="stylesheet" href="../css/reboot.css">
    <script src="../js/deletes.js"></script>





    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>

        <?php include "../includes/nav.php" ?>

        <section>
            <div class="profile-box">
                <h1><?php echo $user->getName()  ?>
                </h1>
            </div>
            <div class="profile-box"></div>


        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>