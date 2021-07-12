<?php
header('Content-Type: application/json');

$pdo = new PDO('mysql:host=localhost; dbname=bd-comment-video', 'root', '');

$GetComments = $pdo->prepare('SELECT * FROM  comments ORDER BY id DESC');
$GetComments->execute();

if ($GetComments->rowCount() >= 1) {
    echo json_encode($GetComments->fetchAll(PDO::FETCH_ASSOC));
} else {
    echo json_encode('Nenhum comentário encontrado');
}
