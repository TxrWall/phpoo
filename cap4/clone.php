<?php
class Titulo {
    public $valor;
}

$titulo = new Titulo;
$titulo->valor = 12345;

$titulo2 = clone $titulo;
$titulo2->valor = 89923;

var_dump($titulo);
var_dump($titulo2);