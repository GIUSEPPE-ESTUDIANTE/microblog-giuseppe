<?php
require "conecta.php";

function inserirUsuario($conexao, $nome, $email, $senha, $tipo){
    $sql  =  "INSERT INTO usuarios(nome, email, senha, tipo) 
    VALUES('$nome', '$email', '$senha', '$tipo')";

    /* Executando o comando SQL */
 mysqli_query($conexao, $sql) or die(mysqli_error($conexao));}







 function lerUsuarios($conexao){
    // Comando SQL para fazer a leitura de dados (SELECT)
    $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";

    // Execução do comando e armazenamento o resultado da consulta/query
$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

// Retornamos o resultado da query transformado em array associativo
return mysqli_fetch_all($resultado, MYSQLI_ASSOC); 
 }

 function lerUmUsuarios($conexao, $id){
    // Montamos o sql contendo id do usuario que queremos carregar
    $sql = "SELECT * FROM usuarios WHERE id = $id";

    //Executamos e guardamos o resultado da consulta
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retornando o resultado transformado em UM array com os dados
    return mysqli_fetch_assoc($resultado);  
 }
