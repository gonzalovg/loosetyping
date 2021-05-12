<?php

include_once('./private/model/text.php');
include_once('./private/model/user.php');
$custom= false;

if (isset($_GET['text']) && !empty($_GET['text'])) {
    $textObj=Text::getById($_GET['text']);
    $texto=$textObj->getTxtText();
    $custom=true;
} else {
    $textObj =Text::getRandomText();
    $texto= $textObj->getTxtText();
}




?>

<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Loosetyping </title>
    <meta name='author' content='Gonzalo Verdugo'>
    <meta name='description' content='Sitio de Gonzalo Verdugo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' type='image/icon' href='./favicon.ico'>
    <link rel="stylesheet" href="css/reboot.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.5/typed.min.js"
        integrity="sha512-1KbKusm/hAtkX5FScVR5G36wodIMnVd/aP04af06iyQTkD17szAMGNmxfNH+tEuFp3Og/P5G32L1qEC47CZbUQ=="
        crossorigin="anonymous"></script>
    <script src="js/teclado.js"></script>



    <?php include "includes/indexHead.php" ?>



</head>

<body onload="inicializarDatos()">

    <main>
        <?php include "includes/indexNav.php" ?>
        <?php




            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                $user = User::getByEmail($_SESSION['user']);
                $idUser=$user->getId();
                $idText = $textObj->getId();
             
                echo'   <input type="hidden" id="idUser"
                value="'.  $idUser.'">
            <input type="hidden" id="idText"
                value="'.$idText.'">';
            }
         
            
?>




        <section>




            <h1>

                <?php
                 if ($custom) {
                     echo '<span class="ec ec-top"></span>
                     ';
                 } else {
                     echo ' <span class="ec ec-game-die">';
                 }
                 ?>



                </span>


                <?php echo $textObj->getTitText()  ?>
            </h1>
            <p>Autor: <i><?php echo $textObj->getAutorText() ?></i>
            </p>
            <p id="texto"><?php echo $texto ?>
            </p>

            <div id="stats">

            </div>


            <div id="result"></div>



        </section>

        <?php include "includes/footer.php" ?>

    </main>
    <script src="js/general.js"></script>
    <script src="js/typed.js"></script>


</body>

</html>