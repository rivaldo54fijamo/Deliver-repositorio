CREATE DATABASE IF NOT EXISTS delivery_pwa;
USE delivery_pwa;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NULL,
    nome VARCHAR(100) NOT NULL,
    apelido VARCHAR(100) NOT NULL,
    bi VARCHAR(20) UNIQUE NULL,
    telefone VARCHAR(20) NOT NULL,
    morada TEXT NULL,
    ano_nascimento INT NULL,
    email VARCHAR(100) NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('super_admin','admin','motorista','cliente') DEFAULT 'cliente',
    status ENUM('ativo','bloqueado') DEFAULT 'ativo',
online TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    motorista_id INT NULL,

    origem_lat DECIMAL(10,8),
    origem_lng DECIMAL(11,8),
    destino_lat DECIMAL(10,8),
    destino_lng DECIMAL(11,8),

    distancia_km DECIMAL(10,2),
    valor DECIMAL(10,2),

    status ENUM(
        'aguardando_motorista',
        'aceite',
        'recolhido',
        'entregue',
        'cancelado'
    ) DEFAULT 'aguardando_motorista',

    telefone_receptor VARCHAR(20),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (cliente_id) REFERENCES users(id),
    FOREIGN KEY (motorista_id) REFERENCES users(id)
);
CREATE TABLE tracking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    motorista_id INT NOT NULL,
    pedido_id INT NULL,
    lat DECIMAL(10,8),
    lng DECIMAL(11,8),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (motorista_id) REFERENCES users(id),
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id)
);

CREATE TABLE notificacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    mensagem TEXT,
    lida TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE configuracoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chave VARCHAR(100) UNIQUE,
    valor TEXT
);
INSERT INTO users (
    username,
    nome,
    apelido,
    telefone,
    password,
    role,
    status
)


INSERT INTO users (
    username,
    nome,
    apelido,
    telefone,
    password,
    role,
    status
)
SELECT
    'Super',
    'Super',
    'Admin',
    '000000000',
    -- senha: Super9 (hash)
    '$2y$10$8Q1Qw8h2b0h3kQm0c9fF8eFv1c9vQmZQ8vQmQmQmQmQmQmQmQmQm',
    'super_admin',
    'ativo'
WHERE NOT EXISTS (
    SELECT id FROM users WHERE username = 'Super'
);

INSERT INTO configuracoes (chave, valor)
VALUES ('sistema_status', 'online');



