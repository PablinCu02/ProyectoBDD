<?php

$mi_primera_var = "hola";

$hola = "mundo";

$resultado = $mi_primera_var . " " . $hola;

$importe = 1234.76;

$importe = true;

$importe = 123;

$dias = array();

$dias = ['lunes', 'martes', 'miércoles', 'jueves'];

$meses = [1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo'];

$usuario = ['nombre' => 'Eduardo', 'edad' => 36, 'habilidades' => ['nadar', 'escalar', '']];

$a = $importe + $importe;

if ($hola) {
    // Si entra
}

/*
Cadenas no vacías, boleano verdadero, números diferentes a cero y arreglos no vacíos se evaluan a verdadero
*/

class Telefono
{
    public $marca = 'Sin marca';
    private $memoria = 32;
    protected $so;

    public function __construct()
    {
        $this->so = 'Android 14.0';
    }

    public function obtenerMemoria(): int
    {
        return $this->memoria;
    }

    public function establecerMemoria(int $mb): int
    {
        $this->memoria = $mb;
        return $this->obtenerMemoria();
    }
}

class Samsung extends Telefono
{
    public function __construct()
    {
        $this->marca = 'Samsung';
        $this->so = 'Android 13.0';
    }
}

$smart = new Telefono();
$galaxy = new Samsung();

echo $smart->marca;
echo $smart->establecerMemoria(64);
echo $smart->obtenerMemoria();

echo $galaxy->marca;