<!DOCTYPE html>
<html>

<head>
    <title>Motorista</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
</head>

<body>

    <div class="sidebar">
        <h3>Motorista</h3>

        <button onclick="ficarOnline()">Online</button>
        <button onclick="ficarOffline()">Offline</button>

        <a href="<?= BASE_URL ?>/auth/logout">Sair</a>
    </div>

    <div class="main">

        <h2>Pedidos disponíveis</h2>

        <div id="pedidos"></div>

    </div>

    <script src="<?= BASE_URL ?>/public/js/motorista.js"></script>

</body>

</html>