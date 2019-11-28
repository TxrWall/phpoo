<?php

class Titulo
{
    private $data;

    public function __set($propriedade, $valor)
    {
        $this->data[$propriedade] = $valor;
    }

    public function __get($propriedade)
    {
        return $this->data[$propriedade];
    }
}

$titulo = new Titulo;
$titulo->valor = 12345;
print 'O valor é: ' . number_format($titulo->valor, 2, ',', '.');

print '<br/><br/>Verificando atribuição à propriedade... <br/><br/>';

if (isset($titulo->valor)) {
    print "Valor definido<br/>\n";
} else {
    print "Valor não definido<br/>\n";
}

print '<br/><br/>Resetando valor da propriedade... <br/><br/>';

unset($titulo->valor);

print '<br>';

print 'O valor é: ' . number_format($titulo->valor, 2, ',', '.');