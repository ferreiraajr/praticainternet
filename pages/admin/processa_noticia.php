<?php
require '../../config/db.php';

$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];

try {

    $stmt = $conn->prepare("INSERT INTO noticias (titulo, conteudo, data_publicacao) VALUES (:titulo, :conteudo, NOW())");
    $stmt->execute(['titulo' => $titulo, 'conteudo' => $conteudo]);

    header("Location: /praticainternet/admin");
    exit;
} catch (PDOException $e) {
    echo "Erro ao cadastrar notícia: " . $e->getMessage();
}
?>