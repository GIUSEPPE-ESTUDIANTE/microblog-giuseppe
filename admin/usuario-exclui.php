<?php
require "../inc/funcoes-usuarios.php";
require "funcoes-sessao.php";
verificaAcesso();

$id = $_GET['id'];
excluirUsuario($conexao, $id);
header("location:usuarios.php");
