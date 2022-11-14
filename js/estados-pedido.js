// pedido enviado
function solicitarPedido(id) {
    swal({
        title: "Se enviará la información de su pedido",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })

    .then((willDelete) => {
        if (willDelete) {
        swal("¡Pedido enviado exitosamente!", {
            icon: "success",
        });
        } else {
        swal("Se ha cancelado la acción");
        }
    });
}

// pedido en proceso
function pedidoProceso(id) {
    swal({
        title: "¿Desea cambiar el estado del pedido?",
        text: "Al cambiar el estado confirmará que se ha iniciado la preparación del pedido",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })

    .then((willDelete) => {
        if (willDelete) {
        swal("¡Pedido en preparación!", {
            icon: "success",
        });
        } else {
        swal("Se ha cancelado la acción");
        }
    });
}

// pedido finalizado
function pedidoFinalizado(id) {    
    swal({
        title: "¿Desea cambiar el estado del pedido?",
        text: "Al cambiar el estado confirmará que se ha finalizado el pedido con exito",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })

    .then((willDelete) => {
        if (willDelete) {
        swal("¡Pedido finalizado exitosamente!", {
            icon: "success",
        });
        } else {
        swal("Se ha cancelado la acción");
        }
    });
}