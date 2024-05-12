<?php

class clientes{


	public function registrarCliente($dados){

		$c = new conectar();
		//acessando o metodo conexao
		$conexao = $c->conexao();

		//recebe o formato da data
		$data = date('Y-m-d');

		$sql = "INSERT INTO clientes (nome, sobrenome, endereco, email, telefone, cpf) VALUES ('$dados[1]', '$dados[2], '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]' )";//a data está fora do array

		return mysqli_query($conexao, $sql);


	}

	public function loginCliente($dados){

		$c = new conectar();
		$conexao = $c->conexao();

		//está criptografando o valor da senha que está no indice 1
		$senha = sha1($dados[1]);

		//selciona do usuario o email e a senha que for igual ao email e senha digitados no formulario
		//o campo email está sendo comparado com com o valor de email que está no indice 0 em login
		$sql = "SELECT * FROM clientes WHERE email = '$dados[0]'and senha = '$senha'";


		//sessao serve para ver o tipo de usuario que está acessando e tambem o tempo que o usuario fica logado
		$_SESSION['usuario2'] = $dados[0];//no caso a session usuario está recebendo o valor do campo nome que está no idince 0
		$_SESSION['iduser2'] = self::trazerId($dados);//self indica que uma funcao está na mesma classe
	
		
		
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
		$sql = "SELECT id_cliente FROM clientes where email = '$dados[0]' and senha = '$senha'";
		

		$result = mysqli_query($conexao, $sql);
		
		
		return mysqli_fetch_row($result)[0];//ele busca o que está no index 0
	}

	


	public function obterDadosCliente($idcliente){ //pega os valores para serem editados nos campos
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "SELECT id_cliente, nome, sobrenome, endereco, email, telefone, cpf FROM clientes WHERE id_cliente = '$idcliente'";
		
		$result = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($result);

		//os campos do modal estão rebendo os valores que estão banco para serem editados
		$dados = array(
			'id_cliente'=>$mostrar[0],
			'nome'=>$mostrar[1],
			'sobrenome'=>$mostrar[2],
			'endereco'=>$mostrar[3],
			'email'=>$mostrar[4],
			'telefone'=>$mostrar[5],
			'cpf'=>$mostrar[6],


		);

		return $dados;

	}

	public function atualizarCliente($dados){

		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "UPDATE clientes SET nome = '$dados[1]', sobrenome = '$dados[2]', 
		endereco = '$dados[3]', email = '$dados[4]', telefone = '$dados[5]', cpf = '$dados[6]'
		WHERE id_cliente = '$dados[0]'";

		echo mysqli_query($conexao, $sql);
	}

	public function excluirCliente($id){
		$c = new conectar();
		$conexao=$c->conexao();
		

		$sql = "DELETE FROM clientes WHERE id_cliente = '$id' ";

		return mysqli_query($conexao, $sql);
	}
}

?>