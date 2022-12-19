const formulario = document.getElementById('form-contacto');
const inputs = document.querySelectorAll('#form-contacto input');

const expresiones = {
	Nombre: /^[a-zA-ZÀ-ÿ\s]{8,40}$/, // Letras y espacios, pueden llevar acentos.
    Asunto: /^[a-zA-Z0-9À-ÿ\s\_\-\.\,]{8,40}$/, // Letras, numeros, guion y guion_bajo
	Email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, // formato correo.
	Mensaje: /^[a-zA-Z0-9À-ÿ\s\_\-\.\,]{10,400}$/ // 10 a 400 digitos.
}

// inicializando campos
const campos = {
    Nombre: false,
    Asunto: false,
    Email: false,
    Mensaje: false
}

// llamando expresión según name
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "Nombre":
            validarCampo(expresiones.Nombre, e.target);
            break;
        
        case "Asunto":
            validarCampo(expresiones.Asunto, e.target);
            break;
        
        case "Email":
            validarCampo(expresiones.Email, e.target);
            break;

        case "Mensaje":
            validarCampo(expresiones.Mensaje, e.target);
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

    if (campos.Nombre && campos.Asunto && campos.Email && campos.Mensaje) {
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        formulario.reset();
    }
});