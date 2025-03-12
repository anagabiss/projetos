<?php { ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Reflorecer</title>
    <link rel="stylesheet" href="../css/styleform.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form method="POST" action="../validar_forms/validar_form_cadastro.php">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="<?php if(isset($_POST['data_nascimento'])) echo $_POST['data_nascimento']; ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>" required>

            <button type="submit" name="enviar">Cadastrar</button>
        </form>
    </div>
</body>
</html>
<?php } ?>
