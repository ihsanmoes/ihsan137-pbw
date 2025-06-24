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
    <title>Document</title>
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
</style>
</head>
<body>
    <h1 align="center" > Data Mahasiswa </h1>
    <hr width="50%" align="center" size="5px" color="darkgrey">

    <nav>
        <ul style="list-style-type: none; text-align: center; padding: 0%;">
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
                <a href="index.php">Home</a>
            </li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
                <a href="about.html">About</a>
            </li>   
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
            <a href="service.html">Services</a></li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
            <a href="contact.html">Contact</a></li>    
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
            <a href="login.html">Login</a></li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
<<<<<<< HEAD
            <a href="datamahasiswa.php">Data Mahasiswa</a></li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
            <a href="tambahmahasiswa.php">Tambah Mahasiswa</a></li>                                                   
=======
            <a href="datamahasiswa.php">Data Mahasiswa</a></li>                                                  
>>>>>>> 7aede83636651b4c90cbe587b962e8096d952f13
        </ul>
    </nav>

    <table>
    <thead>
        <tr>
            <th>No</th>
<<<<<<< HEAD
            <th>Foto</th>
=======
>>>>>>> 7aede83636651b4c90cbe587b962e8096d952f13
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Alamat</th>
        </tr>
    </thead>
<<<<<<< HEAD
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

        echo "</tr>";
    }
    ?>
</tbody>
=======
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jurusan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
>>>>>>> 7aede83636651b4c90cbe587b962e8096d952f13
</table>


</body>
</html>