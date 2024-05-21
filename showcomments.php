<?php
include 'config.php';

try {
    $sql = "SELECT * FROM yorumlar WHERE destinasyon_id = 1"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $yorumlar = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>