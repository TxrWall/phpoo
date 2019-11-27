<?php

$conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');

if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
    $id = (int) $_GET['id'];
    $result = $conn->query("DELETE FROM pessoa WHERE id='{$id}'");
}

$result = $conn->query("SELECT * FROM pessoa ORDER BY id");

$items = '';

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $item = file_get_contents('html/item.html');
    $item = str_replace('{id}', $row['id'], $item);
    $item = str_replace('{nome}', $row['nome'], $item);
    $item = str_replace('{endereco}', $row['endereco'], $item);
    $item = str_replace('{bairro}', $row['bairro'], $item);
    $item = str_replace('{telefone}', $row['telefone'], $item);
    $items .= $item;
}

$conn = null;

$list = file_get_contents('html/list.html');
$list = str_replace('{items}', $items, $list);

print $list;