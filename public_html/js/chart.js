let data = {
  labels: ["Aciertos", "Fallos"],
  datasets: [
    {
      label: "Acirtos/fallos",
      data: [50, 50],
      backgroundColor: ["#3380FF", "#ea4335"],
      borderWidth: 0,
      weigth: 1,
      hoverOffset: 1,
      // borderWidth: 1,
      borderColor: "black",
    },
  ],
};

const config = {
  type: "doughnut",
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      },
    },
    cutout: 40,
  },
  centerText: {
    display: true,
    text: "fds",
  },
};

var xhttp = new XMLHttpRequest();

function obtenerRatios(id) {
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const jsonKeys = JSON.parse(this.responseText);
      let container = document.getElementById("keys-ratio");
      jsonKeys.forEach((element) => {
        if (element.aciertos + element.fallos >= 1) {
          let id = Math.floor(Math.random() * 1000000);
          let canvas = document.createElement("canvas");
          let tecla = element.tecla;
          let aciertos = parseInt(element.aciertos);
          let fallos = parseInt(element.fallos);
          let canvasDiv = document.createElement("div");
          let canvasLetter = document.createElement("p");
          let totalPulsaciones = aciertos + fallos;
          let porcentajeAciertos = (aciertos * 100) / totalPulsaciones;
          let porcentajeFallos = (fallos * 100) / totalPulsaciones;
          ////////////////////////////////////////////////////////
          canvasDiv.classList.add("single-key-chart");
          canvasDiv.appendChild(canvasLetter);
          canvasLetter.classList.add("canvas-letter");
          canvasLetter.innerHTML = tecla;
          canvasDiv.setAttribute(
            "title",
            "Pulsaciones totales: " +
              totalPulsaciones +
              "\nAciertos: " +
              aciertos +
              "\nFallos: " +
              fallos
          );
          canvasDiv.appendChild(canvas);
          canvas.id = id;
          canvas.classList.add("single-key-chart");
          container.appendChild(canvasDiv);

          /////////////////////////////////////////////////

          data.datasets[0].data[0] = porcentajeAciertos;
          data.datasets[0].data[1] = porcentajeFallos;

          let ctx = document.getElementById(id).getContext("2d");
          ctx.fillText(tecla + "%", 75, 75);
          let donut = new Chart(ctx, config);
        }
      });
    }
  };
}
const id = document.getElementById("data").value;

xhttp.addEventListener("load", obtenerRatios(id));
xhttp.open(
  "GET",
  "../private/scripts/resolutionScripts.php?id=" + id + "&option=obtenerRatio",
  true
);
xhttp.send();
