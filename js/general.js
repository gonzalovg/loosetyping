let darkModeCss = document.getElementById("dark-mode-css");

darkModeCss.disabled = true;

if (document.cookie === "darkmode=on") {
  let iconoTema = document.getElementById("botonTema");
  darkModeCss.disabled = false;
  iconoTema.setAttribute("class", "em em-sunny");
  iconoTema.setAttribute("aria-label", "BLACK SUN WITH RAYS");
} else {
  let iconoTema = document.getElementById("botonTema");
  darkModeCss.disabled = true;
  iconoTema.setAttribute("class", "em em-new_moon");
  iconoTema.setAttribute("aria-label", "NEW MOON SYMBOL");
}

function cambiarTema() {
  let iconoTema = document.getElementById("botonTema");
  let claseIcono = iconoTema.getAttribute("class");

  if (claseIcono == "em em-new_moon") {
    iconoTema.setAttribute("class", "em em-sunny");
    iconoTema.setAttribute("aria-label", "BLACK SUN WITH RAYS");
    darkModeCss.disabled = false;
    document.cookie = "darkmode=on";
  } else if (claseIcono == "em em-sunny") {
    iconoTema.setAttribute("class", "em em-new_moon");
    iconoTema.setAttribute("aria-label", "NEW MOON SYMBOL");
    darkModeCss.disabled = true;
    document.cookie = "darkmode=off";
  }
}
