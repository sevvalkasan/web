<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['registerUsername'] ?? '';
    $email = $_POST['registerEmail'] ?? '';
    $phone = $_POST['registerPhone'] ?? '';
    $password = $_POST['registerPassword'] ?? '';

    try {
        $sql = "INSERT INTO users (username, email, phone, password) VALUES (:username, :email, :phone, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Üye kaydı başarıyla oluşturuldu.";
        } else {
            echo "Üye kaydı oluşturulurken bir hata oluştu.";
        }
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aramıza Hoşgeldin! | Seyahat Acentesine Katıl</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
        }
        .welcome-text {
            margin-bottom: 30px;
            text-align: center;
        }
        .carousel-item {
            text-align: center;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px;
        }
        .carousel-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-text">
            <h1>Aramıza Hoşgeldin!</h1>
            <p>Seyahat acentemize katılarak harika ayrıcalıklardan faydalanabilirsin. Hem seyahat etmek daha keyifli hale gelecek hem de özel fırsatlarla daha ekonomik tatiller yapabileceksin.</p>
        </div>
        <!-- Carousel -->
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="img/thy_logo.png" alt="THY Logo">
                <h4>Anlaşmalı Şirket: THY</h4>
                <p>THY ile yapacağınız bilet alımlarında %20 indirim fırsatını kaçırmayın!</p>
            </div>
            <div class="item">
                <img src="img/burger_king_logo.png" alt="Burger King Logo">
                <h4>Anlaşmalı Şirket: Burger King</h4>
                <p>Burger King restoranlarında geçerli %15 indirim kodu: BKIND15</p>
            </div>
            <div class="item">
                <img src="img/hilton_logo.png" alt="Hilton Logo">
                <h4>Anlaşmalı Şirket: Hilton Otelleri</h4>
                <p>Hilton otellerinde konaklamalarda %25 indirim fırsatı!</p>
            </div>
            <div class="item">
                <img src="img/metroturizm.png" alt="Metro Turizm Logo">
                <h4>Anlaşmalı Şirket: Metro Turizm</h4>
                <p>Metro Turizm otobüs biletlerinde %30 indirim fırsatı!</p>
            </div>
            <!-- Diğer şirketler buraya eklenebilir -->
        </div>
    </div>

    <!-- Bootstrap ve Owl Carousel JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                dots:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });
        });
    </script>
</body>
</html>

