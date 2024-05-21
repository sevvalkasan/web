<?php
session_start(); 

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminUsername = $_POST['adminUsername'] ?? '';
    $adminPassword = $_POST['adminPassword'] ?? '';

    try {
        $sql = "SELECT * FROM admins WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $adminUsername);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && $adminPassword === $admin['password']) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: adminpanel.php");
            exit;
        } else {
            echo "Hatalı admin kullanıcı adı veya şifre.";
        }
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}
?>
