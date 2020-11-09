<?php
session_start(); 
include_once('bd/conexao.php');

if((!isset($_POST['email']) && $_POST['email'] != '') 
	|| (!isset($_POST['senha'])) && $_POST['senha'] != '') {
	$data['mensagem'] = 'Email e senha são obrigatórios.';
    $data['alert'] = 'danger';
	http_response_code(400);
	echo json_encode($data);
	exit;
}

$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT id, nome, email, senha, cpf 
		FROM colaboradores 
		WHERE email = '{$email}'";

$qr = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($qr);

$tentativa = 0;

for($i = 0; $i < 3; $i+=1) {

	if($tentativa != 3){

		if($usuario == null) {
			$data['mensagem'] = 'Usuário não econtrado, verifique o email ou senha.';
		    $data['alert'] = 'danger';
			http_response_code(401);
			echo json_encode($data);
			$tentativa+= 1;
			exit;
		}

		if (password_verify($senha, $usuario['senha'])) {
		    $data['mensagem'] = 'Usuário logado com sucesso, aguarde redirecionamento.';
		    $data['alert'] = 'success';

		    
		    $_SESSION['id_usuario'] = $usuario['id'];
		    $_SESSION['nome'] = $usuario['nome'];
		    $_SESSION['cpf'] = $usuario['cpf'];
		    $_SESSION['email'] = $usuario['email'];

		    http_response_code(200);
			echo json_encode($data);
			break;
			exit;

		} else {
		    $data['mensagem'] = 'Usuário ou senha incorretos.';
		    $data['alert'] = 'danger';
			http_response_code(401);
			echo json_encode($data);
			$tentativa+= 1;
			exit;
		}

	}else {
		$data['mensagem'] = 'Você excedeu o limite de tentativas, tente novamente mais tarde.';
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}
}

?>