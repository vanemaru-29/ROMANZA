// formulario editar información
const formularioInfo = document.getElementById('editar-info');
const inputsInfo = document.querySelectorAll('#editar-info input');

// formularioClave
const formularioClave = document.getElementById('editar-clave');
const inputsClave = document.querySelectorAll('#editar-clave input');

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
    clave: false,
    clave2: false,
    clave3: false
}

// llamando expresión según name en formulario 1
const validarFormulario1 = (e) => {
    switch (e.target.name) {
        case "nombre":
            validarCampos1(expresiones.nombre, e.target);
            break;
        
        case "nombre_usuario":
            validarCampos1(expresiones.nombre_usuario, e.target);
            break;

        case "telefono":
            validarCampos1(expresiones.telefono, e.target);
            break;
    }
}

// validando cada campo según expresión
const validarCampos1 = (expresion, input) => {
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

// ejecutando función al presionar teclas o al dar click afuera en formulario 1
inputsInfo.forEach((input) => {
    input.addEventListener('keyup', validarFormulario1);
    input.addEventListener('blur', validarFormulario1);
});

// validando que todos los campos sean correctos en formulario 1
formularioInfo.addEventListener('submit', (e) => {
    e.preventDefault();

    if (campos.nombre && campos.nombre_usuario && campos.telefono) {
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        formulario.reset();
    }
});

// ----------  ----------

// llamando expresión según name en formulario 2
const validarFormulario2 = (e) => {
    switch (e.target.name) {
        case "clave":
            validarCampos1(expresiones.clave, e.target);
            break;
        
        case "clave2":
            validarCampos1(expresiones.clave, e.target);
            validarClave();
            break;

        case "clave3":
            validarClave();
            break;
    }
}

// validando que las contraseñas sean iguales
const validarClave = () => {
    const inputClave2 = document.getElementById('clave2');
    const inputClave3 = document.getElementById('clave3');

    if ((String(inputClave3.value) == "") || (inputClave3.value !== inputClave2.value)) {
        document.getElementById(`grupo__clave3`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__clave3`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__clave3 i`).classList.add('fa-xmark');        
        document.querySelector(`#grupo__clave3 i`).classList.remove('fa-check');
        
        document.querySelector(`#grupo__clave3 .formulario__input-error`).classList.add('formulario__input-error-activo');

        campos.clave3 = false;
    } else {
        document.getElementById(`grupo__clave3`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__clave3`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__clave3 i`).classList.remove('fa-xmark');        
        document.querySelector(`#grupo__clave3 i`).classList.add('fa-check');

        document.querySelector(`#grupo__clave3 .formulario__input-error`).classList.remove('formulario__input-error-activo');

        campos.clave3 = true;
    }
}

// ejecutando función al presionar teclas o al dar click afuera en formulario 2
inputsClave.forEach((input) => {
    input.addEventListener('keyup', validarFormulario2);
    input.addEventListener('blur', validarFormulario2);
});

// validando que todos los campos sean correctos en formulario 1
formularioClave.addEventListener('submit', (e) => {
    e.preventDefault();

    if (campos.clave && campos.clave2 && campos.clave3) {
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        formulario.reset();
    }
});
