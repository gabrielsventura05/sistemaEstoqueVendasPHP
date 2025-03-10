<?php
require_once "classes/conexao.php";

//instancia da classe conectar em uma variavel
$obj = new conectar();

//variavel conexao recebe o metodo conexao atravéz de obj
$conexao = $obj->conexao();

//verifica se existe um email com o valor 'admin' 
$sql = "SELECT * FROM usuarios where email = 'administrador'";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if (mysqli_num_rows($result) > 0) {

  header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrar Usuário</title>
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
				<div class="panel panel-danger">
					<div class="panel panel-heading">Registrar Administrador</div>
					<div class="panel panel-body">
						<form id="frmRegistro">
						
						<label>Nome</label>
						<input type="text" class="form-control input-sm" name="nome" id="nome">
						<label>Usuário</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="email" id="email">
							<label>Senha</label>
							<input type="password" class="form-control input-sm" name="senha" id="senha">
							<p></p>
							<span class="btn btn-primary" id="registro">Registrar</span>
							<a href="index.php" class="btn btn-default">Voltar Login</a>
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

			vazios=validarFormVazio('frmRegistro');
			//ve se os campos estao preenchidos
			if(vazios > 0){
				alert("Preencha os Campos!!");
				return false;
			}

			dados=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:dados,
				url:"procedimentos/login/registrarUsuario.php",
				success:function(r){
					//alert(r);

					if(r==1){
						alert("Registrado com Sucesso!!");
					}else{
						alert("Erro ao Inserir");
					}
				}
			});
		});
	});
</script>
