<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap / Üye Ol</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('img/about0.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            display: flex;
            justify-content: center;
            max-width: 800px;
            padding: 20px;
        }
        .left-form-container {
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
            width: 40%; 
            margin-right: 10px;
        }
        .right-form-container {
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
            width: 40%;
            margin-left: 10px; 
        }
        .admin-login-link {
            font-size: 14px;
            color: white;
            cursor: pointer;
            margin-top: 20px;
            text-align: center;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-form-container">
            <h2>Üye Ol</h2>
            <form action="register.php" method="POST">
                <input type="text" name="registerUsername" placeholder="Kullanıcı Adı" required><br>
                <input type="email" name="registerEmail" placeholder="E-posta" required><br>
                <input type="tel" name="registerPhone" placeholder="Telefon Numarası" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
                <input type="password" name="registerPassword" placeholder="Şifre" required><br>
                <button type="submit" name="userRegister">Üye Ol</button>
            </form>
        </div>
        <div class="right-form-container">
            <h2>Giriş Yap</h2>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Kullanıcı Adı" required><br>
                <input type="password" name="password" placeholder="Şifre" required><br>
                <button type="submit">Giriş Yap</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="admin-login-link" id="adminLoginLink">Admin Girişi</div>
    </div>

    <div class="container form-container hidden" id="adminLoginForm">
        <h3>Admin Girişi</h3>
        <form action="admin.php" method="POST">
            <input type="text" name="adminUsername" placeholder="Admin Kullanıcı Adı" required><br>
            <input type="password" name="adminPassword" placeholder="Admin Şifre" required><br>
            <button type="submit" name="adminLogin">Giriş Yap</button>
        </form>
    </div>

    <script>
        document.getElementById('adminLoginLink').addEventListener('click', function() {
            var adminLoginForm = document.getElementById('adminLoginForm');
            if (adminLoginForm.classList.contains('hidden')) {
                adminLoginForm.classList.remove('hidden');
            } else {
                adminLoginForm.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
