/*
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.


*/
<?php   

$numero=0;
$contador=1;

while (($contador+$numero) < 1000) {
    $numero=$numero+$contador;
    $contador++;
}
echo($numero);

?>