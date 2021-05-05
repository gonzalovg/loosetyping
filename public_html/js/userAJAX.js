function eliminarUsuario(rand) {
  const userDiv = document.getElementById(rand);

  const userId = userDiv.firstChild.innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      userDiv.innerHTML = this.responseText;
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/userScripts.php?id=" + userId + "&option=delete ",
    true
  );
  xhttp.send();
}
