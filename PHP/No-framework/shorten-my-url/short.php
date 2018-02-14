<?php
if (!isset($_POST['url']) || empty($_POST['url'])) {
    return;
}

/** @var PDO $pdo */
$pdo  = require_once 'db.php';
$stmt = $pdo->prepare('SELECT id FROM url WHERE short=?');

do {
    $length = rand(4, 6);
    $short  = substr(
        str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length
    );
    $stmt->execute([$short]);
} while ($stmt->rowCount() >= 1);

$stmt = $pdo->prepare('INSERT into url (source, short) VALUES (?, ?)');
$stmt->execute([$_POST['url'], $short]);

echo sprintf('%s/%s', $_SERVER['HTTP_HOST'], $short);