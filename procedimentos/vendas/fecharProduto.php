<?php 

	
	session_start();
	$index=$_POST['ind'];//post da variavel ind que recebe o index da linha que está recebendo o unset
	unset($_SESSION['tabelaComprasTemp'][$index]);
	$dados=array_values($_SESSION['tabelaComprasTemp']);
	unset($_SESSION['tabelaComprasTemp']);
	$_SESSION['tabelaComprasTemp']=$dados;


	

 ?>