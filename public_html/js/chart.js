// let ctx = document.getElementById("myChart").getContext("2d");

// const data = {
//   labels: ["Aciertos", "Fallos"],
//   datasets: [
//     {
//       label: "Acirtos/fallos",
//       data: [50, 50],
//       backgroundColor: ["#35a853", "#ea4335"],
//       borderWidth: 1,
//     },
//   ],
// };

// const config = {
//   type: "doughnut",
//   data: data,
//   options: {
//     responsive: true,
//   },
// };

// const donut = new Chart(ctx, config);

function obtenerRatios(id) {
  alert("hola");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // alert(this.responseXML);
      console.log(this.responseText);
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
