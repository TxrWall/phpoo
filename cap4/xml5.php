<?php

$xml = simplexml_load_file('paises2.xml');

$xml->moeda = 'Novo Real (NR$)';
$xml->geografia->clima = 'temperado';

// novo nodo

$xml->addChild('presidente', 'Jair Bolsonaro');

echo $xml->asXML();

file_put_contents('paises2.xml', $xml->asXML());
