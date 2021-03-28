<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Log In </title>
    <meta name='author' content='Gonzalo Verdugo'>
    <meta name='description' content='Sitio de Gonzalo Verdugo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' type='image/icon' href='./favicon.ico'>
    <link rel="stylesheet" href="css/reboot.css">


    <?php include "includes/general-head.php" ?>



</head>

<body>

    <main>

        <nav>
            <a href="index.php" class="navLink">
                <header>
                    <h1 class="nav-item-big">LOOSETYPING</h1>
                </header>
            </a>
        </nav>

        <section>

            <div id="login-form">
                <form
                    action="<?php echo $_SERVER['PHP_SELF'] ?>"
                    method="post">

                    <ul>
                        <li><label for="correo"></label><input type="email" placeholder="Email" name="correo"></li>
                        <li><label for="pass"></label><input type="password" placeholder="Password" name="pass"></li>
                        <li><input type="button" value="Log In"></li>
                    </ul>

                </form>

            </div>






        </section>

        <?php include "includes/footer.php" ?>

    </main>
    <script src="js/general.js"></script>


</body>

</html>