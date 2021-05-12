function eliminarUsuario(rand, id) {
  const userDiv = document.getElementById(rand);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      userDiv.innerHTML = this.responseText;
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/userScripts.php?id=" + id + "&option=delete",
    true
  );
  xhttp.send();
}
