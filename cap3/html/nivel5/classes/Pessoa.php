<?php

class Pessoa
{

    public static function save($pessoa)
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (empty($pessoa['id'])) {

            $sql = "INSERT INTO pessoa (
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
                        )";

            return $conn->query($sql);
        } else {

            $sql = "UPDATE pessoa
                        SET 
                        nome = '{$pessoa['nome']}',
                        endereco = '{$pessoa['endereco']}',
                        bairro = '{$pessoa['bairro']}',
                        telefone = '{$pessoa['telefone']}',
                        email = '{$pessoa['email']}',
                        id_cidade = '{$pessoa['id_cidade']}'
                    WHERE id = '{$pessoa['id']}'";

            return $conn->query($sql);
        }
    }

    public static function find($id)
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $conn->query("SELECT * FROM pessoa WHERE id = '{$id}'");

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("DELETE FROM pessoa WHERE id = '{$id}'");

        return $result;
    }

    public static function all()
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $conn->query('SELECT * FROM pessoa ORDER BY id');
        $list = $result->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }
}
