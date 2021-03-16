let cursorPosition = 0;

function prepararResolucion() {
  let texto = document.getElementById("texto");

  //separar el texto en un array, cada posicion con un carácter
  let textoFragmentado = texto.innerHTML.split("");

  // Cambiar texto plano a conjunto de etiquetas span individuales
  let textoEnSpan = "";

  textoFragmentado.forEach((letra) => {
    console.log(letra);
    textoEnSpan += "<span>" + letra + "</span>";
  });
  console.log(textoEnSpan);

  texto.innerHTML = textoEnSpan;

  empezarResolucion(texto, textoFragmentado);
}

function empezarResolucion(texto, caracteres) {
  //Obtener el elemento texto que se va a resolver

  /**
   * ! REGISTRADOR DE PULSACIONES EXITO/FALLO
   * 
  * * Ejecutar la funcion comprobarPulsacion() cada vez que el usuario pulse alguna tecla
  * * Si el resultado es verdadero, sumara un acierto y el cursor avanzara a la proxima posicion
  * * Si es falso, sumara una fallo

  */

  let fallo = 0;
  let exito = 0;
  window.addEventListener("keypress", (event) => {
    if (comprobarPulsacion(caracteres[cursorPosition], event.key)) {
      exito++;

      console.log("exito " + exito);
      console.log("fallo " + fallo);
      console.log(
        "tecla que tenias que pulsar " +
          caracteres[cursorPosition] +
          " tecla que has pulsado " +
          event.key
      );

      // ? CAMBIAR EL COLOR DE LA LETRA (VERDE)
      let spansArray = texto.getElementsByTagName("span");
      spansArray[cursorPosition].style.color = "green";

      cursorPosition++;
    } else {
      fallo++;
      console.log("exito " + exito);
      console.log("fallo " + fallo);
      console.log(
        "tecla que tenias que pulsar " +
          caracteres[cursorPosition] +
          " tecla que has pulsado " +
          event.key
      );
      // ? CAMBIAR EL COLOR DE LA LETRA (ROJO)
      let spansArray = texto.getElementsByTagName("span");
      spansArray[cursorPosition].style.color = "red";
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

function pretty(txt, elemento) {
  console.log("//######################################");
  // console.log("//--------------------------------------");
  console.log("//" + txt + "");
  console.log("//--------------------------------------");
  console.log(elemento);
}
