<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['username']) || empty($_SESSION['level'])) {
    echo "<script>alert('Untuk Membuka Halaman Ini, Silahkan Login Terlebih Dahulu!');document.location='login.php'</script>";
    exit();
}

// Ambil data peminjaman berdasarkan ID atau parameter lainnya
$borrower_id = $_GET['borrower_id']; // Misalkan Anda menerima ID peminjam melalui GET

// Query untuk mengambil data peminjaman
$query = "SELECT peminjaman., p.alat, p.jumlah, p.tgl_pinjam, p.tgl_kembali, s.status
          FROM peminjaman p
          JOIN stokbrg s ON p.idalat = s.idalat
          WHERE p.borrower_id = '$borrower_id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Pengembalian</title>
  <script src="https://kit.fontawesome.com/f8a09ade68.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/classic.css">
  <link rel="stylesheet" href="css/classic.date.css">
  <link rel="stylesheet" href="homestyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <!--Navbar START-->
  <nav class="navbar navbar-expand-lg bg-secondary fw-bolder sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand me-xl-4" href="#"><img class="logo" src="assets/logosmk.png" style="height: 70px;" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home_mhs.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="form/index.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Form
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="peminjaman_mhs.php">Peminjaman</a></li>
              <li><a class="dropdown-item" href="pengembalian_mhs.php">Pengembalian</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="pelaporan_mhs.php">Pelaporan</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="info_mhs.php">Informasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact_mhs.php">Contact</a>
          </li>
        </ul>
        <form class="logout d-flex mt-3" role="submit">
          <p class="me-2"><i class="fa-solid fa-user-graduate"></i> Hello, <?= $_SESSION['nama'] ?></p>
          <p class="me-2">|</p>
          <a href="logout.php" role="button"><i class="fa-solid fa-right-from-bracket">Log out</i></a>
        </form>
      </div>
    </div>
  </nav>
  <!--Navbar END-->

  <!--Container START-->
  <div class="container-fluid text-light" style="height: 100vh;">
    <div class="nav row justify-content-evenly text-center align-items-center">
      <div class="col-sm-6">
        <div class="card text-bg-secondary mb-3">
          <div class="card-body">
            <h3 class="card-title fw-bold">WELCOME TO THE LABORATORY <p>REKAYASA PERANGKAT LUNAK</h3>
            <p class="card-text">You can enjoy the service online <i class="fa-solid fa-clock"></i></p>
          </div>
        </div>
      </div>
    </div>

    <!--Data START-->
    <div class="row justify-content-evenly align-items-center text-body">
      <div class="col-sm-6">
        <form action="simpan_pengembalian.php" method="post">
          <div class="form-row">
            <div class="form-group">
              <label>Nama Peminjam</label>
              <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" readonly>
            </div>
          </div>
          <div class="form-row mt-3">
            <div class="form-group">
              <label>Alat</label>
              <input type="text" name="alat" class="form-control" value="<?= htmlspecialchars($data['alat']) ?>" readonly>
            </div>
          </div>
          <div class="form-row mt-3">
            <div class="form-group">
              <label>Jumlah Alat</label>
              <input type="text" name="jumlah" class="form-control" value="<?= htmlspecialchars($data['jumlah']) ?>" readonly>
            </div>
          </div>
          <div class="form-row mt-3">
            <div class="form-group">
              <label for="input_from"><i class="fa-solid fa-calendar-days"></i> Tanggal Peminjaman</label>
              <input type="text" name="tgl_pinjam" class="form-control" value="<?= htmlspecialchars($data['tgl_pinjam']) ?>" readonly>
            </div>
            <div class="form-group mt-2">
              <label for="input_to"><i class="fa-solid fa-calendar-days"></i> Tanggal Pengembalian</label>
              <input type="text" name="tgl_kembali" class="form-control" placeholder="Tanggal Pengembalian" style="width: 180px;" required>
            </div>
          </div>
          <div class="form-row mt-3">
            <div class="form-group">
              <label>Status Barang</label>
              <select class="form-select" name="status" required>
                <option value="" disabled selected>Pilih Status</option>
                <option value="baik" <?= ($data['status'] == 'baik') ? 'selected' : '' ?>>Baik</option>
                <option value="rusak" <?= ($data['status'] == 'rusak') ? 'selected' : '' ?>>Rusak</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-3">KONFIRMASI</button>
        </form>
      </div>
    </div>
    <!--Data END-->
  </div>
  <!--Container END-->
  <!--Footer START-->

  <!--Footer END-->
  <a id="back-to-top" href="#" class="btn btn-warning btn-md back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/picker.js"></script>
  <script src="js/picker.date.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
