<?php

session_start();
require_once "../../classes/conexao.php";
require_once "../../classes/categorias.php";

//pega data atual
$data = date("Y-m-d");

$idusuario = $_SESSION['iduser'];//pega o id od usuario que cadastrou a categoria, 
//todas a tabelas têm esse id
$categoria = $_POST['categoria'];

$obj = new categorias();

$dados = array(
	$idusuario,
	$categoria,
	$data

);

echo $obj->adicionarCategoria($dados);

?>

