<?php

require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";

//as variaveis estao recebendo via post o que está sendo digitado no formulario
$obj = new usuarios();

$senha = sha1($_POST['senha']);
//os atributos do usuario estão recebendo os valores digitados nos inputs atraves do metodo POST
//colocar as informação dentro de um array (conjunto de strings) fica mais organizado
//obs: esses nomes sao estao no nome dos inputs

$dados = array(
	$_POST['nome'],
	$_POST['usuario'],
	$_POST['email'],
	$senha


);
//está acessando a funcao da classe usuario passando o array dados como paramtero
echo $obj->registrarUsuario($dados);

?>