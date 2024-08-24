<?php
include 'koneksi.php';
$id = $_POST['id'] ?? ''; // Menggunakan null coalescing untuk menghindari error jika tidak ada data
$borrower = $_POST['borrower_id'] ?? '';
$idalat = $_POST['idalat'] ?? '';
$jumlah = $_POST['jumlah'] ?? '';
$tgl_pinjam = $_POST['tgl_pinjam'] ?? '';
$tgl_kembali = $_POST['tgl_kembali'] ?? '';
$input = mysqli_query($koneksi, "INSERT INTO peminjaman VALUES(null, '$borrower', '$idalat', '$jumlah','$tgl_pinjam','$tgl_kembali')") or die(mysqli_error($koneksi));
if ($input) {
   echo "Data Berhasil Disimpan";
   header("location:data_peminjaman_mhs.php");
} else {
   echo "Gagal Disimpan";
}
