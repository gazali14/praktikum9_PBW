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
  </div>
</div>
<?php
// Proses Formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "konser";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengambil nilai dari formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $concert = $_POST["concert"];
    $ticket_type = $_POST["ticket_type"];
    $quantity = $_POST["quantity"];

    // SQL untuk menyimpan data ke dalam tabel
    if (preg_match("[\d]", $phone) && $name != null) {
      $sql = "INSERT INTO booking (name, email, phone, concert, ticket_type, quantity) VALUES ('$name', '$email', '$phone', '$concert', '$ticket_type', '$quantity')";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pemesanan berhasil!');</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      echo '<script>window.alert("Data tidak valid, Ada yang ga beres nih")</script>';
    }



    // Menutup koneksi
    $conn->close();
}
?>

</body>
</html>
