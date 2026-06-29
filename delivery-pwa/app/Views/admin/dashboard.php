<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
</head>

<body>

    <div class="sidebar">
        <h3>Admin</h3>

        <a href="<?= BASE_URL ?>/admin">Dashboard</a>
        <a href="<?= BASE_URL ?>/admin/users">Utilizadores</a>
        <a href="<?= BASE_URL ?>/auth/logout">Sair</a>
    </div>

    <div class="main">

        <h2>Estatísticas</h2>

        <div class="box">
            <p>Clientes: <?= $stats['clientes'] ?></p>
            <p>Motoristas: <?= $stats['motoristas'] ?></p>
            <p>Pedidos: <?= $stats['pedidos'] ?></p>
            <p>Entregues: <?= $stats['entregues'] ?></p>
        </div>

    </div>
    <canvas id="graficoPedidos"></canvas>
</body>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= BASE_URL ?>/public/js/dashboard_stats.js"></script>

</html>