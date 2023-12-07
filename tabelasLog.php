<?php
// Dados de conexão ao banco de dados
$host = 'localhost';
$dbname = 'agroetec';
$user = 'root';
$password = '';

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query para criar a tabela de log de sementes, se não existir
    $querySementes = "CREATE TABLE IF NOT EXISTS sementes_log (
        id_log INT AUTO_INCREMENT PRIMARY KEY,
        id_sementes INT NOT NULL,
        acao VARCHAR(50) NOT NULL,
        data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_sementes) REFERENCES sementes (id)
    )";
    $queryClima = "CREATE TABLE IF NOT EXISTS clima_log (
        id_log INT AUTO_INCREMENT PRIMARY KEY,
        id_clima INT NOT NULL,
        acao VARCHAR(50) NOT NULL,
        data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_clima) REFERENCES clima (id)
    )";
    $queryPerdas = "CREATE TABLE IF NOT EXISTS perdas_log (
        id_log INT AUTO_INCREMENT PRIMARY KEY,
        id_perdas INT NOT NULL,
        acao VARCHAR(50) NOT NULL,
        data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_perdas) REFERENCES perdas (id)
        )";
    
    $pdo->exec($querySementes);
    $pdo->exec($queryClima);
    $pdo->exec($queryPerdas);
    

    echo "Tabela log criada com sucesso!";
    // Mensagem de confirmação exibida se a tabela for criada com êxito
} catch (PDOException $e) {
    die("Erro ao criar tabela de log: " . $e->getMessage());
    // Encerra o script e exibe uma mensagem de erro caso ocorra uma exceção
}
