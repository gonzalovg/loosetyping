function eliminarUsuario(rand) {
  const userDiv = document.getElementById(rand);

  const userId = userDiv.firstChild.innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //   userDiv.innerHTML = "Usuario " + userId + " eliminado";
      alert(this.responseText);
      userDiv.innerHTML = this.responseText;
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/delete.php?id=" + userId + "&type='user' ",
    true
  );
  xhttp.send();
}
