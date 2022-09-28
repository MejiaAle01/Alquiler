function Precio() {
    var totalpago = 0.00;

    var cantCarros = document.getElementById('cantcarros').value;
    var precio = document.getElementById('price').value;

    totalpago = parseFloat(cantCarros * precio).toFixed(2);

    document.getElementById('Tpago').innerHTML = "$" + totalpago;
}