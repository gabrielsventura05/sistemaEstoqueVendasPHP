<?php
//para iniciar uma sessao de usuario
session_start();
require_once "../../classes/conexao.php";
require_once "../../classes/clientes.php";

//as variaveis estao recebendo via post o que está sendo digitado no formulario
$obj = new clientes();

//colocar as informação dentro de um array fica mais organizado
$dados = array(

	$_POST['email'],
	$_POST['senha']
	

);

echo $obj->loginCliente($dados);

?>