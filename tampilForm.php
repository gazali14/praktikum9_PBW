<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan Tiket Konser</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
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

    // Query untuk mengambil data dari tabel booking
    $sql = "SELECT * FROM booking";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data dalam bentuk tabel
        echo "<table border='1'>";
        echo "<tr><th>Nama</th><th>E-mail</th><th>Nomor Telepon</th><th>Konser</th><th>Jenis Tiket</th><th>Jumlah Tiket</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["concert"] . "</td>";
            echo "<td>" . $row["ticket_type"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 hasil";
    }

    // Menutup koneksi
    $conn->close();
    ?>

</body>

</html>
