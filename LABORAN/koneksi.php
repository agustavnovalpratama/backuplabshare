<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "peminjamanlabrpl"; //Nama Database
// melakukan koneksi ke db
$koneksi = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($koneksi));
