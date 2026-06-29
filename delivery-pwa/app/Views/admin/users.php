<!DOCTYPE html>
<html>

<head>
    <title>Utilizadores</title>
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

        <h2>Gestão de Utilizadores</h2>

        <table border="1" width="100%">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Role</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>

            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= $u['nome'] ?></td>
                    <td><?= $u['role'] ?></td>
                    <td><?= $u['status'] ?></td>
                    <td>
                        <button onclick="blockUser(<?= $u['id'] ?>)">Bloquear</button>
                        <button onclick="unblockUser(<?= $u['id'] ?>)">Desbloquear</button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>

    <script>
        function blockUser(id) {
            fetch("/delivery-pwa/admin/block", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + id
            }).then(() => location.reload());
        }

        function unblockUser(id) {
            fetch("/delivery-pwa/admin/unblock", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + id
            }).then(() => location.reload());
        }
    </script>

</body>

</html>