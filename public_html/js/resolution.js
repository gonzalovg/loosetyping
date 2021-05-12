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
