function deleteText(textDiv, id) {
  var xhttp = new XMLHttpRequest();
  const textContainer = document.getElementById(textDiv);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      textContainer.innerHTML = this.responseText;
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/textScripts.php?id=" + id + "&option=delete",
    true
  );
  xhttp.send();
}
