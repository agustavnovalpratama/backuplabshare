<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>alert('Untuk Membuka Halaman Ini, Silahkan Login Terlebih Dahulu!');document.location='login.php'</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Peminjaman</title>
  <script src="https://kit.fontawesome.com/f8a09ade68.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="homestyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <!--Navbar START-->
  <nav class="navbar navbar-expand-lg bg-secondary fw-bolder sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand me-xl-4" href="#"><img class="logo" src="assets/poltek3.png" style="height: 70px;" alt=""></a>
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
      <div class="col-sm-8">
        <div class="card text-bg-secondary mb-3">
          <div class="card-body">
            <h3 class="card-title fw-bold">DATA PEMINJAMAN ALAT LABORATORIUM</h3>
            <p class="card-text">Anda dapat menikmati layanan secara online <i class="fa-solid fa-clock"></i></p>
          </div>
        </div>
      </div>
    </div>

    <!--Data START-->
    <div class="row justify-content-evenly  align-items-center text-body">
      <div class="col-sm-8">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">NIM</th>
              <th scope="col">NAMA</th>
              <th scope="col">No. HP</th>
              <th scope="col">ID Alat</th>
              <th scope="col">ALAT</th>
              <th scope="col">JUMLAH</th>
              <th scope="col">Tgl. PINJAM</th>
              <th scope="col">Tgl. KEMBALI</th>
            </tr>
          </thead>
          <?php
          include 'koneksi.php';
          $query = mysqli_query($koneksi, "SELECT * FROM peminjaman");
          $no = 1;
          while ($data = mysqli_fetch_assoc($query)) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nim']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['no_hp']; ?></td>
              <td><?php echo $data['idalat']; ?></td>
              <td><?php echo $data['alat']; ?></td>
              <td><?php echo $data['jumlah']; ?></td>
              <td><?php echo $data['tgl_pinjam']; ?></td>
              <td><?php echo $data['tgl_kembali']; ?></td>
            </tr>
          <?php
          }
          ?>
        </table>
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

  <script src="home.js"></script>