function eliminarResolution(resolutionId, rand) {
  const resolutionDiv = document.getElementById(rand);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      resolutionDiv.innerHTML = this.responseText;
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/resolutionScripts.php?id=" +
      resolutionId +
      "&option=delete",
    true
  );
  xhttp.send();
}

function getRanks() {
  const text = document.getElementsByName("texto")[0].value;
  const time = document.getElementsByName("tiempo")[0].value;

  const rankDiv = document.getElementById("ranked-res");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      rankDiv.innerHTML = this.responseText;
      // console.log(this.responseText);
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/resolutionScripts.php?option=rank&time=" +
      time +
      "&text=" +
      text,
    true
  );
  xhttp.send();
}
