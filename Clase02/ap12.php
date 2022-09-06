<?php
/*Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

*/

$palabra=array("H","O","L","A");

function invertirPalabra($mensaje)
{
    $contador=count($mensaje)-1;
    $retorno=null;
    
    for ($i=$contador; $i>=0  ; $i--) { 
           $retorno=$retorno.$mensaje[$i];
        }
    echo $retorno;

}

invertirPalabra($palabra);







?>