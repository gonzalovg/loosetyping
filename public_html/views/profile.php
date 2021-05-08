<?php


include("../private/model/user.php");

//////////////////////////////////////////////
//OBTENCIÓN DE TODOS LOS USUARIOS




//////////////////////////////////////////////


?>


<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>

    <title> Profile </title>

    <?php include "../includes/general-head.php" ?>
    <script src="../js/icons.js"></script>



</head>

<body>

    <main>

        <?php include "../includes/nav.php" ?>

        <section id="profile-sect">
            <div id="user-data">

                <div class="profile-box">
                    <h1><?php

                   
                        $user = User::getByEmail($_SESSION['user']);
                        echo $user->getName();
                    
                    ?>
                    </h1>
                    <hr>
                    <h3 id="userEmail"><?php echo $user->getEmail()   ?>

                    </h3>
                    <div>
                        <a class="high-elem" href="../private/scripts/cerrarSesion.php">Cerrar Sesión</a>
                    </div>

                </div>
                <div class="profile-box">

                    <span
                        class="<?php echo  $user->getAvatar()?> big-avatar "></span>
                    <i class="fas fa-pencil-alt high-elem" onclick="openIconWindow()"></i>
                </div>


            </div>
            <div id="user-last-reso">

            </div>


        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>