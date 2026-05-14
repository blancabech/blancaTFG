function validarCampo(input) {
    const valor = input.value.trim();
    const error = input.nextElementSibling;

    error.classList.add("d-none");
    if (valor === "") {
        error.classList.add("d-none");
        return;
    }

    if (input.classList.contains("validar-nombres")) {
        const patron = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;
        if (!patron.test(valor)) {
            error.textContent = "Solo se permiten letras y espacios";
            error.classList.remove("d-none");
        }
    }

    if (input.classList.contains("validar-usuario")) {
        const patron = /^[A-Za-z0-9_-]{3,20}$/;
        if (!patron.test(valor)) {
            error.innerHTML = "Debe tener 3-20 caracteres.<br>Letras, números, guiones y guion bajo";
            error.classList.remove("d-none");
        }
    }

    if (input.classList.contains("validar-fecha")) {
        const patronFecha = /^(\d{4})-(\d{2})-(\d{2})$/;
        if (!patronFecha.test(valor)) {
            error.innerHTML = "Formato inválido.<br>Correcto: (aaaa-mm-dd)";
            error.classList.remove("d-none");
            return;
        }
        const fecha = new Date(valor);
        const hoy = new Date();
        if (isNaN(fecha.getTime())) {
            error.textContent = "La fecha no existe";
            error.classList.remove("d-none");
            return;
        }
        if (fecha > hoy) {
            error.textContent = "La fecha no puede ser futura";
            error.classList.remove("d-none");
            return;
        }
        const fechaMinima = new Date(
            hoy.getFullYear() - 110,
            hoy.getMonth(),
            hoy.getDate()
        );
        if (fecha < fechaMinima) {
            error.textContent = "No puede tener más de 110 años";
            error.classList.remove("d-none");
            return;
        }
    }

    if (input.classList.contains("validar-correo")) {
        const patron = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!patron.test(valor)) {
            error.textContent = "Correo electrónico no válido";
            error.classList.remove("d-none");
        }
    }

    if (input.classList.contains("validar-telefono")) {
        const patron = /^[0-9]{9}$/;
        if (!patron.test(valor)) {
            error.textContent = "Debe tener 9 dígitos";
            error.classList.remove("d-none");
        }
    }

    if (input.classList.contains("validar-contrasenia")) {
        if (valor.length < 6) {
            error.textContent = "Debe tener mínimo 6 caracteres";
            error.classList.remove("d-none");
        }
    }
}

function bloquearSubmitSiErrores(formId) {
    const form = document.getElementById(formId);

    form.addEventListener("submit", function(e) {
        let hayErrores = false;
        let hayVacios = false;

        document.querySelectorAll(`#${formId} .texto-error`).forEach(error => {
            if (!error.classList.contains("d-none")) {
                hayErrores = true;
            }
        });
        document.querySelectorAll(`#${formId} [required]`).forEach(input => {
            if (input.value.trim() === "") {
                hayVacios = true;
            }
        });
        if (hayVacios) {
            e.preventDefault();
            mostrarToast("Hay campos obligatorios sin rellenar");
            return;
        }
        if (hayErrores) {
            e.preventDefault();
            mostrarToast("Corrige los errores antes de enviar el formulario");
        }
    });
}
