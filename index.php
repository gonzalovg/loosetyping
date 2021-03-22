<?php
// $texto = "From the tip of his wand burst the silver doe. She landed on the office floor, bounded once across the office, and soared out of the window. Dumbledore watched her fly away, and as her silvery glow faded he turned back to Snape, and his eyes were full of tears.";
$texto = "La libertad, Sancho, es uno de los más preciosos dones que a los hombres dieron los cielos; con ella no pueden igualarse los tesoros que encierra la tierra ni el mar encubre; por la libertad";
?>

<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Gonzalo Verdugo </title>
    <meta name='author' content='Gonzalo Verdugo'>
    <meta name='description' content='Sitio de Gonzalo Verdugo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' type='image/icon' href='./favicon.ico'>
    <link rel="stylesheet" href="css/reboot.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.5/typed.min.js"
        integrity="sha512-1KbKusm/hAtkX5FScVR5G36wodIMnVd/aP04af06iyQTkD17szAMGNmxfNH+tEuFp3Og/P5G32L1qEC47CZbUQ=="
        crossorigin="anonymous"></script>
    <script src="pruebas/teclado.js"></script>



    <?php include "includes/general-head.php" ?>



</head>

<body onload="prepararResolucion()">
    <!-- <span id="hiddenHeader">LOOSETYPING</span> -->
    <main>

        <?php include "includes/nav.php" ?>

        <section>




            <h1>TEXTO: LOREM</h1>
            <p id="texto"><?php echo $texto ?>
            </p>

            <div id="stats">





            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


        </section>

        <?php include "includes/footer.php" ?>

    </main>
    <script src="js/general.js"></script>
    <script src="js/typed.js"></script>


</body>

</html>