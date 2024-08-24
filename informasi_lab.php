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
    <title>Informasi</title>
    <script src="https://kit.fontawesome.com/f8a09ade68.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="homestyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <!--Navbar START-->
    <nav class="navbar navbar-expand-lg bg-warning fw-bolder sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-xl-4" href="#"><img class="logo" src="assets/poltek3.png" style="height: 70px;" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="home_mhs.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Form
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="data_peminjaman_lab.php">Data Peminjaman</a></li>
                            <li><a class="dropdown-item" href="data_pengembalian_lab.php">Data Pengembalian</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="data_pelaporan_lab.php">Data Pelaporan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="informasi_lab.php">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact_lab.php">Contact</a>
                    </li>
                </ul>
                <form class="logout d-flex mt-3" role="submit">
                    <p class="me-2"><i class="fa-solid fa-user-gear"></i> Hello, <?= $_SESSION['nama'] ?></p>
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
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h3 class="card-title fw-bold">SELAMAT DATANG DI INFORMASI BARANG LABORATORIUM POLITEKNIK NEGERI BATAM</h3>
                        <p class="card-text">Anda dapat menikmati layanan secara online <i class="fa-solid fa-clock"></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!--Data START-->
        <div class="row justify-content-evenly text-center align-items-center text-body">
            <div class="col-sm-6">
                <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahmhs">
                    <i class="fas fa-plus-circle mr-2"></i> TAMBAH DATA BARANG
                </a>
                <table class="table table-striped table-bordered mt-2">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">ID ALAT</th>
                            <th scope="col">ALAT</th>
                            <th scope="col">JUMLAH</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <?php
                    include 'koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT * FROM stokbrg");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['idalat']; ?></td>
                            <td><?php echo $data['alat']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#editmhs<?php echo $data['idalat']; ?>"><i class="fas fa-edit bg-success p-2 text-white rounded"></i></a>
                                <a href="#" data-toggle="modal" data-target="#deletemhs<?php echo $data['idalat']; ?>"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i></a>
                            </td>
                        </tr>

                        <!--Update Start-->
                        <div class="example-modal">
                            <div class="modal fade" id="editmhs<?php echo $data['idalat']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Data Barang</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form action="update_informasi.php" method="post" role="form">
                                                <?php
                                                $idalat = $data['idalat'];
                                                $query1 = mysqli_query($koneksi, "SELECT * FROM stokbrg WHERE idalat='$idalat'");
                                                while ($data1 = mysqli_fetch_assoc($query1)) {
                                                ?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-3 control-label text-right">Id ALAT </label>
                                                            <div class="col-sm-8"><input type="text" class="form-control" name="idalat" value="<?php echo $data1['idalat']; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <div class="row">
                                                            <label class="col-sm-3 control-label text-right">ALAT </label>
                                                            <div class="col-sm-8"><input type="text" class="form-control" name="alat" value="<?php echo $data1['alat']; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <div class="row">
                                                            <label class="col-sm-3 control-label text-right">JUMLAH </label>
                                                            <div class="col-sm-8"><input type="text" class="form-control" name="jumlah" value="<?php echo $data1['jumlah']; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <div class="row">
                                                            <label class="col-sm-3 control-label text-right">STATUS </label>
                                                            <div class="col-sm-8">
                                                                <select class="form-select" name="status" style="width: 130px;">
                                                                    <option selected>--Pilih--</option>
                                                                    <option value="Tersedia">Tersedia</option>
                                                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer mt-2">
                                                        <button id="noedit" type="button" class="btn btn-danger pull-left" datadismiss="modal">Batal</button>
                                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Update End-->

                        <!--DELETE-->
                        <div class="example-modal">
                            <div id="deletemhs<?php echo $data['idalat']; ?>" class="modal fade" role="dialog" style="display:none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Apakah anda yakin ingin menghapus ALAT <?php echo $data['idalat']; ?><strong><span class="grt"></span></strong> ?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="nodelete" type="button" class="btn btn-danger pull-left" datadismiss="modal">Cancel</button>
                                            <a href="hapus_informasi.php?idalat=<?php echo $data['idalat']; ?>" class="btn btn-primary">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--DELETE END-->

                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <!--Data END-->
    </div>

    <!-- Simpan Modal  -->
    <div class="example-modal">
        <div id="tambahmhs" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Data Baru</h3>
                    </div>
                    <div class="modal-body">
                        <form action="simpan_informasi.php" method="post" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">ID ALAT</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="idalat" placeholder="Id Alat" value=""></div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-sm-3 control-label text-right">ALAT</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="alat" placeholder="Alat" value=""></div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-sm-3 control-label text-right">JUMLAH</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="jumlah" placeholder="Jumlah" value=""></div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-sm-3 control-label text-right">STATUS</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" name="status" style="width: 130px;">
                                            <option selected>--Pilih--</option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-2">
                                <button id="nosave" type="button" class="btn btn-danger pull-left" datadismiss="modal">Batal</button>
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/picker.js"></script>
    <script src="js/picker.date.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="home.js"></script>
</body>

</html>