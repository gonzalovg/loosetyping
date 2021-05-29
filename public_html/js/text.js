function deleteText(textDiv, id) {
    var xhttp = new XMLHttpRequest();
    const textContainer = document.getElementById(textDiv);

    xhttp.onreadystatechange = function() {
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

function validar() {
    const form = document.getElementsByTagName("form")[0];
    const formInfo = document.getElementById("form-info");
    const selectCategory = document.getElementsByTagName("select")[0];
    const contentArea = document.getElementsByTagName("textarea")[0];

    let formularioRelleno = true;
    let inputs = form.getElementsByTagName("input");
    let focusInput = 0;
    console.log(selectCategory);
    while (formularioRelleno && focusInput < inputs.length) {
        if (inputs[focusInput].value == "") {
            formularioRelleno = false;
            inputs[focusInput].style.borderColor = "#f85d4fcc";
            formInfo.innerHTML = `Rellena el campo ${inputs[focusInput].placeholder} `;
        }

        if (contentArea.value == "") {
            contentArea.style.borderColor = "#f85d4fcc";
            formularioRelleno = false;
            formInfo.innerHTML = "Agregue el contenido del texto";
            console.log(contentArea.innerHTML);
        }

        if (selectCategory.value == 0) {
            selectCategory.style.borderColor = "#f85d4fcc";
            formularioRelleno = false;

            formInfo.innerHTML = `Seleccione una categoría `;
        }

        focusInput++;
    }

    if (formularioRelleno) {
        form.submit();
    }
}