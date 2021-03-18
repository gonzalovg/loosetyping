let cursorPosition = 0;
// let ratioAciertoFallo = [
//   "a",
//   "b",
//   "c",
//   "d",
//   "e",
//   "f",
//   "g",
//   "h",
//   "i",
//   "j",
//   "k",
//   "l",
//   "m",
//   "n",
//   "ñ",
//   "o",
//   "p",
//   "q",
//   "r",
//   "s",
//   "t",
//   "u",
//   "v",
//   "w",
//   "x",
//   "y",
//   "z",
//   " ",
//   ",",
//   ";",
//   ".",
//   "!",
// ];


let chars = ' !#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNÑOPQRSTUVWXYZ[\]^_`abcdefghijklmnñopqrstuvwxyz{|}~';
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

// console.log(jsonLetras);

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

  let resolucionCompleta = false;
  let fallosTotales = 0;
  let exitosTotales = 0;
  let spansArray = texto.getElementsByTagName("span");





  //* Parsear el String a un JSON
  console.log(jsonLetras)
  jsonLetras = JSON.parse(jsonLetras);
  // console.log(jsonLetras)




  /**
   * *INTERVALO DE TIEMPO EN EL QUE EL CURSOR PARPADEA
   */
  let intervaloCursor = setInterval(() => {
    spansArray[cursorPosition].className = "cursorActive";
    setTimeout(() => {
      spansArray[cursorPosition].className = "cursorDesactive";
    }, 500);
  }, 1000);








  /**
   * ! REGISTRADOR DE PULSACIONES EXITO/FALLO
   * * Ejecutar la funcion comprobarPulsacion() cada vez que el usuario pulse alguna tecla
   * * Si el resultado es verdadero, sumara un acierto y el cursor avanzara a la proxima posicion
   * * Si es falso, sumara una fallo
   */

  window.addEventListener("keypress", (event) => {
    var tiempoResolucion = 0;

    if (cursorPosition == 0) {
      tiempoResolucion = setInterval(() => {
        let htmlTime = document.getElementById("tiempo");

        htmlTime.innerHTML++;



      }, 100);;
    }


    // console.log(cursorPosition);
    // console.log(caracteres.length);


    let caracterEnfocado = caracteres[cursorPosition];


    if (comprobarPulsacion(caracteres[cursorPosition], event.key)) {
      exitosTotales++;

      // * SUMAR UN ACIERTO EN LA LETRA QUE EL CURSOR SEÑALA

      jsonLetras[caracterEnfocado].aciertos++;


      // console.log("caracter: " + caracterEnfocado);
      // console.log(jsonLetras[caracterEnfocado]);


      // * CAMBIAR EL COLOR DE LA LETRA (VERDE)
      spansArray[cursorPosition].style.color = "green";
      spansArray[cursorPosition].className = "cursorDesactive";
      cursorPosition++;


    } else {

      fallosTotales++;

      jsonLetras[caracterEnfocado].fallos++;

      // console.log(jsonLetras[caracterEnfocado]);

      // * CAMBIAR EL COLOR DE LA LETRA (ROJO)
      spansArray[cursorPosition].className = "cursorDesactive";
      spansArray[cursorPosition].style.color = "red";
    }

    if (cursorPosition === caracteres.length) {

      clearInterval(intervaloCursor);
      clearInterval(tiempoResolucion);

      mostrarStatsResolucion(
        exitosTotales,
        fallosTotales,
        tiempoResolucion,
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

function mostrarStatsResolucion(aciertos, fallos, tiempo, fallosPorTecla) {
  console.log("Aciertos: " + (aciertos));
  console.log("Fallos: " + fallos);
  // console.log("Tiempo de resolución: " + tiempoResolucion);
  console.log(fallosPorTecla);
}

// function pretty(txt, elemento) {
//   console.log("//######################################");
//   // console.log("//--------------------------------------");
//   console.log("//" + txt + "");
//   console.log("//--------------------------------------");
//   console.log(elemento);
// }

function cursorDecoration(json) {
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
      // alert(json.a)
      // window.location.replace("prueba.php");
      // console.log(JSON.stringify(json));
      document.getElementById("result").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "prueba.php?data=" + JSON.stringify(json), true);
  xhttp.send();
}


// function cronometro() {

//   setInterval(() => {
//     let htmlTime = document.getElementById("tiempo");

//     htmlTime.innerHTML++;

//     return htmlTime.innerHTML;

//   }, 100);

// }
