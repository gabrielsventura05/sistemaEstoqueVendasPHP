<?php

require_once "../../classes/conexao.php";
require_once "../../classes/clientes.php";

//as variaveis estao recebendo via post o que está sendo digitado no formulario
$obj = new clientes();

$senha = sha1($_POST['senha']);
//os atributos do usuario estão recebendo os valores digitados nos inputs atraves do metodo POST
//colocar as informação dentro de um array (conjunto de strings) fica mais organizado
//obs: esses nomes sao estao no nome dos inputs

$dados = array(
	$_POST['nome'],
    $_POST['sobrenome'],
    $_POST['endereco'],


	$_POST['email'],
    
	$senha,
    $_POST['telefone'],
    $_POST['cpf']

);
//está acessando a funcao da classe usuario passando o array dados como paramtero
echo $obj->registrarCliente($dados);

?>