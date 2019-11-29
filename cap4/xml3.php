<?php

$xml = simplexml_load_file('paises.xml');

foreach ($xml->children() as $elemento => $value) {
    echo "$elemento->$value<br>\n";
}