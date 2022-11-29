<?php


session_start();
//para fechar uma sessao, ela deve ser aberta para nao dar erro, caso ela nao esteja
session_destroy();

header("location:../index.php");

?>