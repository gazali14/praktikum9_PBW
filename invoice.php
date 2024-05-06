<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
  }
  .container {
    max-width: 600px;
    margin: 0 auto;
    margin-top: 10px;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
  }
  h1 {
    color: #ff69b4;
  }
  .invoice-details {
    margin-top: 20px;
    text-align: left;
  }
  .invoice-details p {
    margin: 10px 0;
  }
  .thank-you {
    margin-top: 30px;
    font-size: 24px;
    color: #ff69b4;
  }
  img {
    max-width: 100px;
    height: auto;
    margin-top: 20px;
  }
</style>
</head>
<body>
<div class="container">
  <h1>Invoice</h1>
  <div class="invoice-details">
    <p><strong>Nama:</strong> <?php echo htmlspecialchars($_POST["name"]); ?></p>
    <p><strong>E-mail:</strong> <?php echo htmlspecialchars($_POST["email"]); ?></p>
    <p><strong>Nomor Telepon:</strong> <?php echo htmlspecialchars($_POST["phone"]); ?></p>
    <p><strong>Konser:</strong> <?php echo htmlspecialchars($_POST["concert"]); ?></p>
    <p><strong>Jenis Tiket:</strong> <?php echo htmlspecialchars($_POST["ticket_type"]); ?></p>
    <p><strong>Jumlah Tiket:</strong> <?php echo htmlspecialchars($_POST["quantity"]); ?></p>
  </div>
  <div class="thank-you">
    <p>Terima kasih telah memesan tiket!</p>
    <p>Refund awas aja lo anjeng</p>
  </div>
</div>
</body>
</html>
