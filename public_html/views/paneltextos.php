<?php




include("../private/model/text.php");
include("../private/model/category.php");

$texts = Text::getAllTexts();



$categorys = Category::getAllCategorys();

if (isset($_POST) && !empty($_POST)) {
    $textCategoty = $_POST['categoria'];
    // echo $textCategoty;
    $newText = new Text("", $_POST['titulo'], $_POST['contenido'], $_POST['lang'], $_POST['categoria'], $_POST['autor']);
    // print_r($_POST);
    
    $newText->insert();
}











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
    <script src="../js/text.js"></script>






    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>
        <?php include "../includes/nav.php";?>

        <section>
            <h1>LOOSETYPING (Text) CONTROL PANEL</h1>
            <hr>
            <div id="ins-text">
                <h1><span class="ec ec-new"></span>
                    Insertar nuevo Texto</h1>
                <form
                    action="<?php echo $_SERVER['PHP_SELF'] ?>"
                    method="POST">
                    <ul class="tb-no-decor">

                        <li class="li-label-input"><label for="titulo">Título</label><input name="titulo" type="text">
                        </li>
                        <li class="li-label-input"><label for="autor">Autor</label><input name="autor" type="text"></li>
                        <li class="li-label-input"><label for="contenido">Contenido</label><textarea name="contenido"
                                rows="7"></textarea>
                        </li>
                        <li class="li-label-input"><label for="lang">Idioma</label><input name="lang" type="text"></li>
                        <li class="li-label-input"><label for="categoria">Categoría</label><select name="categoria">
                                <option value=0>...</option>


                                <?php foreach ($categorys as $category) {
    echo '<option  value='.$category->getId().'  >'.$category->getName().'</option>';
} ?>
                            </select>
                        <li><input class="button" type="submit" value="Insertar"></li>

                    </ul>
                </form>

            </div>

            <div id="all-text">

                <h1>Textos actuales</h1>

                <?php
            
            foreach ($texts as $text) {
                echo $text->imprimir();
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