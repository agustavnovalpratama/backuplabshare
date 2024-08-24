<?php
// session_start();
// include 'koneksi.php';
// if (isset($_SESSION['nama'])){
//     header("Location ../login.php");
//     exit();
// }

include "koneksi.php";

// if (isset($_SESSION["submit"])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = hash('sha256', $_POST['password']);
    // $cpassword = hash('sha256', $_POST['cpassword']);
    $role = $_POST['level'];

    $sql = "INSERT INTO userlog VALUES(null, '$nama', '$username', '$email', '$no_hp', '$password', '$role')";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script>alert('Registeration Success'); document.location='login.php'</script>";

    }else{
        echo "<script>alert('Registeration Failed'); document.location='register.php'</script>";
    }
    // echo $result;

    // if($password == $cpassword){
        // $sql = "SELECT * FROM userlog WHERE username = '$username'";
        // $result = mysqli_query($koneksi, $sql);
        // if(!$result->num_rows>0){
            // $sql = "INSERT INTO userlog(nama, username, email, no_hp, password, level) VALUES
            // ('$nama', '$username', '$email', '$no_hp', '$password', '$role')";
            // $result = mysqli_query($koneksi, $sql);
            // if($result){
            //     echo "<script>alert('Registeration Success'); document.location='home_mhs.php'</script>";
            //     $nama = "";
            //     $username = "";
            //     $email = "";
            //     $no_hp = "";
            //     $_POST['password'] = "";
            //     $_POST['cpassword'] = "";
            //     $role = "";
            // } else{
            //     echo "<script>alert('Registeration Failed'); document.location='register.php'</script>";  
            // }
        // }else {
        //     echo "<script>alert('User Already Register'); document.location='login.php'</script>";
        // }
    // }else{
    //     echo "<script>alert('Password Doesn't Match')</script>";
    // }
// }
?>