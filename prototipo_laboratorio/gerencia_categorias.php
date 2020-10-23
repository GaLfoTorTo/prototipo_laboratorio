<?php 
include_once('bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';

//deletar, salvar, alterar

if(isset($_GET['id']) && $acao == 'deletar') {
	$id = $_GET['id'];

	$sql = "DELETE FROM categoria WHERE id = {$id}";

	$qr = mysqli_query($conexao, $sql);

	$mensagem = 'Excluído com sucesso!';

	header("Location: categorias.php?mensagem={$mensagem}&alert=success");
}else if($acao == 'salvar'){
	$categoria = $_POST['categoria'];

	$sql = "INSERT INTO categoria (categoria) VALUES ('$categoria);";

	mysql_query($conexao, $sql);

	$mensagem = 'salvo com sucessso';

	header('location: categoria.php?mensagem={$mensagem}alert=success') 
}

?>