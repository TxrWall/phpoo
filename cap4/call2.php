<?php

class Titulo
{
    public $codigo, $valor;

    public function __call($method, $values)
    {
        return call_user_func($method, get_object_vars($this));
    }
}

$titulo = new Titulo;
$titulo->codigo = 1;
$titulo->valor = 12345;

echo '<pre>';

$titulo->print_r();
print  'A contagem é: ' . $titulo->count();
