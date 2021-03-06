<?php
include_once('../private/model/text.php');


$texts = Text::getAllTexts();



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
    <link rel='icon' type='image/icon' href='../favicon.ico'>
    <link rel="stylesheet" href="../css/reboot.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.5/typed.min.js"
        integrity="sha512-1KbKusm/hAtkX5FScVR5G36wodIMnVd/aP04af06iyQTkD17szAMGNmxfNH+tEuFp3Og/P5G32L1qEC47CZbUQ=="
        crossorigin="anonymous"></script>




    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>

        <?php include "../includes/nav.php" ?>

        <section>

            <h2><span class="ec ec-gift-heart"></span>
                Resoluciones personalizadas</h2>


            <?php
            
            foreach ($texts as $text) {
                echo $text->imprimirParaResolver();
            }
            
            
            
            ?>

            <!-- <div class="custom-text-container">
                <h3>TEXTO: LOREM</h3>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quaerat reprehenderit fugit suscipit
                    magni exercitationem! Eius, quidem provident quibusdam pariatur consequatur illum impedit. Sunt quos
                    distinctio fugit. Architecto, quaerat nulla!</P>
                <p class="button-text-container"><button>Resolver</button></p>

            </div>
            <div class="custom-text-container">
                <h3>TEXTO: LOREM</h3>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quaerat reprehenderit fugit suscipit
                    magni exercitationem! Eius, quidem provident quibusdam pariatur consequatur illum impedit. Sunt quos
                    distinctio fugit. Architecto, quaerat nulla!</P>
                <p class="button-text-container"><button>Resolver</button></p>

            </div>
            <div class="custom-text-container">
                <h3>TEXTO: LOREM</h3>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quaerat reprehenderit fugit suscipit
                    magni exercitationem! Eius, quidem provident quibusdam pariatur consequatur illum impedit. Sunt quos
                    distinctio fugit. Architecto, quaerat nulla!</P>
                <p class="button-text-container"><button><span class="ec ec-keyboard"></span>
                    </button></p>

            </div>
            <div class="custom-text-container">
                <h3>TEXTO: LOREM</h3>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quaerat reprehenderit fugit suscipit
                    magni exercitationem! Eius, quidem provident quibusdam pariatur consequatur illum impedit. Sunt quos
                    distinctio fugit. Architecto, quaerat nulla!</P>
                <p class="button-text-container"><button>Resolver</button></p>

            </div>
 -->




        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>



</body>

</html>