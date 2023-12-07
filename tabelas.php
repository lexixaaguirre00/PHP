<?php
$host = 'localhost'; 
$dbname = 'agroetec'; 
$user = 'root';
$password = ''; 

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqli_agro = "CREATE TABLE IF NOT EXISTS sementes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tipo VARCHAR (100) NOT NULL,
        quantidade INT (100) NOT NULL,
        fornecedor VARCHAR (100) NOT NULL,
       data_plantio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS clima (
        id INT AUTO_INCREMENT PRIMARY KEY,
        data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        temperatura DECIMAL (10,2) NOT NULL,
        umidade INT (100) NOT NULL,
        descriçao VARCHAR(100) NOT NULL
    );
    CREATE TABLE IF NOT EXISTS perdas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tipo_perda VARCHAR (100) NOT NULL,
        quantidade INT (100) NOT NULL,
        causa VARCHAR (100) NOT NULL,
       data_perda TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sqli_agro);

    echo "Tabelas criadas com sucesso!";
} catch(PDOException $e) {
   
    die("Erro ao criar tabelas: " . $e->getMessage());
}
?>