<?php

function calcularDescuento($precioOriginal, $descuentoAplicar) {
    $descuento = $precioOriginal * $descuentoAplicar / 100;
    $precioFinal = $precioOriginal - $descuento;
    return $precioFinal; // Return the final price after discount
}

$total = readline("¿Cuántos descuentos desea calcular? ");
for ($i = 1; $i <= $total; $i++) {
    echo "Descuento #" . $i . "\n";
    $precioOriginal = readline("Ingrese el valor original del producto: ");
    $descuentoAplicar = readline("Ingrese el porcentaje de descuento a aplicar: ");
    
    $precioFinal = calcularDescuento($precioOriginal, $descuentoAplicar);
    $descuentoAplicado = $precioOriginal - $precioFinal;
    
    echo "El descuento aplicado es: " . number_format($descuentoAplicado, 2) . "\n";
    echo "El precio final después del descuento es: " . number_format($precioFinal, 2) . "\n\n";
}

?>
