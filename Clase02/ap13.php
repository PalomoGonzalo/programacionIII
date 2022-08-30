<?php
/*
Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.

*/

$mensaje=array("H","O","L","A");


function validarPalabra($palabra,$max)
{
    $len=count($palabra)-1;
    if($len<=$max)
    {
        if(strcmp($palabra,"Recuperatorio")==0||strcmp($palabra,"Parcial")==0||strcmp($palabra,"Programacion")==0)
        {
            return 1;
        }
    }
    else
    {
        return 0;
    }

}


function invertirPalabra($palabra)
{
    $contador=count($palabra)-1;
    $retorno="error en la palabra";
    
    if (validarPalabra($palabra,4)==1) {
        $retorno="";
        for ($i=$contador; $i>=0  ; $i--)
         { 
            $retorno=$retorno.$palabra[$i];
         }        
    }
    return $retorno;
}


echo InvertirPalabra($mensaje);



?>