const formulario = document.getElementById('producto');
const inputs = document.querySelectorAll('#producto input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{8,40}$/, // Letras y espacios, pueden llevar acentos.
	descripcion: /^[a-zA-ZÀ-ÿ\s]{15,200}$/, // Letras y espacios, pueden llevar acentos.
	precio: /^[0-9]+[,]+[0-9]{2,2}$/ // formato 00,00
}

// inicializando campos
const campos = {
    nombre: false,
    descripcion: false,
    precio: false,
    imagen: false
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

        case "precio":
            validarCampo(expresiones.precio, e.target);
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

// validar extensión de archivo
function validarExt() {
    var archivoInput = document.getElementById('imagen');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.png)$/i;

    if (!extPermitidas.exec(archivoRuta)) {
        swal('Asegure haber seleccionado una imagen en formato ".png".');
        
        archivoInput.value = '';
        campos.imagen = false;
    } else {
        if (archivoInput.files && archivoInput.files[0]) {
            var visor = new FileReader();
            visor.onload = function (e) {
                document.getElementById('ver-archivo').innerHTML='<embed src="'+e.target.result+'">';
            };

            visor.readAsDataURL(archivoInput.files[0]);
            campos.imagen = true;
        }
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

    if (campos.nombre && campos.descripcion && campos.precio && campos.imagen) {
        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        formulario.reset();
    }
});