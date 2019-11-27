<?php

try {

    $conn = new PDO('mysql:host=localhost;dbname=livro', 'wallace', '123');

    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimo')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");
    $conn = null;

} catch (PDOException $e) {
    print "Erro!:" . $e->getMessage() . "\n";
}
