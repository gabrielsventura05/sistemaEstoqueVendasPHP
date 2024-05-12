<?php
require_once "../classes/conexao.php";



session_start();

 if(isset($_SESSION['usuario'])) {
	$sessao = $_SESSION['usuario'];//pega a variavel que esta em session, que nesse caso e o 
	//email do usuario

$c= new conectar();
	$conexao=$c->conexao();

	$sql2="SELECT id,
					nome,
					user,
					email
			from usuarios where email ='$sessao'";//seleciona o usuario em que o email for igual
			//ao que esta na sesssao
	$resultado=mysqli_query($conexao, $sql2);

	
	

	?>



<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "menu.php"; ?>
	
</head>

<body>

<?php if($mostrar = mysqli_fetch_row($resultado)): ?>

           
	<h1>BEM VINDO <?php echo $mostrar[1];?> </h1><br>
	<p>Você está logado como <?php echo $mostrar[2];?></p>
	<?php endif; ?>
	</h1>
	
	
</body>
</html>




<?php 

}	else {
		header("location:../index.php");
	}

?>