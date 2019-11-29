<?php

$xml = simplexml_load_file('paises4.xml');
echo "***** Estados *****<br>\n";
foreach ($xml->estados->estado as $estado) {
    foreach ($estado->attributes() as $key => $value) {
        echo "$key => $value <br>\n";
    }
}