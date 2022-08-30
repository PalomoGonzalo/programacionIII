<?php
include_once "ap14.php";

$auto1=new Auto("Fiat","Azul");
$auto2=new Auto("Fiat","Verde");

$auto3=new Auto("Peugeot","Negro",14444);
$auto4=new Auto("Peugeot","Negro",44444);

$auto5=new Auto("Ford","Gris",84444,date('m-d-Y', time()));

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

$importeDouble=Auto::Add($auto1,$auto2);
echo $importeDouble."<br>";
$importeDouble=Auto::Add($auto3,$auto4);
echo $importeDouble."<br>";

if($auto1->Equals($auto1,$auto2))
{
    echo "Los autos son iguales";
}

echo Auto::MostrarAuto($auto1)."<br />";
echo Auto::MostrarAuto($auto3)."<br />";
echo Auto::MostrarAuto($auto5)."<br />";




?>