let cursorPosition = 0;

let ratioAciertoFallo = [
  "a",
  "b",
  "c",
  "d",
  "e",
  "f",
  "g",
  "h",
  "i",
  "j",
  "k",
  "l",
  "m",
  "n",
  "ñ",
  "o",
  "p",
  "q",
  "r",
  "s",
  "t",
  "u",
  "v",
  "w",
  "x",
  "y",
  "z",
  " ",
  ",",
  ";",
  ".",
];

/**
 * !Generador carácteres
// let ratioAciertoFallo = [];
// for (var i = 32; i <= 255; i++) {
//   console.log(String.fromCharCode(i));
//   ratioAciertoFallo.push(String.fromCharCode(i));
// }
// console.log(ratioAciertoFallo);

 */

ratioAciertoFallo.forEach((letra) => {
  ratioAciertoFallo[letra] = [0, 0];
});

function prepararResolucion() {
  let texto = document.getElementById("texto");

  //separar el texto en un array, cada posicion con un carácter
  let textoFragmentado = texto.innerHTML.split("");

  // Cambiar texto plano a conjunto de etiquetas span individuales
  let textoEnSpan = "";

  textoFragmentado.forEach((letra) => {
    // console.log(letra);
    textoEnSpan += "<span>" + letra + "</span>";
  });
  // console.log(textoEnSpan);

  texto.innerHTML = textoEnSpan;

  empezarResolucion(texto, textoFragmentado);
}

function empezarResolucion(texto, caracteres) {
  //Obtener el elemento texto que se va a resolver

  /**
   * ! REGISTRADOR DE PULSACIONES EXITO/FALLO
   * * Ejecutar la funcion comprobarPulsacion() cada vez que el usuario pulse alguna tecla
   * * Si el resultado es verdadero, sumara un acierto y el cursor avanzara a la proxima posicion
   * * Si es falso, sumara una fallo
   */

  let fallosTotales = 0;
  let exitosTotales = 0;
  let spansArray = texto.getElementsByTagName("span");

  // texto[cursorPosition].className = "cursor";

  console.log();

  /**
   * !INTERVALO DE TIEMPO EN EL QUE EL CURSOR PARPADEA
   */
  setInterval(() => {
    spansArray[cursorPosition].className = "cursorActive";
    setTimeout(() => {
      spansArray[cursorPosition].className = "cursorDesactive";
    }, 500);
  }, 1000);
  window.addEventListener("keypress", (event) => {
    if (comprobarPulsacion(caracteres[cursorPosition], event.key)) {
      exitosTotales++;
      console.log(
        ratioAciertoFallo[caracteres[cursorPosition].toLowerCase()][0]
      );

      // * SUMAR UN ACIERTO EN LA LETRA QUE EL CURSOR SEÑALA
      ratioAciertoFallo[caracteres[cursorPosition].toLowerCase()][0]++;
      console.log(ratioAciertoFallo);
      // ratioAciertoFallo[caracteres[cursorPosition]][0]++;

      // console.log("exito " + exito);
      // console.log("fallo " + fallo);
      // console.log(
      //   "tecla que tenias que pulsar " +
      //     caracteres[cursorPosition] +
      //     " tecla que has pulsado " +
      //     event.key
      // );

      // * CAMBIAR EL COLOR DE LA LETRA (VERDE)
      spansArray[cursorPosition].style.color = "green";
      spansArray[cursorPosition].className = "cursorDesactive";
      cursorPosition++;
    } else {
      fallosTotales++;

      // * SUMAR UN ERROR EN LA LETRA QUE EL CURSOR SEÑALA
      ratioAciertoFallo[caracteres[cursorPosition].toLowerCase()][1]++;

      console.log(ratioAciertoFallo);
      // ratioAciertoFallo[spansArray[cursorPosition]][1]++;
      // console.log("exito " + exito);
      // console.log("fallo " + fallo);
      // console.log(
      //   "tecla que tenias que pulsar " +
      //     caracteres[cursorPosition] +
      //     " tecla que has pulsado " +
      //     event.key
      // );
      // * CAMBIAR EL COLOR DE LA LETRA (ROJO)
      spansArray[cursorPosition].className = "cursorDesactive";
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

function cursorDecoration(element) {
  return (element.className = "cursor");
}
