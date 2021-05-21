<?php
include_once('../private/model/Text.php');
include_once('../private/model/Category.php');

if (isset($_POST['id']) && !empty($_POST)) {
    // $updText = new Text($_POST['id'], $_POST['name']);

    $updText= new Text($_POST['id'], $_POST['titulo'], $_POST['contenido'], $_POST['lang'], $_POST['categoria'], $_POST['autor']);

    $updText->update();
    header("location: paneltextos.php");
}
if (isset($_GET) && !empty($_GET)) {
    $updText = Text::getById($_GET['text']);
    $categorys = Category::getAllCategorys();
    // print_r($updText);
}



?>


<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>

    <title> Ranking </title>
    <meta name='author' content='Gonzalo Verdugo'>






    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>

        <?php include "../includes/nav.php" ?>

        <section>
            <div>
                <h1>Editando Texto
                    <?php echo $updText->getTitText() ?>
                </h1>
                <form
                    action="<?php echo $_SERVER['PHP_SELF'] ?>"
                    method="POST">
                    <ul class="tb-no-decor">
                        <input
                            value="<?php echo $updText->getId()  ?>"
                            type="hidden" name="id">
                        <li class="li-label-input"><label for="titulo">Título</label><input
                                value='<?php echo $updText->getTitText() ?>'
                                name="titulo" type="text">
                        </li>
                        <li class="li-label-input"><label for="autor">Autor</label><input value=<?php echo $updText->getAutorText() ?>
                            name="autor" type="text"></li>
                        <li class="li-label-input"><label for="contenido">Contenido</label><textarea name="contenido"
                                rows="7"> <?php echo $updText->getTxtText() ?></textarea>
                        </li>
                        <li class="li-label-input"><label for="lang">Idioma</label><input value=<?php echo $updText->getLang() ?> name="lang"
                            type="text">
                        </li>
                        <li class="li-label-input"><label for="categoria">Categoría</label><select name="categoria">
                                <!-- <option value=0>...</option> -->
                                <?php $txtCategory = Category::getById($updText->getIdCat())  ?>
                                <option value=<?php $updText->getIdCat() ?>><?php echo $txtCategory->getName()  ?>
                                </option>

                                <?php foreach ($categorys as $category) {
    echo '<option  value=' . $category->getId() . '  >' . $category->getName() . '</option>';
} ?>
                            </select>
                        <li><input class="button" type="submit" value="Actualizar"></li>

                    </ul>
                </form>

            </div>




            </div>


        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>