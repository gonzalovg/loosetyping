<?php
include("../private/model/controllers/userController.php");



// $userController = new UserController();

if (isset($_POST) && !empty($_POST)) {
    // echo "post lleno";
}


?>


<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Register </title>
    <meta name='author' content='Gonzalo Verdugo'>
    <meta name='description' content='Sitio de Gonzalo Verdugo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' type='image/icon' href='./favicon.ico'>
    <link rel="stylesheet" href="../css/reboot.css">


    <?php include "../includes/general-head.php" ?>



</head>

<body>

    <main>

        <nav>
            <a href="../index.php" class="navLink">
                <header>
                    <h1 class="nav-item-big">LOOSETYPING</h1>
                </header>
            </a>
        </nav>

        <section>

            <div id="login-form">
                <span id="login-icon" class="ec ec-robot"></span>


                <form action="c=User&a=save" method="post">

                    <ul>
                        <li><label for="name"></label><input type="text" placeholder="Username" name="name"></li>
                        <li><label for="correo"></label><input type="email" placeholder="Email" name="correo"></li>

                        <li><label for="pass"></label><input type="password" placeholder="Password" name="pass"></li>
                        <li><label for="passVerification"></label><input type="password"
                                placeholder="Password Verification" name="passwordVerification"></li>
                        <li><a href="">¿No tienes cuenta? Regístrate</a></li>
                        <li><input type="button" value="Registrarse"></li>
                    </ul>

                </form>

            </div>






        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>