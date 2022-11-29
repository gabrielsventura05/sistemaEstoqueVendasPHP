<?php  

require_once "../../classes/conexao.php";
require_once "../../classes/categorias.php";

$obj = new categorias();

$dados = array (
	$_POST['idcategoria'],
	
	//esse post está recebndo o que digitado no input de atualizar categoria
	$_POST['categoriaU']

);

echo $obj->atualizarCategoria($dados);


?>