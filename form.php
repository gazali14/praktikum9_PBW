<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Concert Ticket Booking</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Concert Ticket Booking</h1>
    <div class="form">
      <!-- Formulir Pemesanan Tiket Konser -->
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- Label untuk input nama -->
        <label for="name">Nama:</label> 
        <input type="text" id="name" name="name" placeholder="Nama"><br>
        <!-- Label untuk input email -->
        <label for="email">E-mail:</label> 
        <input type="email" id="email" name="email" placeholder="E-mail Anda"><br>
        <!-- Label untuk input nomor telepon -->
        <label for="phone">Nomor Telepon:</label> 
        <input type="text" id="phone" name="phone" placeholder="Nomor Telepon"><br>
        <!-- Label untuk pilihan konser -->
        <label for="selectconcert">Pilih Konser:</label> 
        <select id="selectconcert" name="concert">
            <option value="" disabled selected>Pilih Opsi</option>
            <option value="Tulus">Konser Tulus</option>
            <option value="Kobo">Konser Kobo Kanaeru</option>
            <option value="Taylor">Konser Taylor Swift</option>
        </select>
        <!-- Label untuk pilihan jenis tiket -->
        <br>
        <label for="jenistiket">Pilih Jenis Tiket:</label> 
        <select id="jenistiket" name="ticket_type">
            <option value="" disabled selected>Pilih Opsi</option>
            <option value="Festival">Festival - Rp700.000,00</option>
            <option value="VIP">VIP - Rp1.000.000,00</option>
            <option value="VVIP">VVIP - Rp1.200.000,00</option>
        </select>
        <br>
        <!-- Label untuk input jumlah tiket -->
        <label for="quantity">Jumlah:</label> 
        <input type="number" id="quantity" name="quantity" placeholder="Jumlah Tiket">
        <br>

        <button type="submit">Beli Tiket</button> <!-- Tombol untuk membuat invoice -->
      </form>
    </div>
  </div>
</body>
</html>

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
    $sql = "INSERT INTO booking (name, email, phone, concert, ticket_type, quantity) VALUES ('$name', '$email', '$phone', '$concert', '$ticket_type', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pemesanan berhasil!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>
