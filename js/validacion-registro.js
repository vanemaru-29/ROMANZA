const formulario = document.getElementById('registro-cliente');
const inputs = document.querySelectorAll('#registro-cliente input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{8,40}$/, // Letras y espacios, pueden llevar acentos.
    nombre_usuario: /^[a-zA-Z0-9\_\-]{8,40}$/, // Letras, numeros, guion y guion_bajo
	telefono: /^\d{11,11}$/, // 11 numeros.
	clave: /^.{6,12}$/ // 6 a 12 digitos.
}

// inicializando campos
const campos = {
    nombre: false,
    nombre_usuario: false,
    telefono: false,
    clave: false
}

// llamando expresión según name
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombre":
            validarCampo(expresiones.nombre, e.target);
            break;
        
        case "nombre_usuario":
            validarCampo(expresiones.nombre_usuario, e.target);
            break;

        case "telefono":
            validarCampo(expresiones.telefono, e.target);
            break;

        case "clave":
            validarCampo(expresiones.clave, e.target);
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
    e.preventDefault();

    if (campos.nombre && campos.nombre_usuario && campos.telefono && campos.clave) {
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        formulario.reset();
    }
});