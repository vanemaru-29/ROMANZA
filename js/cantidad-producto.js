function calcular(ID) {
    // calcular total de un producto
    var a = document.getElementById('cantidad'+ID).value;
    var b = document.getElementById('precio'+ID).value;
    var resultado = parseFloat(a *= b);

    document.getElementById('total'+ID).value = resultado.toFixed(2);

    // total de todos los productos
    const array = document.querySelectorAll(`.total`);
    let sum = 0;

    for (let n of array) {
        sum += parseFloat(n.value);
    }
    document.getElementById('precio_total').value = sum;
}