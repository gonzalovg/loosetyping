<?php



include("../private/model/category.php");


$categorys = Category::getAllCategorys();










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
    <script src="../js/category.js"></script>






    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>
        <?php include "../includes/nav.php";?>

        <section>
            <h1>Panel de control de Categorías</h1>

            <div id="ins-category">
                <form action="">
                    <ul class="tb-no-decor">

                        <li class="li-label-input"><label for="category">Insertar Categoría</label><input
                                name="category" type="text"></li>
                        <li><input type="button" onclick='processCategory()' value="Insertar" class="button"></li>
                        <li id="requestResult"></li>


                    </ul>
                </form>

            </div>

            <div>

                <div class="record-header">
                    <div class="record-data">ID</div>
                    <div class="record-data">NOMBRE</div>
                    <div class="record-data">ACCIONES</div>
                </div>


                <?php
            
            foreach ($categorys as $category) {
                echo $category->imprimir();
            }
            
            
            ?>

            </div>




        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>