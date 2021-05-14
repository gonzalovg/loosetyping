<?php
include_once('../private/model/category.php');

if (isset($_POST['id']) && !empty($_POST)) {
    $updCategory= new Category($_POST['id'], $_POST['name']);
    $updCategory->update();
}
if (isset($_GET) && !empty($_GET)) {
    $updCategory = Category::getById($_GET['category']);
    // print_r($updUser);
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
                <h1>Editando Categoria
                    #<?php echo $updCategory->getId() ?>
                </h1>
                <form
                    action="<?php echo $_SERVER['PHP_SELF'] ?>"
                    method="POST">
                    <ul class="tb-no-decor">
                        <input name="id" type="hidden"
                            value="<?php echo $updCategory->getId() ?>">
                        <li class="li-label-input"><label for="name">Nombre</label><input name="name" type="text"
                                value="<?php echo $updCategory->getName() ?>">
                        </li>


                        <li class="line-end">
                            <input type="submit" value="Actualizar">
                        </li>


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