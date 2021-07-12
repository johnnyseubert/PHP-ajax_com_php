<?php
header('Content-Type: application/json');

$nome = $_POST['name'];
$comentario = $_POST['comment'];

$pdo = new PDO('mysql:host=localhost; dbname=bd-comment-video', 'root', '');

$InsertOnComments = $pdo->prepare('INSERT INTO comments (name, comment) VALUES (:nome, :comentario)');
$InsertOnComments->bindValue(':nome', $nome);
$InsertOnComments->bindValue(':comentario', $comentario);
$InsertOnComments->execute();


if ($InsertOnComments->rowCount() >= 1) {
    echo json_encode('Comentário salvo com sucesso');
} else {
    echo json_encode('Falha ao salvar comentário');
}
