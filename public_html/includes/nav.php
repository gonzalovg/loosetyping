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
            <h2><?php
            session_start();
            include_once('../private/model/user.php');
            if (isset($_SESSION) && !empty($_SESSION)) {
                $user=User::getByEmail($_SESSION['user']);

                if ($user->getPermisos()>1) {
                    echo '<div class="dropdown">
                        <a class="navLink" href="profile.php">PROFILE</a>
                        <div class="dropdown-content">
                         <a class="navLink" href="settings.php">SETTINGS</a>
                        </div>
                      </div>' ;
                }
            } else {
                echo ' <a class="navLink" href="login.php">LOGIN</a>';
            }
                 
                 
                 ?>
            </h2>
        </li>

        <li>
            <h2>


                <span id="botonTema" onclick="cambiarTema()" class="ec ec-new-moon-with-face"></span>


            </h2>
        </li>

    </ul>
</nav>