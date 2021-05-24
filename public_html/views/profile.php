<?php


include("../private/model/user.php");
include("../private/model/resolution.php");
include("../private/model/text.php");





?>


<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>

    <title> Profile </title>

    <?php include "../includes/general-head.php" ?>
    <script src="../js/icons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"
        integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</head>

<body>

    <main>

        <?php include "../includes/nav.php" ?>

        <section id="profile-sect mg-20">
            <div id="user-data">
                <input type="hidden" value=<?php echo $user->getId()?> id="data">
                <div class="profile-box">
                    <h1><?php
                        $user = "";
                        if (isset($_SESSION['user']) && !empty($_SESSION['user']) && empty($_GET['id'])) {
                            $user = User::getByEmail($_SESSION['user']);
                        } elseif (($_GET['id']) && !empty($_GET['id'])) {
                            $user = User::getById($_GET['id']);
                        } else {
                            header("location: ../index.php");
                        }
                   
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
                <div class="profile-box ">

                    <span
                        class="<?php echo  $user->getAvatar()?> big-avatar "></span>
                    <?php
                        
                            if ($user->getEmail()==$_SESSION['user']) {
                                echo ' <i class="fas fa-pencil-alt high-elem" onclick="openIconWindow()"></i>';
                            }
                        
                        ?>

                </div>


            </div>
            <div id="user-last-reso mg-20">
                <h1>Últimas resoluciones de <?php echo $user->getName() ?>
                </h1>

                <div class="record-header">
                    <div class="record-data"><b>TEXTO</b></div>
                    <div class="record-data"><b>WPM</b></div>
                    <div class="record-data"><b>TIEMPO</b></div>


                </div>
                <?php
                    
                    
                    $lastResolutions=Resolution::getUserLastsResolutions($user->getId(), 10);

                    foreach ($lastResolutions as $resolution) {
                        $texto = Text::getById($resolution->getIdText());
                        echo $resolution->imprimirSinFuncion($texto->getTitText());
                    }
                    
                    
                    ?>
            </div>

            <div class="profile-box" id="user-stats">
                <?php
            
            $stats = $user->imprimirStats();

                    echo $stats;

            

            

            
            ?>

            </div>
            <div class="mg-20">
                <h1>Ratio de Aciertos/Fallos</h1>
                <div id="keys-ratio"></div>
            </div>




        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>
    <script src="../js/chart.js" type="module"></script>


</body>

</html>