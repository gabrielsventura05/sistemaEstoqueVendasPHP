<?php
require_once "../classes/conexao.php";



session_start();

 if(isset($_SESSION['usuario'])) {
	/*$sessao = $_SESSION['usuario'];//pega a variavel que esta em session, que nesse caso e o 
	//email do usuario

$c= new conectar();
	$conexao=$c->conexao();

	$sql="SELECT id,
					nome,
					user,
					email
			from usuarios where email ='$sessao'";//seleciona o usuario em que o email for igual
			//ao que esta na sesssao
	$result=mysqli_query($conexao, $sql);
	*/

	?>



<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "menu.php"; ?>
	
</head>
<body>

	<h1>BEM VINDO</h1>
	
</body>
</html>




<?php 

}	else {
		header("location:../index.php");
	}

?>