<?php
require "conecta.php";

/* Usada em noticia-insere.php */
function inserirNoticia(
    $conexao,
    $titulo,
    $texto,
    $resumo,
    $nomeimagem,
    $usuarioId
) {

    $sql = "INSERT INTO noticias(
        titulo, texto, resumo, imagem, usuario_id
    ) VALUES (
    '$titulo', '$texto', '$resumo', 
    '$nomeimagem', $usuarioId 
    )";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim inserirNoticia


/* Usada em noticia-insere.php e noticia-atualiza.php */
function upload($arquivo)
{
    /* VALIDAÇÃO BACK-END */

    // Lista de formatos suportados pelo site 
    // (precisa ser igual ao que esta no HTML)
    $tiposValidos = [
        "image/png", "image/jpeg",
        "image/gif", "image/svg+xml"
    ];

    //Verificando se o tipo do arquivo NÃO É dos suportados
    if (!in_array($arquivo['type'], $tiposValidos)) {
        echo "<script>
        alert('Formato inavalino!'); history.back();
        </script>";
        exit;
    }


    // Obtendo apenas o nome/extensão do arquivo
    $nome = $arquivo['name'];

    // Obtendo informações de acesso temporario
    $temporario = $arquivo['tmp_name'];

    // Definindo para onde a imagem vai e com qual nome
    $destino = "../imagens/" . $nome;

    // Movendo o arquivo da area temporaria para a pasta final
    move_uploaded_file($temporario, $destino);
} // fim upload


/* Usada em noticias.php */
function lerNoticias($conexao, $idUsuario, $tipoUsuario)
{
    /* Verificando se o tipo de usuário é admin */
    if ($tipoUsuario == 'admin') {
        //SQL DP admin: pode carregar/ver TUDO de todos
        $sql = "SELECT
                    noticias.id,
                    noticias.titulo,
                    noticias.data,
                    usuarios.nome AS autor
                    FROM noticias JOIN usuarios
                    ON noticias.usuario_id = usuarios.id
                    ORDER BY DATA DESC";
    } else {
        /* SQL do editor: pode carregar/ver TUDO DELE SOMENTE */
        $sql = "SELECT id, titulo, data FROM noticias
                WHERE usuario_id = $idUsuario ORDER BY data DESC";
    }

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retornando o resultado convertido em uma matriz/array
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
} // fim lerNoticias


/* Usada em noticias.php e páginas da área pública */
function formataData()
{
} // fim formataData


/* Usada em noticia-atualiza.php */
function lerUmaNoticia(
    $conexao,
    $idNoticia,
    $idUsuario,
    $tipoUsuario
) {


    if ($tipoUsuario == "admin") {
        $sql = "SELECT * FROM noticias WHERE id = $idNoticia";
    } else {
        /* Pode carregar dados de qualquer noticia
        DELE [EDITOR] APENAS */
        $sql = "SELECT * FROM noticias
        WHERE id = $idNoticia
        AND usuario_id = $idUsuario";
    } {


        // Executando o comando SQL e guardando o resultado
        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        //Retornando UM ÚNICO array com os dados da noticia
        return mysqli_fetch_assoc($resultado);
    } // fim lerUmaNoticia
}

/* Usada em noticia-atualiza.php */
function atualizarNoticia(
    $conexao,
    $titulo,
    $texto,
    $resumo,
    $imagem,
    $idNoticia,
    $idUsuario,
    $tipoUsuario
) {

    if ($tipoUsuario == 'admin') {
        // SQL do admin: pode atualizar QUALQUER noticia
        $sql = "UPDATE noticias SET
                    titulo = '$titulo', texto = '$texto',
                    resumo = '$resumo', imagem = '$imagem'
                WHERE id = $idNoticia";
    } else {
        // SQL do editor: pode atualizar SOMENTE AS DELE

        $sql = "UPDATE noticias SET
                    titulo = '$titulo', texto = '$texto',
                    resumo = '$resumo', imagem = '$imagem'
                WHERE id = $idNoticia
                AND usuario_id = $idUsuario";
    }


    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim atualizarNoticia


/* Usada em noticia-exclui.php */
function excluirNoticia($conexao, $idnoticia, $idUsuario, $tipoUsuario)
{
if($tipoUsuario == 'admin') {
    $sql = "DELETE FROM noticias
            WHERE  id = $idnoticia";
} else { 
    $sql = "DELETE FROM noticias
     WHERE  id = $idnoticia
     AND usuario_id = $idUsuario";
    
}

mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim excluirNoticia



/* ******************************************************* */


/* Funções usadas nas páginas da área pública */

/* Usada em index.php */
function lerTodasAsNoticias($conexao)
{ $sql = "SELECT titulo, resumo, imagem, id
    FROM noticias ORDER BY DATA DESC";



     $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

     return mysqli_fetch_all($resultado, MYSQLI_ASSOC);



} // fim lerTodasAsNoticias


/* Usada em noticia.php */
function lerDetalhes($conexao)
{


    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim lerDetalhes


/* Usada em resultados.php */
function busca($conexao)
{

    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim busca
