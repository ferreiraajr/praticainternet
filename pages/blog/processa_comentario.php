<?php
require '../../config/db.php';

$nome = $_POST['nome'];
$comentario = $_POST['comentario'];
$noticia_id = $_POST['noticia_id'];

try {
    $stmt = $conn->prepare("INSERT INTO comentarios (noticia_id, nome, comentario, data_comentario) VALUES (:noticia_id, :nome, :comentario, NOW())");
    $stmt->execute(['noticia_id' => $noticia_id, 'nome' => $nome, 'comentario' => $comentario]);

    
    header("Location: /praticainternet/blog/" . $noticia_id);
    exit;
} catch (PDOException $e) {
    echo "Erro ao cadastrar comentário: " . $e->getMessage();
}
?>