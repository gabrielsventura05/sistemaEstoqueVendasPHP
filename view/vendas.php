<?php 

include_once "../classes/conexao.php";
	session_start();
	if(isset($_SESSION['usuario']) || isset($_SESSION['iduser'])){

		var_dump($_SESSION['usuario'], $_SESSION['iduser']);

		
			$sessao = $_SESSION['usuario'];//pega a variavel que esta em session, que nesse caso e o 
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
						

	
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>vendas</title>
	<?php require_once "menu.php"; ?>
</head>
<body>

	<div class="container">
		 <h1>Venda de Produtos</h1>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<span class="btn btn-default" id="vendaProdutosBtn">Vender Produto</span>
		 		<span class="btn btn-default" id="vendasFeitasBtn">Lista de Vendas</span>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="vendaProdutos"></div>
		 		<div id="vendasFeitas">

		 			
<?php 

	
	//require_once "vendas/vendasRelatorios.php" 

	?>

		 		</div>
		 	</div>
		 </div>
	</div>
</body>
</html>
	
	<script type="text/javascript">
		$(document).ready(function(){
			/*$('#vendaProdutosBtn').click(function(){
				esconderSessaoVenda();*/
				$('#vendaProdutos').load('vendas/vendasDeProdutos.php');
				$('#vendaProdutos').show();
			});
			$('#vendasFeitasBtn').click(function(){
				esconderSessaoVenda();
				$('#vendasFeitas').load('vendas/vendasRelatorios.php');
				$('#vendasFeitas').show();
			});
			$(document).ready(function(){
			$('#vendaProdutosBtn').click(function(){
				esconderSessaoVenda();
				$('#vendaProdutos').load('vendas/vendasDeProdutos.php');
				$('#vendaProdutos').show();
			});
		});

		function esconderSessaoVenda(){
			$('#vendaProdutos').hide();
			$('#vendasFeitas').hide();
		}

	</script>

<?php 
	}else{
		header("location:../index.php");
	}
 ?>