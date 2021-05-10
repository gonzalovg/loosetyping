<?php


include "../includes/nav.php";
include("../private/model/resolution.php");


$resolutions = Resolution::getAllResolutions();










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
    <script src="../js/userAJAX.js"></script>






    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>

        <section>
            <h1>LOOSETYPING (Resolutions) CONTROL PANEL</h1>


            <div class="records">
                <div class="record-header">
                    <div class="record-data"><b>ID</b></div>
                    <div class="record-data"><b>USUARIO</b></div>
                    <div class="record-data"><b>TEXTO</b></div>
                    <div class="record-data"><b>WPM</b></div>
                    <div class="record-data"><b>TIEMPO</b></div>
                    <div class="record-data"><b>CREATED_AT</b></div>
                </div>

                <?php
                    foreach ($resolutions as $resolution) {
                        echo $resolution->imprimir();
                    }
                    
                
                ?>
            </div>


        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>