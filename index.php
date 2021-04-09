<?php
// $texto = "From the tip of his wand burst the silver doe. She landed on the office floor, bounded once across the office, and soared out of the window. Dumbledore watched her fly away, and as her silvery glow faded he turned back to Snape, and his eyes were full of tears.";
// $texto = "hola";
$texto = "Es la ciudad con la más alta concentración de bienes históricos y arquitectónicos del mundo";
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



    <?php include "includes/general-head.php" ?>



</head>

<body onload="inicializarDatos()">

    <main>

        <?php include "includes/nav.php" ?>

        <section>




            <h1><span class="ec ec-game-die"></span>


                TEXTO: LOREM</h1>
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