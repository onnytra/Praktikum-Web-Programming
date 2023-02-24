<?php
session_start();
include("../koneksi.php");

$id = $_POST['id'];
$username = $_POST['user'];
$password = $_POST['pass'];
$upass = $_POST['upass'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;

if ($password == $upass) {
    $sql = "UPDATE account SET username='$username', password='$password', phone='$phone', email='$email', 
    var_foto='$filename' WHERE id_user='$id'";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        move_uploaded_file($tempname, $folder);
        unset($_SESSION['username']);
        unset($_SESSION['level']);
        echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/login.php';
        </script>";
    }
} else {
    echo "<script> 
            alert('Ulangi, Password Anda Tidak Sama');
            document.location.href = 'javascript:history.back()';
        </script>";
}
