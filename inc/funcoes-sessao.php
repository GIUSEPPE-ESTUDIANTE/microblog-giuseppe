<?php
/* Sessões no PHP
Recurso usado para o controle de acesso
á determinadas páginas e/ou recursos do site

Exemplos: área adminstrativa, painel de controle, área de
cliente/aluno etc.

Nestas áreas o acesso só é possivel mediante alguma forma
de autentição. Exemplos: login/senha, digital, facial etc*/

/* Verificar se ja NÃO EXISTE uma sessão em funcionamento */
if( !isset($_SESSION)){
    //Então inicie uma sessão
    session_start();

}

function verificaAcesso(){
    if (!isset($_SESSION['id'])){
        /* Portanto, destrua os dados de sessão,
        redirecione para a pagina login.php e pare o script*/
        session_destroy();
        header("location:../login.php?acesso_negado");
        exit; /* ou die */
    }


}


function login($id, $nome, $tipo){
    /* Criação de variaveis de sessão
    Recursos que ficam disponíveis para uso durante
    toda a duração da sessão, ou seja, enquanto o 
    navegador não for fechado ou o usuario não clicar
    em Sair. */
    $_SESSION["id"] = $id;
    $_SESSION["nome"] = $nome;
    $_SESSION["tipo"] = $tipo;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    exit; // ou die()
}