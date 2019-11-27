<?php

require_once 'classes/CSVParser.php';

// definição das subclasses de erro
class FileNotFoundException extends Exception {}
class FilePermissionException extends Exception {}

$csv = new CSVParser('clientes.csv', ';');

try {
    $csv->parse(); // método que poder lançar exceção
    while ($row = $csv->fetch()) {
        print $row['Cliente'] . " - ";
        print $row['Cidade'] . "<br/>\n";
    }
} catch (FileNotFoundException $e) {
    echo '<pre>';
    print_r($e->getTrace());
    die("Arquivo não encontrado");
} catch (FilePermissionException $e) {
    echo $e->getFile() . ' : ' . $e->getLine() . ' # ' . $e->getMessage();
}