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
  "!"
];

/**
 * !Generador carácteres

// console.log(ratioAciertoFallo);

 */

// let ratioAciertoFallo = [];
let jsonLetras = "{";
// for (var i = 32; i <= 255; i++) {
// console.log(String.fromCharCode(i));
// ratioAciertoFallo.push(String.fromCharCode(i));
//   let caracter = String.fromCharCode(i);

//   jsonLetras += '"' + caracter + '": {"aciertos":' + 0 + ',"fallos": ' + 0 + '}';
//   if (i < 255) {
//     jsonLetras += ",";
//   }






for (let i = 0; i < ratioAciertoFallo.length; i++) {
  jsonLetras += '"' + ratioAciertoFallo[i] + '": {"aciertos":' + 0 + ',"fallos": ' + 0 + '}';
  if (i < ratioAciertoFallo.length - 1) {
    jsonLetras += ",";
  }

}
jsonLetras += "}";





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
  let resolucionCompleta = false;
  let fallosTotales = 0;
  let exitosTotales = 0;
  let spansArray = texto.getElementsByTagName("span");



  /**
   * *INTERVALO DE TIEMPO EN EL QUE EL CURSOR PARPADEA
   */
  if (!resolucionCompleta) {
    setInterval(() => {

      spansArray[cursorPosition].className = "cursorActive";
      setTimeout(() => {
        spansArray[cursorPosition].className = "cursorDesactive";
      }, 500);
    }, 1000);
  }
  console.log(jsonLetras);
  jsonLetras = JSON.parse(jsonLetras);
  console.log(caracteres);

  console.log(typeof cursorPosition[cursorPosition]);


  window.addEventListener("keypress", (event) => {
    if (comprobarPulsacion(caracteres[cursorPosition], event.key)) {
      exitosTotales++;



      // * SUMAR UN ACIERTO EN LA LETRA QUE EL CURSOR SEÑALA

      let caracterEnfocado = caracteres[cursorPosition];

      jsonLetras.a.aciertos++;

      jsonLetras.caracterEnfocado.aciertos++;

      console.log(caracterEnfocado);
      // console.log(typeof jsonLetras.a);





      // console.log(ratioAciertoFallo);



      // * CAMBIAR EL COLOR DE LA LETRA (VERDE)
      spansArray[cursorPosition].style.color = "green";
      spansArray[cursorPosition].className = "cursorDesactive";
      cursorPosition++;
    } else {
      fallosTotales++;

      // * SUMAR UN ERROR EN LA LETRA QUE EL CURSOR SEÑALA
      // ratioAciertoFallo[caracteres[cursorPosition].toLowerCase()][1]++;
      // jsonLetras.caracteres[cursorPosition].fallos++;
      console.log(jsonLetras.caracteres[cursorPosition]);
      // console.log(ratioAciertoFallo[caracteres]);

      // * CAMBIAR EL COLOR DE LA LETRA (ROJO)
      spansArray[cursorPosition].className = "cursorDesactive";
      spansArray[cursorPosition].style.color = "red";
    }


    if (cursorPosition == caracteres.length - 2) {
      resolucionCompleta = true;
      mostrarStatsResolucion(exitosTotales, fallosTotales, 0, ratioAciertoFallo);

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


function mostrarStatsResolucion(aciertos, fallos, fallosPorTecla) {


  console.log("Aciertos: " + (aciertos - fallos));
  console.log("Fallos: " + fallos);
  // console.log("Tiempo de resolución: " + tiempo);
  console.log(fallosPorTecla);


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
