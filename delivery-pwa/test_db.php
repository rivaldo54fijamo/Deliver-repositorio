<?php

require_once "config/app.php";
require_once "config/database.php";

require_once "app/Core/Database.php";

use App\Core\Database;

// Tenta conectar ao banco
try {
    $db = Database::getInstance()->getConnection();

    echo "<h2 style='color:green;'>✔ Conexão com banco de dados bem-sucedida!</h2>";
    echo "<p>O sistema está corretamente ligado ao MySQL.</p>";
} catch (Exception $e) {

    echo "<h2 style='color:red;'>✖ Erro na conexão com banco de dados</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
}
