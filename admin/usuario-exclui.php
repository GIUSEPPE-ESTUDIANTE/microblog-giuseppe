<?php
require "../inc/funcoes-usuarios.php";
require "funcoes-sessao.php";
verificaAcesso();

// Verificando se o ursuário pode entrar nesta pagina
verificaTipo();

$id = $_GET['id'];
excluirUsuario($conexao, $id);
header("location:usuarios.php");
