<?php
$koneksi = mysqli_connect("localhost", "root", "", "informatik");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: datamahasiswa.php"); // kembali ke halaman data setelah hapus
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
