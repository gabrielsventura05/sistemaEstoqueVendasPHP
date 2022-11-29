<?php 

	require_once "../../classes/conexao.php";
	require_once "../../classes/usuarios.php";

	$obj= new usuarios;

	echo $obj->excluirUsuarios($_POST['idusuario']);

 ?>