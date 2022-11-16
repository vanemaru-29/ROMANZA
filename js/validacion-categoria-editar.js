const formulario = document.getElementById('categoria');
const inputs = document.querySelectorAll('#categoria input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos.
    descripcion: /^[a-zA-ZÀ-ÿ\s]{15,200}$/ // Letras y espacios, pueden llevar acentos.
}

// inicializando campos
const campos = {
    nombre: false,
    descripcion: false,
}

// llamando expresión según name
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombre":
            validarCampo(expresiones.nombre, e.target);
            break;
        
        case "descripcion":
            validarCampo(expresiones.descripcion, e.target);
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

    if (campos.nombre || campos.descripcion) {
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        formulario.reset();
    }
});