<?php

	$erro = false;
//Recebe os dados do formulário
	if (count($_POST) > 0) {
		$nome = $_POST['nome'];
		$cpf = $_POST["cpf"];
		$rg = $_POST["rg"];
		$genero = $_POST["genero"]; 
        $cor_raca = $_POST["cor_raca"];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$confirmar_senha = $_POST['confirmar_senha'];
		$data_nascimento = $_POST['data_nascimento'];
		$naturalidade = $_POST["naturalidade"]; 	
		$nacionalidade = $_POST["nacionalidade"]; 
		$endereco = $_POST["endereco"];
		$uf = $_POST["uf"]; 
		$cidade = $_POST["cidade"]; 
		$bairro = $_POST["bairro"]; 
		$tipo_violencia = $_POST["tipo_violencia"];
		$telefone = $_POST['telefone'];

		if (isset($_POST['enviar'])) {
			// Validação dos campos obrigatórios
			if (empty($nome) || strlen($nome) < 2 || strlen($nome) > 100) {
				$mensagemErro .= '⚠️ O campo Nome deverá ter entre 2 e 100 caracteres.<br>';
			}

			 if (empty($_POST['cpf'])|| strlen($_POST['cpf']) < 2 || strlen($_POST['cpf']) > 15) {
				$errro = '<p class = "erro">  ⚠️ Preencha o campo RG, ou insira os números corretamente.</p>';
			}
			if (empty($_POST['rg'])|| strlen($_POST['rg']) < 2 || strlen($_POST['rg']) > 11) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo cpf, ou insira os números corretamente.</p>';
			}
		
			if (empty($_POST['data_nascimento'])) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo Data de Nascimento.</p>';
				die();
			}
		
			if (empty($_POST['genero'])) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo genero.</p>';
				die();
			}
			if (empty($_POST['cor_raca'])|| strlen($_POST['cor_raca']) < 2 || strlen($_POST['cor_raca']) > 20) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo cor_raca.</p>';
				die();
			}
			if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$mensagemErro .= '⚠️ Preencha o campo E-mail com um e-mail válido (ex: nome@dominio.com), ou insira corretamente.<br>';
			}
			if (empty($senha) || strlen($senha) < 6) {
				$mensagemErro .= '⚠️ A senha deve ter pelo menos 6 caracteres.<br>';
			}
			if ($senha !== $confirmar_senha) {
				$mensagemErro .= '⚠️ A confirmação de senha não corresponde à senha informada.<br>';
			}if (empty($_POST['nascionalidade'])) {
				$errro = '<p class = "erro"> Preencha o campo nascionalidade.</p>';
				die();
			}
			if (empty($_POST['naturalidade'])) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo naturalidade.</p>';
				die();
			}
			if (empty($_POST['endereco'])|| strlen($_POST['endereco']) < 2 || strlen($_POST['endereco']) > 250) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo endereco, ou insira o endereço corretamente.</p>';
				die();
			}
			if (empty($_POST['uf'])|| strlen($_POST['uf']) < 2 || strlen($_POST['uf']) > 20) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo uf.</p>';
				die();
			}
			if (empty($_POST['cidade'])|| strlen($_POST['cidade']) < 2 || strlen($_POST['cidade']) > 50) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo cidade.</p>';
				die();
			}
			if (empty($_POST['bairro'])|| strlen($_POST['bairro']) < 2 || strlen($_POST['bairro']) > 20) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo bairro.</p>';
				die();
			}
			if (empty($_POST['tipo_violencia']) || strlen($_POST['nome']) < 2 || strlen($_POST['tipo_violencia']) > 250) {
				$errro = '<p class = "erro"> ⚠️ Preencha o campo Tipo de Violência.</p>';
				die();
			}
			$currentYear = date("Y");
			$birthYear = (int)date("Y", strtotime($data_nascimento));
			if (empty($data_nascimento) || $birthYear < 1900 || $birthYear > $currentYear) {
				$mensagemErro .= '⚠️ A data de nascimento deve estar entre 1900 e o ano atual.<br>';
			}
			if (empty($telefone) || !is_numeric($telefone)) {
				$mensagemErro .= '⚠️ O campo Telefone deve conter apenas números.<br>';
			}
			 //Verificação da política de privacidade
			 if (isset($_POST['termos'])) {
				// O usuário aceitou os termos, pode continuar com o cadastro
			} else {
		
				echo "É necessário aceitar os Termos de Política de Privacidade para se cadastrar.";
		
				exit; //Para impedir que o restante do código seja executado
			}
			// Verifica se houve algum erro
			if (!empty($mensagemErro)) {
				echo '<div style="color: red;">'.$mensagemErro.'</div>';
				$erro = true;
			} else {
				include_once('../conexao/conexao.php');
				$codInsertaluno = "INSERT INTO tbl_usuarios (nome, cpf, rg, genero, cor_raca, email, senha, confirmar_senha, data_nascimento, naturalidade, nacionalidade, endereco, uf, cidade, bairro, tipo_violencia, telefone) VALUES ('$nome','$cpf','$rg','$genero','$cor_raca','$email', '$senha','$confirmar_senha', '$data_nascimento','$nacionalidade','$endereco','$bairro','$tipo_violencia',  '$telefone')";
				$correto = $mysqli->query($codInsertaluno) || die($mysqli->error);
				if($correto) {
					echo '<div style="color: green;">✅ Usuário cadastrado corretamente!</div>';
					unset($_POST);
				}
			}
		}
	}
?>
