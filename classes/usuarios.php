<?php

class usuarios{

	public function registrarUsuario($dados){
		//instancia da classe conectar
		$c = new conectar();
		//acessando o metodo conexao
		$conexao = $c->conexao();

		//recebe o formato da data
		$data = date('Y-m-d');

		//para inserir os as informacoes nas variaveis dentro do array deve acessa-las por indice 
		$sql = "INSERT INTO usuarios (nome, user, email, senha, dataCadastro) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$data' )";//a data está fora do array

		return mysqli_query($conexao, $sql);
	}

	public function login($dados){

		$c = new conectar();
		$conexao = $c->conexao();

		//está criptografando o valor da senha que está no indice 1
		$senha = sha1($dados[1]);
		
		
		
		//selciona do usuario o email e a senha que for igual ao email e senha digitados no formulario
		//o campo email está sendo comparado com com o valor de email que está no indice 0 em login
		$sql = "SELECT * FROM usuarios WHERE email = '$dados[0]'and senha = '$senha'";

		//sessao serve para ver o tipo de usuario que está acessando e tambem o tempo que o usuario fica logado
		$_SESSION['usuario'] = $dados[0];//no caso a session usuario está recebendo o valor do campo nome que está no idince 0
		$_SESSION['iduser'] = self::trazerId($dados);//self indica que uma funcao está na mesma classe

		
		
		//executa a conexao
		$result = mysqli_query($conexao, $sql);

		//verifica se tem linha com as informacoes da consulta
		if(mysqli_num_rows($result) > 0){

			return 1;
		} else {

			return 0;
		}

	}

	public function trazerId($dados){

		$c = new conectar();

		$conexao = $c->conexao();

		$senha = sha1($dados[1]);//sha serve para criptografar a senha

		//busca por id
		$sql = "SELECT id FROM usuarios where email = '$dados[0]' and senha = '$senha'";
		
		$result= mysqli_query($conexao, $sql);

		 return mysqli_fetch_row($result)[0];

		

		

		
		
		
		//ele busca o que está no index 0
	}

	public function obterDados($idusuario){

		$c = new conectar();
		$conexao=$c->conexao();

		$sql="SELECT id, nome, user, email from usuarios where id='$idusuario'";
		
		$result=mysqli_query($conexao,$sql);
		$mostrar=mysqli_fetch_row($result);

		

		$dados=array(
					'id' => $mostrar[0],
					'nome' => $mostrar[1],
					'user' => $mostrar[2],
					'email' => $mostrar[3]
					);

		return $dados;
	}

	public function atualizarUsuarios($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql="UPDATE usuarios set nome='$dados[1]', user='$dados[2]', email='$dados[3]'
			where id='$dados[0]'";

			
       //echo $sql;
				

		return mysqli_query($conexao,$sql);	

		
	}

	public function excluirUsuarios($idusuario){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql="DELETE from usuarios where id='$idusuario'";
		return mysqli_query($conexao,$sql);
	}
}

?>