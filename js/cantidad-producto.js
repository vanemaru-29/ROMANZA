function calcular(ID) {
    var a = document.getElementById('cantidad'+ID).value;
    var b = document.getElementById('precio'+ID).value;
    var resultado = parseFloat(a *= b);

    document.getElementById('total'+ID).value = resultado.toFixed(2);
}