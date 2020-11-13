<?php
include_once('../bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';

//deletar, salvar, exibir, listar

$metodo = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['id']) && $acao == 'deletar' && $metodo == 'DELETE') {
	$id = $_GET['id'];
	if($id == '' || !is_numeric($id)){
		$data['mensagem'] = 'ID e obrigatório e deve ser numérico';
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql = "DELETE FROM colaboradores WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);

	$data['mensagem'] = 'Dados excluídos com sucesso!';
	$data['alert'] = 'success';
	http_response_code(200);
	echo json_encode($data);
	exit;

}if($acao == 'listar' && $metodo == 'GET'){

	$sql = "SELECT id, nome, cpf, email, telefone FROM colaboradores";
	$qr = mysqli_query($conexao, $sql);
	$colaboradores = mysqli_fetch_all($qr, MYSQLI_ASSOC);

	$data['mensagem'] = 'Dados carregados com sucesso!';
	$data['alert'] = 'success';
	$data['dados'] = $colaboradores;
	http_response_code(200);
	echo json_encode($data);
	exit;
}else if(isset($_GET['id']) && $_GET['acao'] == 'exibir' && $metodo == 'GET'){
	$id = $_GET['id'];
	if( $id == '' || !is_numeric($id)){
		$data['mensagem'] = 'ID é obrigatório e numérico';
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql = "SELECT * FROM colaboradores 
		WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);
	$colaboradores = mysqli_fetch_assoc($qr);
	if($colaboradores == null) {
		$data['mensagem'] = 'Registro não encontrado';
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$data['mensagem'] = 'Dados carregados com sucesso!';
	$data['alert'] = 'success';
	$data['dados'] = $colaboradores;
	http_response_code(200);
	echo json_encode($data);
	exit;

}else if($acao == 'salvar' && $metodo == 'POST'){

	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

	if($_POST['senha'] != '' && $_POST['senha'] != $_POST['confirma_senha']) {
		$data['mensagem'] = "A senha e a confirmação devem ser iguais";
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}else {

		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$cep = $_POST['cep'];
		$logradouro = $_POST['logradouro'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$id = $_POST['id'];


		if($nome == '' || $cpf == '' || $email == '' ) {
			$data['mensagem'] = "Nome, CPF, email e senha são obrigatórios!";
			$data['alert'] = 'danger';
			http_response_code(400);
			echo json_encode($data);
			exit;
		}

	}

	if($id == ''){
		$sql = "INSERT INTO colaboradores 
			(nome, 
			cpf, 
			email, 
			telefone, 
			cep, 
			logradouro, 
			numero, 
			complemento, 
			bairro, 
			cidade, 
			estado, 
			senha) 
			VALUES
			('$nome', '$cpf', '$email', '$telefone', '$cep','$logradouro','$numero', '$complemento', '$bairro', '$cidade', '$estado', '$senha');";
		}else {
			if($_POST['senha'] != '') {
				$string_senha = ", senha = '{$senha}' ";
			} else {
				$string_senha = '';
			}
			$sql = "UPDATE colaboradores SET 
				nome = '{$nome}',
				cpf = '{$cpf}',
				email = '{$email}',
				cep = '{$cep}',
				logradouro = '{$logradouro}',
				numero = '{$numero}' ,
				complemento = '{$complemento}' ,
				bairro = '{$bairro}' ,
				cidade = '{$cidade}',
				estado = '{$estado}'
				{$string_senha}
				WHERE id = {$id};";
		}

	if(mysqli_query($conexao, $sql)) {
		$data['mensagem'] = 'Salvo com sucesso!';
		$data['alert'] = 'success';

		if($id == ''){
			$id = mysqli_insert_id($conexao);
		}

	}else{
		$data['mensagem'] = 'Error ao salvar ' . mysqli_error($conexao);
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql_dados = "SELECT * FROM colaboradores WHERE id = ". $id;
	$qr_dados = mysqli_query($conexao, $sql_dados);
	$colaboradores = mysqli_fetch_assoc($qr_dados);

	$data['dados'] = $colaboradores;
	http_response_code(201);
	echo json_encode($data);
	exit;

}else{
	$data['mensagem'] = 'Método não permitido!';
	$data['alert'] = 'danger';
	http_response_code(405);
	echo json_encode($data);
	exit;
}

?>
