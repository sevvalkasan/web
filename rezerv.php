<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Formu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"], input[type="tel"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ödeme Formu</h2>
        <form action="payment.php" method="POST">
            <label for="cardNumber">Kart Numarası</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="Kart Numarası" required>

            <label for="expiryDate">Son Kullanma Tarihi (MM/YY)</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" required>

            <label for="cvv">CVV Kodu</label>
            <input type="text" id="cvv" name="cvv" placeholder="CVV" pattern="[0-9]{3,4}" required>

            <label for="cardHolderName">Kart Sahibi Adı</label>
            <input type="text" id="cardHolderName" name="cardHolderName" placeholder="Kart Sahibi Adı" required>

            <label for="billingAddress">Fatura Adresi</label>
            <textarea id="billingAddress" name="billingAddress" placeholder="Fatura Adresi" rows="4" required></textarea>

            <input type="submit" value="Ödeme Yap">
        </form>
    </div>
</body>
</html>
