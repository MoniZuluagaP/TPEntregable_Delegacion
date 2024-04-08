<?php
include_once "Viaje.php";
include_once "Pasajero.php";
include_once "ResponsableV.php";

function validarIngUsu($entrada){
    $valido = false;
    if($entrada!= ""){
        $valido = true;
    }
    return $valido;
}


$viaje1 = "";
/*$resp1 = new ResponsableV("1", "2024", "sol", "perez");
$viaje1 = new Viaje("001", "mde", 2,$resp1);
$pas1 = new Pasajero("moni","zulu","95","111");
$pas2 = new Pasajero("pablo","contreras", "32", "2222");
$viaje1->setListaPasajeros([$pas1, $pas2]);*/

$salir = 0;
while(!$salir){
    echo "MENU DE OPCIONES\n";
    echo "***** EL VIAJE FELIZ *****";
    echo "1. Crear un nuevo viaje\n";
    echo "2. Agregar pasajeros\n";
    echo "3. Modificar información de pasajero\n";
    echo "4. Ver los datos de un viaje\n";
    echo "5. Ver los datos de un pasajero\n";
    echo "6. Ver los datos de empleado responsable del viaje\n";
    echo "7. Salir del menú y terminar programa\n\n";

    echo "Seleccione una de las opciones: ";
    $opElegida = trim(fgets(STDIN));

    switch ($opElegida){

        //Si elige crear un nuevo viaje
        case 1:
            echo "\nIngrese todos los datos correctamente. No deje ningún espacio en blanco";
            do {
            echo "\n\nIngrese el número de identificación del viaje: ";
            $idViaje = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $dest = trim(fgets(STDIN));
            echo "Ingrese la cantidad máxima de pasajeros: ";
            $cantMax = trim(fgets(STDIN));
            echo "Asigne un responsable del viaje: ";
            echo "\nNumero del empleado responsable: ";
            $nEmp = trim(fgets(STDIN));
            echo "Numero de licencia del empleado responsable: ";
            $lEmp = trim(fgets(STDIN));
            echo "Nombre del empleado responsable: ";
            $nombreE = trim(fgets(STDIN));
            echo "Apellido del empleado responsable: ";
            $apellidoE = trim(fgets(STDIN));
            $entradasSonValid = (validarIngUsu($idViaje) && validarIngUsu($dest) && validarIngUsu($nEmp) &&
                validarIngUsu($lEmp) && validarIngUsu($nombreE) && validarIngUsu($apellidoE) && is_numeric($cantMax));
            if (!$entradasSonValid){
                echo "****** Datos ingresados incorrectamente. Debe volver a completarlos";
            }
            } while (!$entradasSonValid);

            $respViaje1 = new ResponsableV($nEmp, $lEmp, $nombreE, $apellidoE);
            $viaje1 = new Viaje($idViaje, $dest,(int)$cantMax, $respViaje1);
            echo "****** Viaje creado correctamente\n\n";
            break;

        //Si elige agregar pasajeros al viaje
        case 2:
            if ($viaje1 instanceof Viaje){
                echo "\nIngrese todos los datos correctamente. No deje ningún espacio en blanco";
                do {
                    echo "\n\nIngrese el nombre del pasajero: ";
                    $nomPas = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero: ";
                    $apePas = trim(fgets(STDIN));
                    echo "Ingrese el número de documento del pasajero: ";
                    $docPas = trim(fgets(STDIN));
                    echo "Ingrese el número de teléfono del pasajero: ";
                    $numTelPas = trim(fgets(STDIN));

                    $entradasSonValid = (validarIngUsu($nomPas) && validarIngUsu($apePas) && validarIngUsu($docPas) &&
                        validarIngUsu($numTelPas));
                    if (!$entradasSonValid){
                        echo "****** Datos ingresados incorrectamente. Debe volver a completarlos";
                    }
                } while (!$entradasSonValid);

                $pasajero = new Pasajero($nomPas, $apePas, $docPas, $numTelPas );
                $pasFueAgreg = $viaje1->agregarPasajero($pasajero);
                if ($pasFueAgreg){
                    echo "El pasajero se agregó correctamente a la lista de pasajeros del viaje\n";
                } else if (!$pasFueAgreg && count($viaje1->getListaPasajeros())>=$viaje1->getCantPasajeros() ) {
                    echo "****** Ya no pueden agregarse más pasajeros a la lista de este viaje\n";
                } else {
                    echo "****** Este DNI ya pertenece a un pasajero de la lista de pasajeros del viaje\n";
                }
            } else {
                echo "****** Aún no hay un viaje para agregar pasajeros\n";
            }
            echo "\n";
            break;

        // Si elige modificar datos de un pasajero
        case 3:
            if ($viaje1 instanceof Viaje){
                echo "Ingrese el DNI del pasajero que desea modificar: ";
                $dniIngresado = trim(fgets(STDIN));
                $pasajeros = $viaje1->getListaPasajeros();
                $posEnLista = $viaje1->modifDatosPasajero($dniIngresado);
                if ($posEnLista == -1){
                    echo "****** El DNI no pertenece a ningún pasajero en la lista\n\n";
                } else {
                    do {
                        echo "Ingrese el nombre nuevo: ";
                        $nomPas = trim(fgets(STDIN));
                        echo "Ingrese el apellido nuevo: ";
                        $apePas = trim(fgets(STDIN));
                        echo "Ingrese el número de teléfono nuevo: ";
                        $numTelPas = trim(fgets(STDIN));
                        $entradasSonValid = (validarIngUsu($nomPas) && validarIngUsu($apePas) && validarIngUsu($numTelPas));
                        if (!$entradasSonValid){
                            echo "****** Datos ingresados incorrectamente. Debe volver a completarlos";
                        }
                    } while (!$entradasSonValid);

                    $pasajeros[$posEnLista]->setNombre($nomPas);
                    $pasajeros[$posEnLista]->setApellido($apePas);
                    $pasajeros[$posEnLista]->setNumeroTelef($numTelPas);
                    echo "Cambios realizados correctamente";
                    echo "\n\n";
                }
            } else {
                echo "****** Aún no hay información de pasajeros para modificar\n\n";
            }
            break;

        //Si elige ver los datos de un viaje
        case 4:
            if ($viaje1 instanceof Viaje){
                echo $viaje1."\n";
                echo "Pasajeros: ";
                echo "\n";
                $viaje1->mostrarPasajeros();
                echo "\n";
            } else {
                echo "****** Todavía no hay un viaje creado\n\n";
            }
            break;

        //Si elige ver los datos de un pasajero
        case 5:
            if ($viaje1 instanceof Viaje){
                echo "Ingrese el dni del pasajero que desea ver: ";
                $dniIngresado = trim(fgets(STDIN));
                $pasajeros = $viaje1->getListaPasajeros();
                $posEnLista = $viaje1->modifDatosPasajero($dniIngresado);
                if ($posEnLista == -1){
                    echo "\n****** El DNI no pertenece a ningún pasajero en la lista\n\n";
                } else {
                    echo "\nDatos del pasajero: ".$pasajeros[$posEnLista]."\n";
                }
            } else {
                echo "****** No hay información de pasajeros para mostrar\n\n";
            }
            break;

        //Si elige ver los datos del responsable del viaje
        case 6:
            if ($viaje1 instanceof Viaje){
                echo "\nEmpleado responsable del viaje: ".$viaje1->getRespViaje()."\n";
            } else {
                echo "****** Todavía no hay un viaje creado con un empleado responsable del mismo\n\n";
            }
            break;

        case 7:
            echo "******\n\nPrograma finalizado";
            $salir = true;
            break;
    }

}