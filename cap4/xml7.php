<?php

$xml = simplexml_load_file('paises4.xml');

echo 'Nome :'  . $xml->nome . "<br>\n";
echo 'Idioma : ' . $xml->idioma . "<br>\n";
echo "<br>\n";
echo "***** Estados *****<br>\n";
/**
 * Voce pode acessar um estado diretamento pelo seu índece
 * echo $xml->estados->nome[0] 
 */
foreach ($xml->estados->estado as $estado) {
    echo str_pad('Estado : ' . $estado['nome'], 30) . 
    'Capital : ' . $estado['capital'] . "<br>\n";
}