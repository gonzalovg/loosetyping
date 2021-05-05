<?php
include_once('../private/model/user.php');
if (isset($_GET) && !empty($_GET)) {
    $user = User::getById($_GET['userId']);
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
            <h1>LOOSETYPING CONTROL PANEL</h1>

            <?php echo $user->getName(); ?>


            </div>


        </section>

        <?php include "../includes/footer.php" ?>

    </main>
    <script src="../js/general.js"></script>


</body>

</html>