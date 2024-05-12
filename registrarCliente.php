<?php
require_once "classes/conexao.php";

//instancia da classe conectar em uma variavel
$obj = new conectar();

//variavel conexao recebe o metodo conexao atravéz de obj
$conexao = $obj->conexao();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrar Cliente</title>
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
				<div class="panel panel-success">
					<div class="panel panel-heading">Registrar Cliente</div>
					<div class="panel panel-body">
						<form id="frmRegistroCliente">
						
						<label>Nome</label>
						<input type="text" class="form-control input-sm" name="nome" id="nome">
						<label>sobrenome</label>
							<input type="text" class="form-control input-sm" name="sobrenome" id="sobrenome">
							<label>Endereço</label>
						<input type="text" class="form-control input-sm" name="endereco" id="endereco">
						
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="email" id="email">
							<label>Senha</label>
							<input type="password" class="form-control input-sm" name="senha" id="senha">
							<label>Telefone</label>
							<input type="text" class="form-control input-sm" name="telefone" id="telefone">
							<label>CPF</label>
							<input type="text" class="form-control input-sm" name="cpf" id="cpf">
							
							<p></p>
							<span class="btn btn-primary" id="registro">Registrar</span>
							<a href="LoginCliente.php" class="btn btn-default">Voltar Login</a>
					</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>


<!---------------------------SCRIPTS-------------------------------->

<!------------------VALIDACAO DO FORMULARIO--------->
<script type="text/javascript">
	$(document).ready(function(){
		//ve se o botao registro foi clicado
		$('#registro').click(function(){

			vazios=validarFormVazio('frmRegistroCliente');
			//ve se os campos estao preenchidos
			if(vazios > 0){
				alert("Preencha os Campos!!");
				return false;

			}

			dados=$('#frmRegistroCliente').serialize();
			$.ajax({
				type:"POST",
				data:dados,
				url:"procedimentos/login/registrarCliente.php",
				success:function(r){
					alert(r);

					if(r==1){
						$('#frmRegistroCliente')[0].reset();
						alert("Registrado com Sucesso!!");
					}else{
						alert("Erro ao Inserir");
					}
				}
			});
		});
	});
</script>
