let cursorPosition = 0;
let chars =
  " !#$%&'()*+,-./0123456789:;<=>?@AÁÀÄÂBCDEÉÈËÊFGHIÍÌÏÎJKLMNÑOÓÒÖÔPQRSTUÚÙÜÛVWXYZ[]^_`aáàäâbcdeéèëêfghiíìïîjklmnñoóòöôpqrstuúùüûvwxyz{|}~";
let ratioAciertoFallo = chars.split("");

/**
 * !Generador carácteres
 */
let jsonLetras = "{";
for (let i = 0; i < ratioAciertoFallo.length; i++) {
  jsonLetras +=
    '"' +
    ratioAciertoFallo[i] +
    '": {"aciertos":' +
    0 +
    ',"fallos": ' +
    0 +
    "}";
  if (i < ratioAciertoFallo.length - 1) {
    jsonLetras += ",";
  }
}
jsonLetras += "}";

// * En la mecanografia una palabra son 5 pulsaciones

let palabrasTotales = 0;

function prepararResolucion() {
  let texto = document.getElementById("texto");

  //separar el texto en un array, cada posicion con un carácter
  let textoFragmentado = texto.innerHTML.trim().split("");

  // Cambiar texto plano a conjunto de etiquetas span individuales
  let textoEnSpan = "";
  console.log(textoFragmentado);
  // textoFragmentad0 = textoFragmentado.replace(/\\n/g, " ");
  textoFragmentado.map((caracter) => {
    textoEnSpan += "<span>" + caracter + "</span>";
  });

  texto.innerHTML = textoEnSpan;

  // * Tiempo en el que transcurre la resolución

  empezarResolucion(texto, textoFragmentado);

  palabrasTotales = textoFragmentado.length / 5;
}

function empezarResolucion(texto, caracteres) {
  //Obtener el elemento texto que se va a resolver

  let fallosTotales = 0;
  let exitosTotales = 0;
  let spansArray = texto.getElementsByTagName("span");

  //* Parsear el String a un JSON

  jsonLetras = JSON.parse(jsonLetras);

  /**
   * *INTERVALO DE TIEMPO EN EL QUE EL CURSOR PARPADEA
   */
  let intervaloCursor = setInterval(() => {
    spansArray[cursorPosition].className = "cursorActive";
    setTimeout(() => {
      spansArray[cursorPosition].className = "cursorDesactive";
    }, 500);
  }, 900);

  /**
   * ! REGISTRADOR DE PULSACIONES EXITO/FALLO
   * * Ejecutar la funcion comprobarPulsacion() cada vez que el usuario pulse alguna tecla
   * * Si el resultado es verdadero, sumara un acierto y el cursor avanzara a la proxima posicion
   * * Si es falso, sumara una fallo
   */

  let inicio = 0;
  window.addEventListener("keypress", (event) => {
    let caracterEnfocado = caracteres[cursorPosition];

    //* EMPEZAR EL CRONOMETRO
    if (cursorPosition == 0) {
      inicio = Date.now();
    }

    if (comprobarPulsacion(caracteres[cursorPosition], event.key)) {
      exitosTotales++;

      // * SUMAR UN ACIERTO EN LA LETRA QUE EL CURSOR SEÑALA
      jsonLetras[caracterEnfocado].aciertos++;

      // * CAMBIAR EL COLOR DE LA LETRA (VERDE)
      spansArray[cursorPosition].style.color = "#35a853";
      spansArray[cursorPosition].className = "cursorDesactive";
      cursorPosition++;
    } else {
      fallosTotales++;

      jsonLetras[caracterEnfocado].fallos++;

      // console.log(jsonLetras[caracterEnfocado]);

      // * CAMBIAR EL COLOR DE LA LETRA (ROJO)
      spansArray[cursorPosition].className = "cursorDesactive";
      spansArray[cursorPosition].style.color = "#ea4335";
    }

    if (cursorPosition === caracteres.length) {
      clearInterval(intervaloCursor);
      // * ACABAR EL CRONOMETRO
      let final = Date.now();
      let tiempoResolucionMili = (final - inicio) / 1000;
      let tiempoResolucionSecs = parseFloat(tiempoResolucionMili);

      let wpm = Math.round((palabrasTotales * 60) / tiempoResolucionSecs);

      mostrarStatsResolucion(
        exitosTotales,
        fallosTotales,
        tiempoResolucionSecs,
        wpm,
        jsonLetras
      );

      finResolucion();

      return true;
    }
  });
}

/**
 * !COMPROBAR PULSACION
 ** COMPROBAR SI LA PULSACIÓN DEL TECLADO ES LA QUE EL CURSOR INDICA
 * @param {string} teclaPorPulsar
 * @param {string} teclaPulsada
 * @returns bool
 */
function comprobarPulsacion(teclaPorPulsar, teclaPulsada) {
  if (teclaPorPulsar === teclaPulsada) {
    return true;
  } else {
    return false;
  }
}

function mostrarStatsResolucion(aciertos, fallos, tiempo, wpm, fallosPorTecla) {
  console.log("Aciertos: " + aciertos);
  console.log("Fallos: " + fallos);
  console.log("WPM: " + wpm + "wpm");
  console.log("Tiempo de resolución: " + tiempo);
  console.log(fallosPorTecla);

  let statsContainer = document.getElementById("stats");

  let content =
    '  <div class="stat-container"><div class="stat-result">' +
    aciertos +
    '</div><div class="stat-header">ACIERTOS</div></div><div class="stat-container"><div class="stat-result">' +
    fallos +
    '</div><div class="stat-header">FALLOS</div></div><div class="stat-container"><div class="stat-result">' +
    wpm +
    '</div><div class="stat-header">WPM</div></div><div class="stat-container"><div class="stat-result">' +
    tiempo +
    '</div><div class="stat-header">TIEMPO</div></div>';

  statsContainer.innerHTML += content;
}

function cursorDecoration() {
  return (element.className = "cursor");
}

function finResolucion() {
  enviarRatioResolucion(jsonLetras);
}

// ! Envio de datos a PHP, donde se insertara en la tabla ratio
function enviarRatioResolucion(json) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "prueba.php?data=" + JSON.stringify(json), true);
  xhttp.send();
}

function calcularTiempo() {}
