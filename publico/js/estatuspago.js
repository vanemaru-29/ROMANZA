const estatus_inactivo = document.querySelectorAll('#estatus-pendiente');
const estatus_activo = document.querySelectorAll('#estatus-aprobado');

const estatus_enviado = document.querySelectorAll('#estatus-enviado');

estatus_activo.forEach((activo) => {
    activo.classList.add('btn-warning');
});

estatus_inactivo.forEach((inactivo) => {
    inactivo.classList.add('btn-danger');
});

estatus_enviado.forEach((enviado) => {
    enviado.classList.add('btn-success');
});