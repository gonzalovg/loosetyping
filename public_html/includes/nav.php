<nav>
    <ul>
        <li>

            <h1>
                <header>
                    <a class="navLink" id="navHeader" href="../index.php">
                        LOOSETYPING

                    </a>
                </header>
            </h1>

        </li>
        <li>
            <h2>
                <a class="navLink" href="../index.php">HOME</a>
            </h2>
        </li>
        <li>
            <h2>
                <a class="navLink" href="custom.php">TEXTOS</a>
            </h2>
        </li>
        <li>
            <h2>
                <a class="navLink" href="ranking.php">SCORES</a>
            </h2>
        </li>
        <li>
            <h2>
                <a class="navLink" href="settings.php">SETTINGS</a>
            </h2>
        </li>

        <li>
            <h2>
                

                <?php

                session_start();
                     if (isset($_SESSION) && !empty($_SESSION)) {
                         echo ' <a class="navLink" href="profile.php"><span class="nav-item-small"> Profile</span>
                         </a>';
                     } else {
                         echo ' <a class="navLink" href="login.php"><span class="nav-item-small"> LOG IN</span>
                            </a>';
                     }

                ?>

               

                <span id="botonTema" onclick="cambiarTema()" class="ec ec-new-moon-with-face"></span>


            </h2>
        </li>

    </ul>
</nav>