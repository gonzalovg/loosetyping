function processCategory() {
  const categoryInput = document.getElementsByName("category")[0];
  if (categoryInput.value != "") {
    insertCategory(categoryInput.value);
  }
}

function insertCategory(categoryName) {
  var xhttp = new XMLHttpRequest();
  const requestResultDiv = document.getElementById("requestResult");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      requestResultDiv.innerHTML = this.responseText;
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/categoryScripts.php?category=" +
      categoryName +
      "&option=insert",
    true
  );
  xhttp.send();
}

function deleteCategory(categoryDiv, id) {
  var xhttp = new XMLHttpRequest();
  const categoryContainer = document.getElementById(categoryDiv);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      categoryContainer.innerHTML = this.responseText;
    }
  };
  xhttp.open(
    "GET",
    "../private/scripts/categoryScripts.php?id=" + id + "&option=delete",
    true
  );
  xhttp.send();
}
