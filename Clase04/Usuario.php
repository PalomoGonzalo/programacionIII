<?php

/*
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.

*/
private $_nombre;
private $_clave;
private $_mail;
private $_id;
private $_imagen;
private $_fecha

public function __construct($nombre, $clave, $mail, $foto=null)
{
    $this->_nombre = $nombre;
    $this->_clave = $clave;
    $this->_mail = $mail;
    $this->_imagen = $foto;
}


public static function LeerArchivoJson()
{
    $filename="usuarios.json";
    if(file_exists($filename))
    {
        $archivo=fopen($filename, "r");
        
        if($archivo)
        {
            $texto=fread($archivo, filesize($filename));
            fclose($archivo);

            if($texto)
            {
                return json_decode($texto);
            }
        }
    }

    return array();

}

private static function Alta($usuario)
{
    

}


private static function SetIdRandom()
{
    $id=VerificarId();
    while($id==0)
    {
        $id=VerificarId();
    }

    Usuario->$_id= $id;
}

private static function VerificarId()
{
    $randomNumero = rand(1,100000);
    $arrayUsuarios = Usuario::LeerArchivoJson();
    foreach ($arrayUsuarios as $key => $value) {

        if($key->$_id==$randomNumero)
        {
            return 0;
        }      
    }
    return $id;








}







?>