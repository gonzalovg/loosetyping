let posicionCursor = 0;
let caracteres =
  " !$#&%()*+,-./0123456789:;<=>?@AÁÀÄÂBCDEÉÈËÊFGHIÍÌÏÎJKLMNÑOÓÒÖÔPQRSTUÚÙÜÛVWXYZ[]^_`aáàäâbcdeéèëêfghiíìïîjklmnñoóòöôpqrstuúùüûvwxyz{|}~­";
let arrayDeCaracteres = caracteres.split("");
let balanceAciertos = generarRatio(arrayDeCaracteres);
let fallosTotales = 0;
let aciertosTotales = 0;
let texto = "";
let arrayDeTexto = "";
let spansDeTexto = "";
let palabrasTotales = "";
let caracteresDelTexto = "";
let inicioResolucion = 0;
let finResolucion = 0;
let intervaloCursor = 0;

function inicializarDatos() {
  texto = document.getElementById("texto");
  arrayDeTexto = texto.innerHTML.trim().split("");
  spansDeTexto = "";
  arrayDeTexto.map((caracter) => {
    spansDeTexto += "<span>" + caracter + "</span>";
  });

  texto.innerHTML = spansDeTexto;
  palabrasTotales = arrayDeTexto.length / 5;
  caracteresDelTexto = texto.getElementsByTagName("span");

  intervaloCursor = setInterval(() => {
    caracteresDelTexto[posicionCursor].className = "cursorActive";
    setTimeout(() => {
      caracteresDelTexto[posicionCursor].className = "cursorDesactive";
    }, 500);
  }, 900);

  registrarPulsacion();
}

function registrarPulsacion() {
  window.addEventListener("keypress", (event) => {
    if (posicionCursor == 0) {
      inicioResolucion = Date.now();
    }

    let teclaAPulsar = arrayDeTexto[posicionCursor];
    let teclaPulsada = event.key;

    if (teclaAPulsar == teclaPulsada) {
      sumarAcierto(event.key);
      comprobarFin();
    } else {
      sumarError(event.key);
    }
  });
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
    (aciertos - fallos) +
    '</div><div class="stat-header">ACIERTOS</div></div><div class="stat-container"><div class="stat-result">' +
    fallos +
    '</div><div class="stat-header">FALLOS</div></div><div class="stat-container"><div class="stat-result">' +
    wpm +
    '</div><div class="stat-header">WPM</div></div><div class="stat-container"><div class="stat-result">' +
    tiempo +
    '</div><div class="stat-header">TIEMPO</div></div>';

  statsContainer.innerHTML += content;
}

function enviarRatioResolucion(json, idText, idUser, wpmRes, timRes) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
      console.log(json);
    }
  };
  xhttp.open(
    "GET",
    "../public_html/private/scripts/insertarResolucion.php?data=" +
      encodeURIComponent(JSON.stringify(json)) +
      "&text=" +
      idText +
      "&user=" +
      idUser +
      "&wpm=" +
      wpmRes +
      "&time=" +
      timRes,
    true
  );
  // public_htmlpublic_htmlpublic_htmlpublic_html\privatepublic_htmlpublic_htmlpublic_html\privatepublic_html\privatepublic_htmlpublic_html\privatepublic_html\private\scriptspublic_htmlpublic_htmlpublic_html\privatepublic_html\private\scriptspublic_html\privatepublic_htmlpublic_html\privatepublic_html\private\scriptspublic_html\private\scriptspublic_htmlpublic_html\privatepublic_html\private\scriptspublic_html\private\scripts\insertarResolucion.php;
  xhttp.send();
}

function sumarAcierto(caracter) {
  aciertosTotales++;
  balanceAciertos[caracter].aciertos++;
  colorearCorrecto();
  posicionCursor++;
}

function colorearCorrecto() {
  caracteresDelTexto[posicionCursor].style.color = "#35a853";
  caracteresDelTexto[posicionCursor].className = "cursorDesactive";
}

function sumarError(caracter) {
  fallosTotales++;
  balanceAciertos[caracter].fallos++;
  colorearErroneo();
}

function colorearErroneo() {
  caracteresDelTexto[posicionCursor].className = "cursorDesactive";
  caracteresDelTexto[posicionCursor].style.color = "#ea4335";
}

function generarRatio(caracteres) {
  let balanceAciertos = "{";
  for (let i = 0; i < caracteres.length; i++) {
    balanceAciertos +=
      '"' + caracteres[i] + '": {"aciertos":' + 0 + ',"fallos": ' + 0 + "}";
    if (i < caracteres.length - 1) {
      balanceAciertos += ",";
    }
  }
  balanceAciertos += "}";

  // alert(balanceAciertos);
  return JSON.parse(balanceAciertos);
}

function comprobarFin() {
  if (posicionCursor === arrayDeTexto.length) {
    clearInterval(intervaloCursor);
    // * ACABAR EL CRONOMETRO
    finResolucion = Date.now();
    let tiempoResolucionMili = (finResolucion - inicioResolucion) / 1000;
    let tiempoResolucionSecs = parseFloat(tiempoResolucionMili);
    let wpm = Math.round((palabrasTotales * 60) / tiempoResolucionSecs);
    mostrarStatsResolucion(
      aciertosTotales,
      fallosTotales,
      tiempoResolucionSecs,
      wpm,
      balanceAciertos
    );

    let idUser = document.getElementById("idUser").value;
    let idText = document.getElementById("idText").value;

    enviarRatioResolucion(
      balanceAciertos,
      idText,
      idUser,
      wpm,
      tiempoResolucionSecs
    );
  }
}
