const formulario = document.getElementById('direccion');
const inputs = document.querySelectorAll('#direccion input');

const expresiones = {
    direccion: /^[a-zA-ZÀ-ÿ\d\#\.\,\-\s]{20,200}$/, // Letras (acentos), espacios y los caracteres '#' '.' ',' '-'
    referencia: /^[a-zA-ZÀ-ÿ\d\#\.\,\-\s]{0,200}$/ // Letras (acentos), espacios y los caracteres '#' '.' ',' '-'
}

// inicializando campos
const campos = {
    direccion: false,
    referencia: false
}

// llamando expresión según name
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "direccion":
            validarCampo(expresiones.direccion, e.target);
            break;

        case "referencia":
            validarCampo(expresiones.referencia, e.target);
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
inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

// validando que todos los campos sean correctos
formulario.addEventListener('submit', (e) => {
    // e.preventDefault();

    if (campos.direccion || campos.referencia) {
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        formulario.reset();
    }
});