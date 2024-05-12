<?php 

require_once "../classes/conexao.php";



  if(isset($_SESSION['usuario']) ) {
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

    

<?php require_once "dependencias.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/a253dff25d.js" crossorigin="anonymous"></script>
	<title>estoque</title>

  <script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(100);
      $('.logo').height(60);

    }
    else {
      $('.logo').height(100);
      $('.logo').width(150);
    }
  }
  );

	
</script>
</head>
<body>
<?php while($mostrar = mysqli_fetch_row($result)): ?>
            
	 <div id="nav">
	 	 <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
	 	 	<div class="container">
	 	 		 <div class="navbar-header">

	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
  <p>asass</p>          
  <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="inicio.php"><img class="img-responsive logo img-thumbnail" src="../img/phpoo.png" alt="" width="100px" height="50px"></a>-->
          </div>
          <ul class="nav navbar-nav navbar-left">
             		<li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
          </ul>
             <div id="navbar" class="collapse navbar-collapse">
             	<ul class="nav navbar-nav navbar-right">
             	
          
          
            
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"  aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span>Gestão de produtos<span class="caret"></span></a>
            <ul class="dropdown-menu" >
              <li><a href="categorias.php">Categorias</a></li>
              
              <li><a href="Produtos.php">Produtos</a></li>
              
            </ul>
          </li>
          
          <?php if( $mostrar[2] == "administrador"): ?>
              
           
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>Pessoas<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="clientes.php">Clientes</a></li>
          
              <li><a href="Fornecedores.php">Fornecedores</a></li>
            </ul>
          </li>
          <?php endif; ?>
         

          
          
          <li><a href="vendas.php"><span class="glyphicon glyphicon-usd"></span> Vendas</a></li>
          
          <li class="dropdown" >                                                                                                                                                                                        
            <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 
             <!--para mostrar o nome o usuario que entrou na sessao-->
            <?php echo $mostrar[1];?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
         
            
            <?php if( $mostrar[2] == "administrador"): ?>
              
              
                 <li> <a href="usuarios.php"><span class="glyphicon glyphicon-off"></span> Gestão de usuários</a></li>
                 <?php endif; ?>
               
                
              

              <li> <a style="color: red" href="../procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              
            </ul>
          </li>
          </ul>
      </div>
       <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->

<!-- /container -->        

</body>
</html>


<?php endwhile; ?>


<?php
}	else {
		header("location:../index.php");
	}

?>