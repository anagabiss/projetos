<?php

	$erro = false;

	if (count($_POST) > 0) {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$confirmar_senha = $_POST['confirmar_senha'];
		$data_nascimento = $_POST['data_nascimento'];
		$telefone = $_POST['telefone'];

		if (isset($_POST['enviar'])) {
			// Validação dos campos obrigatórios
			if (empty($nome) || strlen($nome) < 2 || strlen($nome) > 100) {
				$mensagemErro .= '⚠️ O campo Nome deverá ter entre 2 e 100 caracteres.<br>';
			}
			if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$mensagemErro .= '⚠️ Preencha o campo E-mail com um e-mail válido (ex: nome@dominio.com).<br>';
			}
			if (empty($senha) || strlen($senha) < 6) {
				$mensagemErro .= '⚠️ A senha deve ter pelo menos 6 caracteres.<br>';
			}
			if ($senha !== $confirmar_senha) {
				$mensagemErro .= '⚠️ A confirmação de senha não corresponde à senha informada.<br>';
			}
			$currentYear = date("Y");
			$birthYear = (int)date("Y", strtotime($data_nascimento));
			if (empty($data_nascimento) || $birthYear < 1900 || $birthYear > $currentYear) {
				$mensagemErro .= '⚠️ A data de nascimento deve estar entre 1900 e o ano atual.<br>';
			}
			if (empty($telefone) || !is_numeric($telefone)) {
				$mensagemErro .= '⚠️ O campo Telefone deve conter apenas números.<br>';
			}

			// Verifica se houve algum erro
			if (!empty($mensagemErro)) {
				echo '<div style="color: red;">'.$mensagemErro.'</div>';
				$erro = true;
			} else {
				include_once('../conexao/conexao.php');
				$codInsertaluno = "INSERT INTO tbl_usuarios (nome, email, senha, data_nascimento, telefone) VALUES ('$nome', '$email', '$senha', '$data_nascimento', '$telefone')";
				$correto = $mysqli->query($codInsertaluno) || die($mysqli->error);
				if($correto) {
					echo '<div style="color: green;">✅ Usuário cadastrado corretamente!</div>';
					unset($_POST);
				}
			}
		}
	}
?>
