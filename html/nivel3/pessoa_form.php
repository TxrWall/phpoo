<?php

if (!empty($_REQUEST['action'])) {
    $dsn = "mysql:host=localhost;dbname=livro','root',''";
    $conn = new PDO($dsn);

    if ($_REQUEST['action'] == 'edit') {

        // edit commands

        $id = (int) $_GET['id'];

        $result = $conn->query("SELECT * FROM pessoa WHERE id = '{$id}'");

        $pessoa = $result->fetch(PDO::FETCH_OBJ);
    } else if ($_REQUEST['action'] == 'save') {

        // save commands

        $pessoa = $_POST;

        if (empty($_POST['id'])) {

            $result = $conn->query("
            INSERT INTO pessoa (
                nome', '
                endereco', 
                'bairro', 
                'telefone', 
                'email', 
                'id_cidade') 
            VALUES (
                {$pessoa['nome']},
                {$pessoa['endereco']},
                {$pessoa['bairro']},
                {$pessoa['telefone']},
                {$pessoa['email']},
                {$pessoa['id_cidade']}
                )
            ");
        } else {

            // update commands

            $result = $conn->query("
            UPDATE pessoa SET
                nome = '$pessoa[nome]', 
                endereco = '$pessoa[endereco]', 
                bairro = '$pessoa[bairro]', 
                telefone = '$pessoa[telefone]', 
                email = '$pessoa[email]',
                id_cidade = '$pessoa[id_cidade]'
            WHERE id = '{$pessoa[id]}'");
        }

        print ($result) ? 'Registro salvo com sucesso' : pg_last_error($conn);
        $conn = null;
    }
} else {

    // no action commands

    $pessoa = [];
    $pessoa['id'] = '';
    $pessoa['nome'] = '';
    $pessoa['endereco'] = '';
    $pessoa['bairro'] = '';
    $pessoa['telefone'] = '';
    $pessoa['email'] = '';
    $pessoa['id_cidade'] = '';
}

require_once 'lista_combo_cidades.php';

$form = file_get_contents('form.html');
$form = str_replace('{id}', $pessoa['id'], $form);
$form = str_replace('{nome}', $pessoa['nome'], $form);
$form = str_replace('{endereco}', $pessoa['endereco'], $form);
$form = str_replace('{bairro}', $pessoa['bairro'], $form);
$form = str_replace('{telefone}', $pessoa['telefone'], $form);
$form = str_replace('{email}', $pessoa['email'], $form);
$form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
$form = str_replace('{cidades}', lista_combo_cidades($pessoa['id_cidade']), $form);

print $form;
