<!DOCTYPE html>
<html>

<head>
    <title>Cadastro Cliente</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
</head>

<body>

    <div class="login-container">

        <h2>Criar Conta Cliente</h2>

        <form method="POST" action="<?= BASE_URL ?>/register/storeCliente">

            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="apelido" placeholder="Apelido" required>
            <input type="text" name="bi" placeholder="BI" required>
            <input type="text" name="telefone" placeholder="Telefone" required>
            <input type="text" name="morada" placeholder="Morada" required>
            <input type="number" name="ano_nascimento" placeholder="Ano nascimento" required>

            <input type="password" name="password" placeholder="Senha" required>
            <input type="password" name="confirm_password" placeholder="Confirmar senha" required>

            <button type="submit">Cadastrar</button>

        </form>

    </div>

</body>

</html>