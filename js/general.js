let darkModeCss = document.getElementById("dark-mode-css");
let botonTema = document.getElementById("botonTema");

darkModeCss.disabled = true;

function cambiarTema() {
  let iconoTema = document.getElementById("botonTema");
  let claseIcono = iconoTema.getAttribute("class");

  if (claseIcono == "em em-new_moon") {
    iconoTema.setAttribute("class", "em em-sunny");
    iconoTema.setAttribute("aria-label", "BLACK SUN WITH RAYS");
    darkModeCss.disabled = false;
  } else if (claseIcono == "em em-sunny") {
    iconoTema.setAttribute("class", "em em-new_moon");
    iconoTema.setAttribute("aria-label", "NEW MOON SYMBOL");
    darkModeCss.disabled = true;
  }
}
