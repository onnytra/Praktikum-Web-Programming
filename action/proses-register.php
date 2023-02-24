<?php
include "../koneksi.php";
$username = $_POST['user'];
$password = $_POST['pass'];
$upass = $_POST['upass'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"]; 
$folder = "../assets/".$filename;
if ($password == $upass) {
    $sql = "INSERT INTO account (username, password, phone, email, level, var_foto) VALUES
        ('$username','$password','$phone','$email','user', '$filename')";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        move_uploaded_file($tempname, $folder);
        echo "<script> 
            alert('Anda Sukses Registrasi');
            document.location.href = '../views/login.php';
        </script>";
    } 
} else {
    echo "<script> 
            alert('Ulangi, Password Anda Tidak Sama');
            document.location.href = '../views/register-form.php';
        </script>";
}
