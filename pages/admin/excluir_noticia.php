<?php
require '../../config/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

try {

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM noticias WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        header("Location: /praticainternet/admin");
        exit;
    } else {
        echo "ID inválido.";
        exit;
    }
} catch (PDOException $e) {
    echo "Erro ao excluir a notícia: " . $e->getMessage();
}
?>