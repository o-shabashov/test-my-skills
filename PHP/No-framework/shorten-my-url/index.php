<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/') {
    return require_once 'index.html';
}

/** @var PDO $pdo */
$pdo = require_once 'db.php';

$stmt = $pdo->prepare('SELECT source FROM url WHERE short=?');
$stmt->execute([str_replace('/', '', $path)]);

if ($redirect = $stmt->fetchColumn()) {
    header("Location: $redirect");
    die();
}

return require_once '404.html';