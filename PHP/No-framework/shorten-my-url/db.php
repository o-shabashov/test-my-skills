<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=shorten-my-url', 'root', 'root', [
        PDO::ATTR_PERSISTENT => true,
    ]);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}

return $pdo;