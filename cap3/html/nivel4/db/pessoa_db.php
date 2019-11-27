<?php

function lista_pessoas()
{
    $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
    $result = $conn->query('SELECT * FROM pessoa ORDER BY id');
    $list = $result->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $list;
}

function exclui_pessoa($id)
{
    $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
    $result = $conn->query("DELETE FROM pessoa WHERE id = '{$id}'");
    $conn = null;
    return $result;
}

function get_pessoa($id)
{
    $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
    $result = $conn->query("SELECT * FROM pessoa WHERE id = '{$id}'");
    $pessoa = $result->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $pessoa;
}

function get_next_pessoa()
{
    $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
    $result = $conn->query('SELECT max(id) as next FROM pessoa');
    $next = (int) $result->fetch(PDO::FETCH_ASSOC)['next'] + 1;
    $conn = null;
    return $next;
}

function insert_pessoa($pessoa)
{
    $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
    $result = $conn->query("
            INSERT INTO pessoa (
                nome,
                endereco, 
                bairro, 
                telefone, 
                email, 
                id_cidade) 
            VALUES (
                \"{$pessoa['nome']}\",
                \"{$pessoa['endereco']}\",
                \"{$pessoa['bairro']}\",
                \"{$pessoa['telefone']}\",
                \"{$pessoa['email']}\",
                \"{$pessoa['id_cidade']}\"
                )
            ");
    return $result;
}

function update_pessoa($pessoa)
{
    $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
    $result = $conn->query("
    UPDATE pessoa
        SET nome = '{$pessoa['nome']}',
        endereco = '{$pessoa['endereco']}',
        bairro = '{$pessoa['bairro']}',
        telefone = '{$pessoa['telefone']}',
        email = '{$pessoa['email']}',
        id_cidade = '{$pessoa['id_cidade']}'
    WHERE id = '{$pessoa['id']}'
    ");
    return $result;
}