<?php
function generarYOrdenarMano()
{
    // Definir los palos y los valores de las cartas
    $suits = ['♥', '♦', '♣', '♠'];
    $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

    // Crear la baraja
    $deck = [];
    foreach ($suits as $suit) {
        foreach ($values as $value) {
            $deck[] = ['valor' => $value, 'palo' => $suit];
        }
    }

    // Barajar la baraja
    shuffle($deck);

    // Seleccionar las primeras 5 cartas
    $hand = array_slice($deck, 0, 3);

    // Función de comparación para ordenar las cartas
    function compararCartas($a, $b)
    {
        $valueOrder = [
            '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9,
            '10' => 10, 'J' => 11, 'Q' => 12, 'K' => 13, 'A' => 1
        ];
        return $valueOrder[$a['valor']] <=> $valueOrder[$b['valor']];
    }

    // Ordenar las cartas
    usort($hand, 'compararCartas');

    // Imprimir las cartas ordenadas
    foreach ($hand as $card) {
        echo $card['valor'] . $card['palo'] . "\n";
    }
}

// Llamar a la función
echo generarYOrdenarMano();
