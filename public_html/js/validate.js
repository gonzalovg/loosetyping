function validar() {
    const form = document.getElementsByTagName("form")[0];
    const formInfo = document.getElementById("form-info");

    let formularioRelleno = true;
    let inputs = form.getElementsByTagName("input");
    let focusInput = 0;
    while (formularioRelleno && focusInput < inputs.length) {
        if (inputs[focusInput].value == "") {
            formularioRelleno = false;
            inputs[focusInput].style.borderColor = "#f85d4fcc";
            formInfo.innerHTML = `Rellena el campo ${inputs[focusInput].placeholder} `;
        }
        focusInput++;
    }

    if (formularioRelleno) {
        form.submit();
    }
}

function validarReg() {
    const form = document.getElementsByTagName("form")[0];
    const formInfo = document.getElementById("form-info");

    let formularioRelleno = true;
    let inputs = form.getElementsByTagName("input");
    let focusInput = 0;

    let pass = document.getElementsByName("password")[0];
    let passAuth = document.getElementsByName("passwordVerification")[0];

    if (pass.value != passAuth.value) {
        formularioRelleno = false;
        formInfo.innerHTML = "Las contraseñas deben coincidir";
    }

    while (formularioRelleno && focusInput < inputs.length) {
        if (inputs[focusInput].value == "") {
            formularioRelleno = false;
            inputs[focusInput].style.borderColor = "#f85d4fcc";
            formInfo.innerHTML = `Rellena el campo ${inputs[focusInput].placeholder} `;
        }
        focusInput++;
    }

    if (formularioRelleno) {
        form.submit();
    }
}