//  MODO OSCURO / MODO CLARO

let darkModeCss = document.getElementById("dark-mode-css");
darkModeCss.disabled = true;
// alert(document.cookie);
if (document.cookie === "darkmode=on") {
  let iconoTema = document.getElementById("botonTema");
  darkModeCss.disabled = false;
  iconoTema.setAttribute("class", "ec ec-sun-with-face");
  iconoTema.setAttribute("aria-label", "BLACK SUN WITH RAYS");
} else {
  let iconoTema = document.getElementById("botonTema");
  darkModeCss.disabled = true;
  iconoTema.setAttribute("class", "ec ec-new-moon-with-face");
  iconoTema.setAttribute("aria-label", "NEW MOON SYMBOL");
}

function cambiarTema() {
  let iconoTema = document.getElementById("botonTema");
  let claseIcono = iconoTema.getAttribute("class");

  if (claseIcono == "ec ec-new-moon-with-face") {
    iconoTema.setAttribute("class", "ec ec-sun-with-face");
    iconoTema.setAttribute("aria-label", "BLACK SUN WITH RAYS");
    darkModeCss.disabled = false;
    document.cookie = "darkmode=on";
  } else if (claseIcono == "ec ec-sun-with-face") {
    iconoTema.setAttribute("class", "ec ec-new-moon-with-face");
    iconoTema.setAttribute("aria-label", "NEW MOON SYMBOL");
    darkModeCss.disabled = true;
    document.cookie = "darkmode=off";
  }
}
