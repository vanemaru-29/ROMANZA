const estatus_inactivo = document.querySelectorAll('#estatus-inactivo');
const estatus_activo = document.querySelectorAll('#estatus-activo');

estatus_activo.forEach((activo) => {
    activo.classList.add('btn-warning');
});

estatus_inactivo.forEach((inactivo) => {
    inactivo.classList.add('btn-danger');
});