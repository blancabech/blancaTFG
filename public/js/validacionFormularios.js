function validarCampo(input) {
    if (input.type === "radio") return;
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

    if (input.classList.contains("validar-nacimiento")) {
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

    if (input.classList.contains("validar-fecha-cita")) {
        const fecha = new Date(valor);

        const dia = fecha.getDay(); // 0 domingo, 6 sábado
        if (dia === 0 || dia === 6) {
        error.textContent = "No se puede reservar en fin de semana";
        error.classList.remove("d-none");
        return;
    }
        
        const hoy = new Date();
        hoy.setHours(0, 0, 0, 0);
        if (fecha < hoy) {
            error.textContent = "La fecha debe ser futura";
            error.classList.remove("d-none");
        }
    }

    if (input.classList.contains("validar-hora-cita")) {
        const fechaInput = document.querySelector("input[name='fecha']");
        if (fechaInput && fechaInput.value !== "") {
            const fechaSeleccionada = new Date(fechaInput.value);
            const hoy = new Date();

            if (fechaSeleccionada.toDateString() === hoy.toDateString()) {
                const [h, m] = valor.split(":");
                const horaSeleccionada = new Date();
                horaSeleccionada.setHours(h, m, 0, 0);

                if (horaSeleccionada < hoy) {
                    error.textContent = "La hora debe ser futura";
                    error.classList.remove("d-none");
                }
            }
        }
        const [h, m] = valor.split(":").map(Number);

        if (h < 8 || h > 14) {
            error.innerHTML = "Primera cita a las 8:00.<br>Última a las 14:00";
            error.classList.remove("d-none");
            return;
        }

        if (m !== 0 && m !== 30) {
            error.textContent = "La cita debe ser en punto o y media";
            error.classList.remove("d-none");
            return;
        }

    }

    if (input.classList.contains("validar-notas")) {
        if (valor.length > 500) {
            error.textContent = "Máximo 500 caracteres";
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
            mostrarToast("Hay campos obligatorios sin rellenar", "danger");
            return;
        }
        if (hayErrores) {
            e.preventDefault();
            mostrarToast("Corrige los errores antes de enviar el formulario", "danger");
        }
    });
}

