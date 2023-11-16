<?php
/* Script de conexão ao servidor
de Bancode Dados */
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_giuseppe";

/* Usando a função mysqli_connect para conectar
ao servidor de bancos de dados */

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
/* Definindo o charset da conexão tambem como utf8 */

mysqli_set_charset($conexao, "utf8");
/* Verificação da conexão */

//se NÃO POSSIVEL realizar a conexão
if(!$conexao){
    //PARE a aplicação e mostre uma mensagem de erro 
    die ("Casa caiu pra você". mysqli_connect_error());
} else {
    echo "Beleza, conectado!";
}

?>