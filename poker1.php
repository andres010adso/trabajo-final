<?php

function repartirCartas()
{
    $palos = array("♥", "♦", "♣", "♠");
    $valores = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");
    $mazo = array();

    foreach ($palos as $palo) {
        foreach ($valores as $valor) {
            $mazo[] = "$valor de $palo";
        }
    }
    shuffle($mazo);

    return array_slice($mazo, 0, 5);
}

function mostrarCartas($cartas)
{
    foreach ($cartas as $carta) {
        echo "$carta\n";
    }
}

function evaluarMano($cartas)
{
    $valores = array();
    $palos = array();

    foreach ($cartas as $carta) {
        list($valor, $palo) = explode(" de ", $carta);
        $valores[] = $valor;
        $palos[] = $palo;
    }

    $valoresdeCuenta = array_count_values($valores);
    $palosdeCuenta = array_count_values($palos);

    if (esEscaleraReal($valores, $palosdeCuenta)) {
        echo "Escalera Real\n";
    } elseif (esEscaleraColor($valores, $palosdeCuenta)) {
        echo "Escalera de Color\n";
    } elseif (esPoker($valoresdeCuenta)) {
        echo "Poker\n";
    } elseif (esFullHouse($valoresdeCuenta)) {
        echo "Full House\n";
    } elseif (esColor($palosdeCuenta)) {
        echo "Color\n";
    } elseif (esEscalera($valores)) {
        echo "Escalera\n";
    } elseif (esTrio($valoresdeCuenta)) {
        echo "Trío\n";
    } elseif (esDosPares($valoresdeCuenta)) {
        echo "Dos Pares\n";
    } elseif (esPar($valoresdeCuenta)) {
        echo "Par\n";
    } else {
        echo "Carta Alta\n";
    }
}

function esEscaleraReal($valores, $palosdeCuenta)
{
    $escaleraReal = array("10", "J", "Q", "K", "A");
    return esEscaleraColor($valores, $palosdeCuenta) && count(array_diff($valores, $escaleraReal)) == 0;
}

function esEscaleraColor($valores, $palosdeCuenta)
{
    return esColor($palosdeCuenta) && esEscalera($valores);
}

function esPoker($valoresdeCuenta)
{
    return in_array(4, $valoresdeCuenta);
}

function esFullHouse($valoresdeCuenta)
{
    return in_array(3, $valoresdeCuenta) && in_array(2, $valoresdeCuenta);
}

function esColor($palosdeCuenta)
{
    return in_array(5, $palosdeCuenta);
}

function esEscalera($valores)
{
    $orden = "A23456789TJQKA";
    sort($valores);
    $cadena = implode("", $valores);
    return strpos($orden, $cadena) !== false;
}

function esTrio($valoresdeCuenta)
{
    return in_array(3, $valoresdeCuenta);
}

function esDosPares($valoresdeCuenta)
{
    return count(array_filter($valoresdeCuenta, function ($v) {
        return $v == 2;
    })) == 2;
}

function esPar($valoresdeCuenta)
{
    return in_array(2, $valoresdeCuenta);
}

$cartas = repartirCartas();
echo "Cartas repartidas:\n";
mostrarCartas($cartas);
echo "Evaluacion de la mano:\n\n";
evaluarMano($cartas);

$repartir = true;

while (true) {
    echo "\n";
    echo "1. Jugar nuevamente\n";
    echo "2. Salir\n";
    $opcion = readline("Ingrese una opcion: ");

    switch ($opcion) {
        case 1:
            $cartas = repartirCartas();
            echo "Cartas repartidas:\n";
            mostrarCartas($cartas);
            echo "Evaluacion de la mano:\n\n";
            evaluarMano($cartas);
            break;
        case 2:
            echo "Salida exitosa";
            exit;
        default:
            echo "Oe mano eliga bien.\n";
            break;
    }
}
