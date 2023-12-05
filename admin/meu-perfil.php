<?php //usuario-atualiza.php
require_once "../inc/funcoes-usuarios.php";
require_once "../inc/cabecalho-admin.php";


// Verificando se o ursuário pode entrar nesta pagina
verificaTipo();

//Pegando o valor do parãmetro id vindo da URL
$id = $_SESSION['id'];

//Chamando a função e guardando o retorno dela
 $usuario = lerUmUsuarios($conexao, $id);


//Verificando se o formulario foi acionado
if(isset($_POST['atualizar'])){
	//Capturando os dados
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$tipo = $_SESSION['tipo'];//mantendo o tipo

	/* Logica para a senha 
	Se o campo senha estiver vazio OU se a senha digitada
	for igual á senha que ja existe no banco de dados, então
	significa que o usuario NÃO ALTEROU A SENHA. Portanto,
	devemoa MANTER A senha existente. */
	if( empty($_POST['senha']) ||
	password_verify ($_POST['senha'], $usuario['senha'])){

		$senha = $usuario['senha']; // mantemos a mesma
	}

	/* Caso contrario, pegaremos a senha nova digitada 
	e a CODIFICAMOS antes de mandar para o banco. */
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

	// Chamamos a função e passamos os dados
	atualizarUsuario($conexao, $id , $nome, $email, $senha, $tipo);

	// Atualize na sessão atual o nome da pessoa (caso mude)
	$_SESSION["nome"] = $nome;

	// Redirecimentos para pagina de usuarios
	header("location:index.php");
}


?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar meus dados
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input value="<?=$usuario['nome']?>" class="form-control" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input value="<?=$usuario['email']?>" class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
				<input value="" class ="form-control" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input value="" class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

