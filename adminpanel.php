<?php include 'config.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 50px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .card {
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logout-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Hoş Geldiniz, <?php echo $admin['username']; ?></h2>
                <p class="card-text">Admin ID: <?php echo $admin['id']; ?></p>
                <p class="card-text">E-posta: <?php echo $admin['email']; ?></p>
                <a href="logout.php" class="btn btn-primary logout-btn">Çıkış Yap</a>
            </div>
        </div>
    </div>
</body>
</html>
