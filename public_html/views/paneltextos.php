<?php



include("../private/model/text.php");


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
        <?php include "../includes/nav.php";?>

        <section>
            <h1>LOOSETYPING (Text) CONTROL PANEL</h1>



            </div>


        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>