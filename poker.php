<?php
function generarYOrdenarMano() {
    // Definir los valores y los palos de las cartas
    $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', " J=> 11 . Q=>, 12 . K=> 13', A=> 1 "];
    $suits = ['♥', '♦', '♣', '♠'];

    // Crear la baraja
    $deck = [];
    foreach ($suits as $suit) {
        foreach ($values as $value) {
            $deck[] = "$value de $suit";
        }
    }

    // Barajar la baraja
    shuffle($deck);

    // Seleccionar las primeras 5 cartas
    $hand = array_slice($deck, 0, 5);

    // Ordenar las cartas
    sort($hand);

    // Imprimir las cartas ordenadas
    foreach ($hand as $card) {
        echo $card . "<br>";
    }
}

// Llamar a la función
generarYOrdenarMano();
?>