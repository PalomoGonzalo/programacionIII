<?php
/*

Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
Neiner, Maximiliano – Villegas, Octavio PHP- Página 1
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.



*/

$listaNumeros=array();
$numeros=1;
$contador=0;


while($contador<11)
{
    if(($numeros%2)== 1)
    {
        $listaNumeros[$contador]=$numeros;
        $contador++;
    }
    $numeros++;
}

foreach ($listaNumeros as $valor) {
   echo $valor ."<br>";
}




?>