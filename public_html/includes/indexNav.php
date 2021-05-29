<nav class="dropdown-2">
    <ul>
        <li>

            <h1>
                <header>
                    <a class="navLink" id="navHeader" href="index.php">
                        LOOSETYPING

                    </a>
                    <span class="arrow">▼</span>
                </header>
            </h1>

        </li>
        <li class="nav-elem">
            <h2>
                <a class="navLink" href="index.php">HOME</a>
            </h2>
        </li>
        <li class="nav-elem">
            <h2>
                <a class="navLink" href="views/custom.php">TEXTOS</a>
            </h2>
        </li>
        <li class="nav-elem">
            <h2>
                <a class="navLink" href="views/ranking.php">RANKING</a>
            </h2>
        </li>
        <li class="nav-elem">
            <h2>
                <?php
                 session_start();
                //  include_once('../private/model/user.php');
                 if (isset($_SESSION['user']) && !empty($_SESSION)) {
                     $user=User::getByEmail($_SESSION['user']);

                     if ($user->getPermisos()>1) {
                         echo '<div class="dropdown">
                        <a class="navLink" href="views/profile.php">PERFIL</a>
                        <span class="arrow">▼</span>
                        <div class="dropdown-content">
                         <a class="navLink" href="views/settings.php">AJUSTES</a>
                        </div>
                      </div>' ;
                     } else {
                         echo ' <a class="navLink" href="views/profile.php">PERFIL</a>';
                     }
                 } else {
                     echo ' <a class="navLink" href="views/login.php">LOGIN</a>';
                 }
                 
                 
                 ?>

                <!-- <a class="navLink" href="views/settings.php">SETTINGS</a> -->
            </h2>
        </li>

        <li class="nav-elem">
            <h2>

                <?php
               
                    //  if (isset($_SESSION)) {
                    //      echo ' <a class="navLink" href="views/login.php"><span class="nav-item-small"> LOG IN</span>
                    //     </a>';
                    //  }

                ?>

                <span id="botonTema" onclick="cambiarTema()" class="ec ec-new-moon-with-face"></span>


            </h2>
        </li>

    </ul>
</nav>