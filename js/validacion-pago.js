const formulario = document.getElementById('pago');
const referencia_p = document.getElementById('referencia_p');

const expresiones = {
	referencia_p: /^\d{4,10}$/, // Sólo numeros.
}

// inicializando campos
const campos = {
    referencia_p: true,
}

// llamando expresión según name
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "referencia_p":
            validarCampo(expresiones.referencia_p, e.target);
            break;
    }
}

// validando cada campo según expresión
const validarCampo = (expresion, input) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${input.name}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${input.name}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${input.name} i`).classList.remove('fa-xmark');        
        document.querySelector(`#grupo__${input.name} i`).classList.add('fa-check');

        document.querySelector(`#grupo__${input.name} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        
        campos[input.name] = true;
    } else {
        document.getElementById(`grupo__${input.name}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${input.name}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${input.name} i`).classList.add('fa-xmark');        
        document.querySelector(`#grupo__${input.name} i`).classList.remove('fa-check');
        
        document.querySelector(`#grupo__${input.name} .formulario__input-error`).classList.add('formulario__input-error-activo');
        
        campos[input.name] = false;
    }
}

// ejecutando función al presionar teclas o al dar click afuera
referencia_p.addEventListener('keyup', validarFormulario);
referencia_p.addEventListener('blur', validarFormulario);

// validando que todos los campos sean correctos
formulario.addEventListener('submit', (e) => {
    // e.preventDefault();

    if (campos.referencia_p) {
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        formulario.reset();
    }
});