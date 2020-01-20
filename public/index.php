<?php

try {
    $pdo = new PDO(
        'mysql:host=mysql;dbname=test', 'root', 'root',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $exception) {
    echo $exception->getTraceAsString();
}

$names = ["Peĺicula 3D", "Película de vidro", "Capa anti-impacto", "Caderno", "Chips", "Cartão de memória", "Caneta"];
foreach ($names as $name) {
    $stmt = $pdo->prepare("INSERT INTO products (name) VALUES (':name')");
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

$total = 3 * 6;

echo "Total {$total}";