<?php
require "../inc/funcoes-sessao.php";
require "../inc/funcoes-noticias-legal.php";

verificaAcesso();

$idNoticia = $_GET ['id'];

$tipoUsuario = $_SESSION['tipo'];

$idUsuario = $_SESSION ['id'];

excluirNoticia(
    $conexao, $idNoticia, $idUsuario , $tipoUsuario
);


    header("location:noticias.php");