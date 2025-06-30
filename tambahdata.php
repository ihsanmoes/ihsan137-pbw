<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2 align="center">Form Tambah Mahasiswa</h2>
    <form action="proses_tambah.php" method="POST" enctype="multipart/form-data" style="width: 400px; margin: auto;">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" rows="4" required></textarea><br><br>

        <label>Foto:</label><br>
        <input type="file" name="foto" accept="image/*" required><br><br>

        <input type="submit" value="Tambah">
    </form>
</body>
</html>
