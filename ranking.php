<!DOCTYPE html>
<html lang='es' dir='ltr'>

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Ranking </title>
    <meta name='author' content='Gonzalo Verdugo'>
    <meta name='description' content='Sitio de Gonzalo Verdugo'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' type='image/icon' href='./favicon.ico'>
    <link rel="stylesheet" href="css/reboot.css">





    <?php include "includes/general-head.php" ?>



</head>

<body>

    <main>

        <?php include "includes/nav.php" ?>

        <section>
            <h1><span class="ec ec-trophy"></span>
                RANKING
            </h1>

            <div id="ranking-options">
                <select name="texto" id="">
                    <option value="hola">Cualquier texto</option>
                    <option value="">Lorem</option>
                    <option value="">Cervantes</option>
                    <option value="">Roma</option>
                    <option value="">Madrid</option>
                </select>

                <select name="tiempo" id="">
                    <option value="">24h</option>
                    <option value="">Último mes</option>
                    <option value="">Último año</option>
                    <option value="">Historico</option>
                </select>

            </div>

            <div id="ranking">
                <div id="aspectos-ranking">
                    <div class="campo-ranking"><b>Posición</b></div>
                    <div class="campo-ranking"><b>Usuario</b></div>
                    <div class="campo-ranking"><b>Texto</b></div>
                    <div class="campo-ranking"><b>WPM</b></div>
                    <div class="campo-ranking"><b>Tiempo</b></div>
                </div>

                <div class="registro-ranking">
                    <div class="campo-ranking">#1</div>
                    <div class="campo-ranking">Gonzalo Verdugo</div>
                    <div class="campo-ranking">Lorem</div>
                    <div class="campo-ranking">200wpm</div>
                    <div class="campo-ranking">36.67</div>
                </div>
                <div class="registro-ranking">
                    <div class="campo-ranking">#1</div>
                    <div class="campo-ranking">Gonzalo Verdugo</div>
                    <div class="campo-ranking">Lorem</div>
                    <div class="campo-ranking">200wpm</div>
                    <div class="campo-ranking">36.67</div>
                </div>
                <div class="registro-ranking">
                    <div class="campo-ranking">#1</div>
                    <div class="campo-ranking">Gonzalo Verdugo</div>
                    <div class="campo-ranking">Lorem</div>
                    <div class="campo-ranking">200wpm</div>
                    <div class="campo-ranking">36.67</div>
                </div>
                <div class="registro-ranking">
                    <div class="campo-ranking">#1</div>
                    <div class="campo-ranking">Gonzalo Verdugo</div>
                    <div class="campo-ranking">Lorem</div>
                    <div class="campo-ranking">200wpm</div>
                    <div class="campo-ranking">36.67</div>
                </div>
                <div class="registro-ranking">
                    <div class="campo-ranking">#1</div>
                    <div class="campo-ranking">Gonzalo Verdugo</div>
                    <div class="campo-ranking">Lorem</div>
                    <div class="campo-ranking">200wpm</div>
                    <div class="campo-ranking">36.67</div>
                </div>
                <div class="registro-ranking">
                    <div class="campo-ranking">#1</div>
                    <div class="campo-ranking">Gonzalo Verdugo</div>
                    <div class="campo-ranking">Lorem</div>
                    <div class="campo-ranking">200wpm</div>
                    <div class="campo-ranking">36.67</div>
                </div>
                <div class="registro-ranking">
                    <div class="campo-ranking">#1</div>
                    <div class="campo-ranking">Gonzalo Verdugo</div>
                    <div class="campo-ranking">Lorem</div>
                    <div class="campo-ranking">200wpm</div>
                    <div class="campo-ranking">36.67</div>
                </div>



            </div>








        </section>

        <?php include "includes/footer.php" ?>

    </main>
    <script src="js/general.js"></script>


</body>

</html>