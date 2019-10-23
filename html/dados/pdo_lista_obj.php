<?php

try {

    $conn = new PDO('mysql:host=localhost;dbname=livro', 'wallace', '123');

    $result = $conn->query('SELECT codigo, nome FROM famosos');

    if($result) {
        while($row = $result->fetch(PDO::FETCH_OBJ)) {
            echo $row->codigo . ' - ' . $row->nome . "<br>\n";
        }
    }

    $conn = null;

} catch (PDOException $e) {
    print "Erro!:" . $e->getMessage() . "\n";
}