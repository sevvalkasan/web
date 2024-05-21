<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "seyahatacentesi";

$baglanti = mysqli_connect($servername, $username, $password, $database);

if (!$baglanti) {
    die("Veritabanına bağlanırken hata oluştu: " . mysqli_connect_error());
}

if(isset($_POST["gönder"]))
{
    $name=$_POST["ad"];
    $email=$_POST["email"];
    $telefon=$_POST["telefon"];
    $mesaj=$_POST["mesaj"];

    $ekle="INSERT INTO iletisimmesajlari(ad,email,telefon,mesaj) VALUES('$name','$email','$telefon','$mesaj')";
    $calistirekle = mysqli_query($baglanti,$ekle);

    if ($calistirekle) {
        echo "Veriler başarıyla eklendi.";
    } else {
        echo "Veri ekleme işlemi sırasında hata oluştu: " . mysqli_error($baglanti);
    }

    mysqli_close($baglanti);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>İletişim</title>
    </head>
  <body>
        <div class="background-image">
                <img src="img/contact.jpg" alt="contact Image" class="hidden">   
                <div class="container mt-5">
                    <h2 class="text-center mb-4">İletişim Formu ve Yorumlar</h2>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="card border-0 shadow mb-3">
                                <div class="card-body p-5">
                                    <h5 class="card-title text-center mb-4">İletişim Formu</h5>
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
                        </div>
    </body>
</html>