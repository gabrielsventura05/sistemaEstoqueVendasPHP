<?php
	require_once "classes/conexao.php";
	$obj = new conectar();
	$conexao = $obj->conexao();

	

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
</head>
<body style="background-color: gray">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Cliente</div>
					<div class="panel panel-body">
						<p>
							<img src="img/vendas.jpg"  width="80%">
						</p>
						<form id="frmLoginCliente">
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="email" id="email">
							<label>Senha</label>
							<input type="password" name="senha" id="senha" class="form-control input-sm">
							<p></p>
							<button span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</button>
							
							<a href="registrarCliente.php" class="btn btn-danger btn-sm">Registrar</a>

							
							
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vazios=validarFormVazio('frmLoginCliente');

			if(vazios > 0){
				alert("Preencha os campos!!");
				return false;
			}

		dados=$('#frmLoginCliente').serialize();
		$.ajax({
			type:"POST",
			data:dados,
			url:"procedimentos/login/loginCliente.php",
			success:function(r){
				alert(r);
				if(r==1){
					window.location="view/inicio.php";
				}else{
					alert("Email ou senha incorretos!!");
				}
			}
		});
	});
	});
</script>