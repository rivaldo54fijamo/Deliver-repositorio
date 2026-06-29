<?php

require_once "config/app.php";
require_once "config/database.php";

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    $file = __DIR__ . "/app/" . $class . ".php";

    if (file_exists($file)) {
        require_once $file;
    }
});
$status = $db->query("SELECT valor FROM configuracoes WHERE chave='sistema_status'")
    ->fetchColumn();

if ($status === "offline") {
    die("Sistema temporariamente fora de serviço. Tente novamente mais tarde.");
}

use App\Core\App;

$app = new App();
