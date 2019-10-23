<?php

function lista_combo_cidades($id = null)
{

    $output = '';

    $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');

    $result = $conn->query('SELECT id, nome FROM cidade');

    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            $check = ($row->id == $id) ? 'selected' : '';

            $output .= "<option $check value='{$row->id}'>{$row->nome}</option>\n";
        }
    }

    $conn = null;

    return $output;
}
