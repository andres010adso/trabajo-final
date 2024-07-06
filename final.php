<?php
$nombres = readline ("ingrese nombre: ");
$contraseña = readline("ingrese contraseña: ");
$empleados = [];

if($nombres == "andres" && $contraseña == 1234) {
    $numero = readline("ingrese el numero de empleados a registrar: ");
    for($i=0; $i <=$numero; $i++) {
        echo"persona $i: ";
        $dni = readline("dni: ");
        $nombre = readline("nombre: ");
        $estatura = readline("estatura: ");
        $edad = readline("edad: ");
        $genero = readline("genero: ");
        $peso = readline("peso: ");
        $fuma = readline("fuma: ");

        $empleado =[
            "dni" => $dni,
            "nombre" => $nombre,
            "estatura" => $estatura,
            "edad" => $edad,
            "genero" => $genero,
            "peso" => $peso,
            "fuma" => $fuma,
        ];
        $empleados[] = $empleado;
    }
    $nombreBuscado = readline("ingrese el nombre del empleado: ");
    $dniBuscado = readline("ingrese el dni del empleado: ");

        foreach ($empleados as $empleado) {
            if ($empleado["nombre"] == $nombreBuscado && $empleado["dni"] == $dniBuscado) {
                echo " dni: ". $empleado["dni"];
                echo " nombre: ". $empleado["nombre"];
                echo " estatura: ". $empleado["estatura"];
                echo " edad: ". $empleado["edad"];
                echo " genero: ". $empleado["genero"];
                echo " peso: ". $empleado["peso"];
                echo " fuma: " . $empleado["fuma"];
        break;
    }else {
        echo "el empleado no existe";
    }
}
}else {
    echo "el inicio de sesion no es correcto verifique nombre o contraseña";
}