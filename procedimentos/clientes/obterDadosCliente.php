<?php

require_once "../../classes/conexao.php";
require_once "../../classes/clientes.php";

$obj = new clientes();

//chama o metodo via json
echo json_encode($obj->obterDadosCliente($_POST['idcliente']));

?>