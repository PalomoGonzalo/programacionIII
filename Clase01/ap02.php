/*

Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/

<?php 
$fecha=date('m-d-Y h:i:s a', time());  
$dia=date('z');
echo($fecha);

if ($dia<=79||$dia >355) {
    echo "estacion verano";
}
elseif ($dia<=171) {
    echo "Estacion Otoño";
}
elseif ($dia<=263) {
    echo "Estacion invierno";
}
else
{
    echo "Estacion Primavera";
}

?>