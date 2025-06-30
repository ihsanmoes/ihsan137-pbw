<?php
$koneksi = mysqli_connect("localhost", "root", "", "informatik");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);

// Ambil data mahasiswa
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    die("Data tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    // Handle upload foto
    $foto = $data['foto']; // nama file foto lama
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['foto']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newFilename = uniqid() . '.' . $ext;
            $uploadDir = 'uploads/';
            $uploadPath = $uploadDir . $newFilename;

            // Hapus foto lama jika ada dan file ada di folder
            if ($foto && file_exists($uploadDir . $foto)) {
                unlink($uploadDir . $foto);
            }

            // Pindahkan file baru ke folder uploads
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadPath)) {
                $foto = $newFilename; // update nama foto baru untuk simpan ke db
            } else {
                echo "Gagal mengupload foto baru.";
                exit;
            }
        } else {
            echo "Format foto tidak diperbolehkan. Gunakan JPG, PNG, GIF.";
            exit;
        }
    }

    // Update data mahasiswa termasuk nama file foto (bisa tetap foto lama kalau tidak diupload)
    $update = "UPDATE mahasiswa SET 
                nama='$nama', 
                nim='$nim', 
                jurusan='$jurusan', 
                alamat='$alamat',
                foto='$foto'
               WHERE id=$id";

    if (mysqli_query($koneksi, $update)) {
        header("Location: datamahasiswa.php");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" value="<?php echo htmlspecialchars($data['nim']); ?>" required><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" value="<?php echo htmlspecialchars($data['jurusan']); ?>" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required><?php echo htmlspecialchars($data['alamat']); ?></textarea><br><br>

        <label>Foto saat ini:</label><br>
        <?php if ($data['foto'] && file_exists('uploads/' . $data['foto'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($data['foto']); ?>" width="100" alt="Foto Mahasiswa"><br><br>
        <?php else: ?>
            <em>Tidak ada foto</em><br><br>
        <?php endif; ?>

        <label>Ganti Foto:</label><br>
        <input type="file" name="foto" accept=".jpg,.jpeg,.png,.gif"><br>
        <small>Biarkan kosong jika tidak ingin mengganti foto.</small><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
    <br>
    <a href="datamahasiswa.php">Kembali ke Data Mahasiswa</a>
</body>
</html>
