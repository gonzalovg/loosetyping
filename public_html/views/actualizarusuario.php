<?php
include_once('../private/model/user.php');

if (isset($_POST['id']) && !empty($_POST)) {
    $updUser = User::getById($_POST['id']);
    
    $updUser = new User($_POST['id'], $_POST['name'], $_POST['email'], $_POST['password'], "", "", $_POST['permisos']);
    
    $updUser->update();
    header("location: panelusuarios.php");
}
if (isset($_GET) && !empty($_GET)) {
    $updUser = User::getById($_GET['userId']);
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
                <h1>Editando Usuario #<?php echo $updUser->getId() ?>
                </h1>
                <form
                    action="<?php echo $_SERVER['PHP_SELF'] ?>"
                    method="POST">
                    <ul class="tb-no-decor">
                        <input name="id" type="hidden"
                            value="<?php echo $updUser->getId() ?>">
                        <li class="li-label-input"><label for="name">Nombre</label><input name="name" type="text"
                                value="<?php echo $updUser->getName() ?>">
                        </li>
                        <li class="li-label-input"><label for="email">Email</label><input name="email" type="email"
                                value="<?php echo $updUser->getEmail() ?>">
                        </li>
                        <li class="li-label-input"><label for="password">Password</label><input name="password"
                                type="password">
                        </li>
                        <li class="li-label-input"><label for="permisos">Permisos</label><input name="permisos"
                                type="text"
                                value="<?php echo $updUser->getPermisos() ?>">
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