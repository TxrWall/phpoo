<?php
class Titulo
{
    public $valor, $codigo;

    public function __clone()
    {
        $this->codigo = NULL;
    }
}

$titulo = new Titulo;
$titulo->valor = 12345;
$titulo->codigo = 333;

$titulo2 = clone $titulo;
$titulo2->valor = 89923;

echo '<pre>';
var_dump($titulo);
var_dump($titulo2);