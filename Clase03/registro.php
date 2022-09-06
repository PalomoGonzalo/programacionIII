<?php

/*

Aplicación No 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario


*/



class Usuario
{

private $_nombre;
private $_clave;
private $_mail;

public function __construct($nombre,$clave,$mail)
{
    $this->_nombre=$nombre;
    $this->_clave=$clave;
    $this->_mail=$mail;
}


public static function AltaAuto($usuario)
{
     if($usuario!=null)
    {
         $file=fopen('usuarios.cvs','a');
         fwrite($file,implode(',', get_object_vars($usuario)) . "\n");
         fclose($file);
     }
}



public static function LeerArchivo()
{
    $usuarios=array();

    if(file_exists('usuarios.csv'))
    {
        $file=fopen('usuarios.cvs','r');

        while(!feof($file))
        {
            $datos=fgetcsv($file);

            if($datos)
            {
                $usuarios[]=new Usuario($datos[0],$datos[1],$datos[2]);
            }
        }

        fclose($file);
    }
    return $usuarios;

}








}





?>