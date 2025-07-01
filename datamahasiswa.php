<?php
$koneksi = mysqli_connect("localhost", "root", "", "informatik");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query ambil data mahasiswa
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 40px;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin: auto;
        }
        th, td {
            border: 1px solid #555;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
        nav ul {
            list-style-type: none;
            text-align: center;
            padding: 0;
        }
        nav li {
            display: inline;
            margin: 0 15px;
        }
        nav a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <hr width="50%" size="5px" color="darkgrey">

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="service.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="datamahasiswa.php">Data Mahasiswa</a></li>
            <li><a href="tambahdata.php">Tambah Mahasiswa</a></li>
        </ul>
    </nav>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                $fotoPath = "uploads/" . htmlspecialchars($row['foto']);
                echo "<td><img src='" . $fotoPath . "' width='80' height='80' alt='Foto'></td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jurusan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                echo "<td>";
                echo "<a href='hapusdata.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a> | ";
                echo "<a href='editdata.php?id=" . $row['id'] . "'>Edit</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
