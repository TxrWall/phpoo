<?php
class Titulo {
    public $valor;
}

$titulo = new Titulo;
$titulo->valor = 12345;

$titulo2 = $titulo;
$titulo2->valor = 89923;

var_dump($titulo);
var_dump($titulo2);

// apontam para o mesmo valor na memória |-> utlizar __clone();