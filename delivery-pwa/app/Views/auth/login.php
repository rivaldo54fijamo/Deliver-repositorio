<!DOCTYPE html>
<html>

<head>
    <title>Login - Delivery PWA</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">

    <!-- PWA MANIFEST -->
    <link rel="manifest" href="<?= BASE_URL ?>/pwa/manifest.json">

    <!-- META PWA -->
    <meta name="theme-color" content="#2d89ef">


</head>

<body>

    <div class="login-container">

        <h2>Entrar no Sistema</h2>

        <form method="POST" action="<?= BASE_URL ?>/auth/authenticate">
            <input type="hidden" name="csrf_token" value="<?= $csrf ?>">

            <input type="text" name="username" placeholder="Usuário" required>

            <input type="password" name="password" placeholder="Senha" required>

            <button type="submit">Entrar</button>

        </form>

    </div>

    <!-- SERVICE WORKER REGISTRATION -->
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/delivery-pwa/pwa/service-worker.js')
                .then(function() {
                    console.log("Service Worker registrado com sucesso");
                })
                .catch(function(error) {
                    console.log("Erro ao registrar Service Worker:", error);
                });
        }
    </script>

</body>

</html>