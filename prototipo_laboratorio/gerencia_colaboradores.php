<?php 
include_once('bd/conexao.php');  

if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE FROM colaboradores WHERE id = {$id}";

	$qr = mysqli_query($conexao, $sql);

	$mensagem = 'Excluído com sucesso!';

	header("Location: colaboradores.php?mensagem={$mensagem}&alert=success");
}



 ?>