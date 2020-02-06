<?php
$dados = array(
    array('codigo', 'nome', 'endereco', 'telefone'),
    array(1,'Maria','Rua Dois','11 99999 9999'),
    array(2,'João','Rua Três','11 99999 9999'),
);

$file = new SplFileObject('dados.csv', 'w');
$file->setCsvControl(',');
foreach($dados as $linha) {
    $file->fputcsv($linha);
}