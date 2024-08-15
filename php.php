<?php
//la variable function me permite reutilizar el codigo para yo poder aplicar las veces que quiera
function calcularDescuento($precioOriginal, $descuentoAplicar)
{
 $descuento = $precioOriginal * $descuentoAplicar / 100;
    $precioFinal = $precioOriginal - $descuento;
    return $precioFinal;
}
$total = readline("cuantos descuentos desea realizar  ");
//for me permite delca
for ($i = 1; $i <= $total; $i++) {
    echo "Descuento #" . $i . "\n";
    $precioOriginal = readline("valor del precio:    ");
    $descuentoAplicar = readline("valor del descuento:    ");
    echo "el descuento de $precioOriginal es igual a; " . "\n" . calcularDescuento($precioOriginal, $descuentoAplicar) . "\n";
}
