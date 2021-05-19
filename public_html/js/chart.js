let data = {
  labels: ["Aciertos", "Fallos"],
  datasets: [
    {
      label: "Acirtos/fallos",
      data: [50, 50],
      backgroundColor: ["#3380FF", "#ea4335"],
      borderWidth: 0,
      weigth: 1,
      hoverOffset: 2,
      borderWidth: 1,
      borderColor: "#707b7c",
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

      beforeDraw: function (chart) {
        if (
          chart.config.centerText.display !== null &&
          typeof chart.config.centerText.display !== "undefined" &&
          chart.config.centerText.display
        ) {
          drawTotals(chart);
        }
      },
    },
    cutout: 50,
  },
  centerText: {
    display: true,
    text: "fds",
  },
};

// const donut = new Chart(ctx, config);

function obtenerRatios(id) {
  console.log("hola");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
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
          ////////////////////////////////////////////////////////
          canvasDiv.classList.add("single-key-chart");
          canvasDiv.appendChild(canvasLetter);
          canvasLetter.classList.add("canvas-letter");
          canvasLetter.innerHTML = tecla;
          canvasDiv.appendChild(canvas);
          canvas.id = id;
          canvas.classList.add("single-key-chart");
          container.appendChild(canvasDiv);

          /////////////////////////////////////////////////
          let totalPulsaciones = aciertos + fallos;

          let porcentajeAciertos = (aciertos * 100) / totalPulsaciones;
          let porcentajeFallos = (fallos * 100) / totalPulsaciones;
          console.log(typeof porcentajeAciertos);
          data.datasets[0].data[0] = porcentajeAciertos;
          data.datasets[0].data[1] = porcentajeFallos;
          console.log(porcentajeAciertos);

          let ctx = document.getElementById(id).getContext("2d");
          ctx.fillText(tecla + "%", 75, 75);
          let donut = new Chart(ctx, config);
        }
      });
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/resolutionScripts.php?id=" +
      id +
      "&option=obtenerRatio",
    true
  );
  xhttp.send();
}

window.onload = obtenerRatios(document.getElementById("di_u"));
