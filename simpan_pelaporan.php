<?php
include 'koneksi.php';

// Ambil data dari form
$idalat = $_POST['idalat'];
$alat = $_POST['alat'];
$detail = $_POST['detail'];
$jumlah = $_POST['jumlah'];
$tgl_lapor = $_POST['tgl_lapor'];

// Query SQL
$sql = "INSERT INTO kerusakan (idalat, alat, detail, jumlah, tgl_lapor) VALUES (?, ?, ?, ?, ?)";

// Persiapkan statement
$stmt = mysqli_prepare($koneksi, $sql);

if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'sssss', $idalat, $alat, $detail, $jumlah, $tgl_lapor);
    
    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        echo "Data Berhasil Disimpan";
        header("Location: data_pelaporan_mhs.php");
        exit();
    } else {
        echo "Gagal Disimpan: " . mysqli_stmt_error($stmt);
    }
    
    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "Gagal mempersiapkan statement: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
