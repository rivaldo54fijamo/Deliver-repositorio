<!DOCTYPE html>
<html>

<head>
    <title>Painel Cliente</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map {
            height: 400px;
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .box {
            background: #fff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h3>Cliente</h3>
        <a href="#">Início</a>
        <a href="#">Histórico</a>
        <a href="<?= BASE_URL ?>/auth/logout">Sair</a>
    </div>

    <div class="main">

        <h2>Solicitar Entrega</h2>

        <div id="map"></div>

        <div class="box">
            <p><b>Distância:</b> <span id="distancia">0</span> km</p>
            <p><b>Preço:</b> <span id="preco">0</span> MT</p>
        </div>

        <button onclick="confirmarPedido()">Confirmar Pedido</button>

    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="<?= BASE_URL ?>/public/js/map.js"></script>

</body>

</html>