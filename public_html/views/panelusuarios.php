<?php


include("../private/model/user.php");

//////////////////////////////////////////////
//OBTENCIÓN DE TODOS LOS USUARIOS

$allUsers=User::getAllUsers();

//////////////////////////////////////////////


?>


<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Ranking </title>
    <meta name='author' content='Gonzalo Verdugo'>
    <meta name='description' content='Sitio de Gonzalo Verdugo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' type='image/icon' href='../favicon.ico'>
    <link rel="stylesheet" href="../css/reboot.css">
    <script src="../js/user.js"></script>






    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>

        <?php include "../includes/nav.php" ?>

        <section>
            <h1>LOOSETYPING (Users) CONTROL PANEL</h1>

            <div class="record-header">
                <div class="record-data"><b>ID</b></div>
                <div class="record-data"><b>NOMBRE</b></div>
                <div class="record-data"><b>CORREO</b></div>
                <div class="record-data"><b>AVATAR</b></div>
                <div class="record-data"><b>CREATED_AT</b></div>
                <div class="record-data"><b>PERMMISOS</b></div>
                <div class="record-data"><b>ACCIONES</b></div>

            </div>

            <div id="column-div">

                <?php

                    foreach ($allUsers as $user) {
                        echo $user->imprimir();
                    }
                
                
                ?>
            </div>


        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>