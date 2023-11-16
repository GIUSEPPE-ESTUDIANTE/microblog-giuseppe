<?php
require "conecta.php";

function inserirUsuario($conexao, $nome, $email, $senha, $tipo){
    $sql  =  "INSERT INTO usuarios(nome, email, senha, tipo) 
    VALUES('$nome', '$email', '$senha', '$tipo')";

    /* Executando o comando SQL */
 mysqli_query($conexao, $sql) or die(mysqli_error($conexao));}