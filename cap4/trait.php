<?php

require_once "classes/Record.php";

class Pessoas extends Record
{
  const TABLENAME = 'pessoas';
}

class Fornecedore extends Record
{
  const TABLENAME = 'fornecedor';
}

class Produto extends Record
{
  const TABLENAME = 'produto';
}

$pessoas = new Pessoas();
$pessoas->load(1);
print '<br>' . PHP_EOL;
$pessoas->nome = 'Wallace Belem Teixeira';
$pessoas->endereco = 'Rua dos Cogumelos';
$pessoas->numero = '388';
$pessoas->save();
print '<br>' . PHP_EOL;
$pessoas->delete(1);