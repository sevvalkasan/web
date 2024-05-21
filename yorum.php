<?php
include 'config.php';

$ad = $_POST['ad'] ?? '';
$yorum = $_POST['yorum'] ?? '';
$puan = $_POST['puan'] ?? '';

if (!isset($_POST['puan'])) {
    echo "Puan değeri eksik!";
    exit;
}

$puan = intval($_POST['puan']);
if ($puan < 1 || $puan > 5) {
    echo "Geçersiz puan değeri!";
} else {
    try {
        $sql = "INSERT INTO yorumlar (destinasyon_id, ad, yorum, puan) VALUES (1, :ad, :yorum, :puan)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ad', $ad);
        $stmt->bindParam(':yorum', $yorum);
        $stmt->bindParam(':puan', $puan);
        $stmt->execute();
        echo "Yorum başarıyla eklendi!";
    } catch(PDOException $e) {
        echo "Bağlantı hatası: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="contact.css" rel="stylesheet">
</head>
<body>
    <div class="background-image">
        <img src="img/contact.jpg" alt="contact Image" class="hidden">  
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-0 shadow mb-3">
                        <div class="card-body p-5">
                            <h2 class="card-title text-center mb-4">İletişim Formu</h2>
                            <form action="iletisimform.php" method="POST">
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label">Ad:</label>
                                    <input type="text" id="ad" name="ad" class="form-control" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="email" class="form-label">E-posta:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="phone" class="form-label">Cep Telefonu:</label>
                                    <input type="tel" id="phone" name="telefon" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                                    <small id="phoneHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="message" class="form-label">Mesajınız:</label>
                                    <textarea id="message" name="mesaj" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Gönder</button>
                            </form>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme anlasma-carousel">
                        <div class="item">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <img src="img/thy_logo.png" alt="THY Logo" class="img-fluid mb-3">
                                    <h5 class="card-title">Anlaşmalı Şirket: THY</h5>
                                    <p class="card-text">THY ile yapacağınız bilet alımlarında %20 indirim fırsatını kaçırmayın!</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <img src="img/burger_king_logo.png" alt="Burger King Logo" class="img-fluid mb-3">
                                    <h5 class="card-title">Anlaşmalı Şirket: Burger King</h5>
                                    <p class="card-text">Burger King restoranlarında geçerli %15 indirim kodu: BKIND15</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <img src="img/hilton_logo.png" alt="Hilton Logo" class="img-fluid mb-3">
                                    <h5 class="card-title">Anlaşmalı Şirket: Hilton Otelleri</h5>
                                    <p class="card-text">Hilton otellerinde konaklamalarda %25 indirim fırsatı!</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <img src="img/metroturizm.png" alt="Metro Turizm Logo" class="img-fluid mb-3">
                                    <h5 class="card-title">Anlaşmalı Şirket: Metro Turizm</h5>
                                    <p class="card-text">Metro Turizm otobüs biletlerinde %30 indirim fırsatı!</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow">
                        <div class="card-body p-5">
                            <h2 class="card-title text-center mb-4">Yorum Yapın</h2>
                            <form action="yorum.php" method="POST">
                                            <div class="mb-3 form-group">
                                                <label for="nameComment" class="form-label">Adınız:</label>
                                                <input type="text" id="nameComment" name="ad" class="form-control" required>
                                            </div>
                                            <div class="mb-3 form-group">
                                                <label for="comment" class="form-label">Yorumunuz:</label>
                                                <textarea id="comment" name="yorum" class="form-control" rows="3" required></textarea>
                                            </div>
                                            <div class="mb-3 form-group">
                                                <label for="rating" class="form-label">Değerlendirme (1-5 arası):</label>
                                                <input type="number" id="rating" name="puan" class="form-control" min="1" max="5" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Gönder</button>
                            </form>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme yorum-carousel">
                        <div class="row">
                            <?php foreach ($yorumlar as $yorum): ?>
                                <div class="col-md-6 mb-4">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($yorum['ad']); ?></h5>
                                            <p class="card-text"><?php echo htmlspecialchars($yorum['yorum']); ?></p>
                                            <p class="card-text"><strong>Puan: <?php echo $yorum['puan']; ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".anlasma-carousel").owlCarousel({
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

                $(".yorum-carousel").owlCarousel({
                    loop:true,
                    margin:10,
                    nav:false,
                    dots:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                });
            });
        </script>
</body>
</html>
