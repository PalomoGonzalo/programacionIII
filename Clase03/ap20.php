<?php
include_once "Auto.php";

class Garage {
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = 100) {
        if (is_string($razonSocial)) {
            $this->_razonSocial = $razonSocial;
        }
        if (is_numeric($precioPorHora)) {
            $this->_precioPorHora = $precioPorHora;
        }

        $this->_autos = array();
    }

    public function MostrarGarage() {
        $precioPorHora = strval($this->_precioPorHora);
        $autos = "";

        foreach ($this->_autos as $auto) {
            if (is_a($auto, "Auto")) {
                $autos = $autos . Auto::MostrarAuto($auto) . "<br />";
            }
        }

        return "Razón social: " . $this->_razonSocial . "<br />" . "Precio por hora: " . $precioPorHora . "<br />" . "Autos: " . "<br />" . $autos;
    }

    public function Equals($auto) {
        if (is_a($auto, "Auto")) {
            foreach ($this->_autos as $autoEnElArray) {
                if ($auto->Equals($autoEnElArray)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function Add($auto) {
        if (is_a($auto, "Auto")) {
            if (!$this->Equals($auto)) {
                $this->_autos[] = $auto;
            }
            else {
                echo 'Ese auto ya está en el garage!';
            }
        }
        else {
            echo 'Sólo se pueden agregar autos!!!';
        }
    }

    public function Remove($auto) {
        
            for ($i = 0; $i < count($this->_autos); $i++) {
                if ($auto->Equals($this->_autos[$i])) {
                    unset($this->_autos[$i]);
                    return;
                }
            }
            echo 'Ese auto no está en el garage!';
               
    }

    public static function AltaGarage($garage) {
    
        
        $archivo = fopen('garages.csv', 'a');
        
        if ($archivo) {
            $garageBuilder = array();
            $autoBuilder = array();

            foreach ($garage as $prop) {
                if (is_array($prop)) {
                    foreach ($prop as $auto) {
                        if (is_a($auto, "Auto")) {
                            $row = implode("|", $auto->GetPropiedades());
                            $autoBuilder[] = $row;
                        }
                    }
                    $garageBuilder[] = implode(";", $autoBuilder);
                }
                else {
                    $garageBuilder[] = $prop;
                }
            }

           
            $string = implode(",", $garageBuilder) . "\n";
            fwrite($archivo, $string);

           
            fclose($archivo);
        }
    }

    public static function LeerArchivo() { 
        $garages = array();
        
        if (file_exists('garages.csv')) {
            $archivo = fopen('garages.csv', 'r');

            while (!feof($archivo)) {
                $cursor = fgets($archivo);

				if ($cursor) {
                    $garageBuilder = explode(',', $cursor);
                    $garage = new Garage($garageBuilder[0], intval($garageBuilder[1]));
                    
                  
                    $stringListaDeAutos = explode(";", $garageBuilder[2]);

                   
                    foreach ($stringListaDeAutos as $stringAuto) {
                        $autoBuilder = explode("|", $stringAuto);
                        $garage->Add(new Auto($autoBuilder[0], $autoBuilder[1], $autoBuilder[2], $autoBuilder[3]));
                    }

                    $garages[] = $garage;
				}
            }
            
            fclose($archivo);
        }

        return $garages;
    }
   
}