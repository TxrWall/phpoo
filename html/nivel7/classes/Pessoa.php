<?php

class Pessoa
{
    private static $conn;


    public static function getConnection()
    {
        if (empty(self::$conn)) {
            $conexao = parse_ini_file('config/livro.ini');
            $host = $conexao['host'];
            $name = $conexao['name'];
            $user = $conexao['user'];
            $pass = $conexao['pass'];
            self::$conn = new PDO('mysql:host=127.0.0.1;dbname=livro', 'root', '');
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    public static function save($pessoa)
    {
        $conn = self::getConnection();

        if (empty($pessoa['id'])) {

            $sql = "INSERT INTO pessoa (
                        nome,
                        endereco, 
                        bairro, 
                        telefone, 
                        email, 
                        id_cidade) 
                    VALUES (
                        :nome,
                        :endereco,
                        :bairro,
                        :telefone,
                        :email,
                        :id_cidade
                        )";

            $array = [
                ':nome' => $pessoa['nome'],
                ':endereco' => $pessoa['endereco'],
                ':bairro' => $pessoa['bairro'],
                ':telefone' => $pessoa['telefone'],
                ':email' => $pessoa['email'],
                ':id_cidade' => $pessoa['id_cidade']
            ];
        } else {

            $sql = "UPDATE pessoa
                        SET 
                        nome = :nome,
                        endereco = :endereco,
                        bairro = :bairro,
                        telefone = :telefone,
                        email = :email,
                        id_cidade = :id_cidade
                    WHERE id = :id";

            $array = [
                ':id' => $pessoa['id'],
                ':nome' => $pessoa['nome'],
                ':endereco' => $pessoa['endereco'],
                ':bairro' => $pessoa['bairro'],
                ':telefone' => $pessoa['telefone'],
                ':email' => $pessoa['email'],
                ':id_cidade' => $pessoa['id_cidade']
            ];
        }

        $result = $conn->prepare($sql);

        $result->execute($array);
    }

    public static function find($id)
    {
        $conn = self::getConnection();

        $result = $conn->query("SELECT * FROM pessoa WHERE id = '{$id}'");

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $conn = self::getConnection();

        $result = $conn->query("DELETE FROM pessoa WHERE id = '{$id}'");

        return $result;
    }

    public static function all()
    {
        $conn = self::getConnection();

        $result = $conn->query('SELECT * FROM pessoa ORDER BY id');
        $list = $result->fetchAll(PDO::FETCH_ASSOC);

        return $list;
    }
}
