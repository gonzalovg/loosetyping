<?php

include_once('../private/model/resolution.php');
include_once('../private/model/text.php');
include_once('../private/model/user.php');



$maxWpmResolutions = Resolution::getRankedResolutions('any', 'all time');

$texts = Text::getAllTexts();

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
    <script src="../js/resolution.js"></script>





    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>

        <?php include "../includes/nav.php" ?>

        <section>
            <h1><span class="ec ec-trophy"></span>
                RANKING
            </h1>

            <div class="record-options">
                <select onchange="getRanks()" name="texto">
                    <option value="any">...</option>
                    <?php
                
                foreach ($texts as $text) {
                    echo "<option value='{$text->getId()}'>{$text->getTitText()}</option>";
                }
                
                
                ?>

                </select>

                <select onchange="getRanks()" name="tiempo">
                    <option value="day">24h</option>
                    <option value="month">Último mes</option>
                    <option value="year">Último año</option>
                    <option value="all">Historico</option>
                </select>

            </div>

            <!-- <div class="records">
                <div id="record-row">
                    <div class="record-data"><b>Posición</b></div>
                    <div class="record-data"><b>Usuario</b></div>
                    <div class="record-data"><b>Texto</b></div>
                    <div class="record-data"><b>WPM</b></div>
                    <div class="record-data"><b>Tiempo</b></div>
                </div> -->

            <div class="records">
                <div class="record-header">
                    <div class="record-data"><b>Posición</b></div>

                    <div class="record-data"><b>Texto</b></div>
                    <div class="record-data"><b>WPM</b></div>
                    <div class="record-data"><b>Tiempo</b></div>
                </div>
                <div id='ranked-res'>

                    <?php
                    $counter=1;
                     foreach ($maxWpmResolutions as $resolution) {
                         $text=Text::getById($resolution->getIdText());
                         $user=User::getById($resolution->getIdUser());
                         echo $resolution->imprimirRank($text->getTitText(), $user->getName(), $user->getId(), $user->getAvatar(), $counter);
                         $counter++;
                     }
 ?>

                </div>



            </div>








        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>