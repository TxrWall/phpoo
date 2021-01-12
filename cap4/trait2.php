<?php

require_once "classes/Record.php";

trait ObjectConversionTrait
{
  public function toXML()
  {
    $data = array_flip($this->data);
    $xml = new SimpleXMLElement('<' . get_class($this) . '/>');
    array_walk_recursive($data, array($xml, 'addChild'));
    return $xml->asXML();
  }

  public function toJSON()
  {
    return json_encode($this->data);
  }
}

class Pessoas extends Record
{
  const TABLENAME = 'pessoas';
  use ObjectConversionTrait {
    toJSON as exportToJSON;
  }
}

class Fornecedore extends Record
{
  const TABLENAME = 'fornecedor';
  use ObjectConversionTrait;
}

class Produto extends Record
{
  const TABLENAME = 'produto';
}

$pessoas = new Pessoas();
$pessoas->nome = 'Wallace Belem Teixeira';
$pessoas->endereco = 'Rua dos Cogumelos';
$pessoas->numero = '388';
print $pessoas->toXML();
print $pessoas->exportToJSON();