<?php

class Titulo
{
    public $codigo, $valor;

    public function __call($method, $values)
    {
        print "Você executou o método {$method}, com os parâmetros: " . implode(',', $values) . "<br>\n";
    }
}

$titulo = new Titulo;

$titulo->teste(1,2,3);
$titulo->teste2(4,5,6);