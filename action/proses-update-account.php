<?php

include("../koneksi.php");

$id = $_POST['id'];
$username = $_POST['user'];
$password = $_POST['pass'];
$upass = $_POST['upass'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$level = $_POST['level'];

if ($password == $upass) {
    $sql = "UPDATE account SET username='$username', password='$password', phone='$phone', email='$email', 
    level='$level' WHERE id_user='$id'";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/read_account.php';
        </script>";
    }
} else {
    echo "<script> 
            alert('Ulangi, Password Anda Tidak Sama');
            document.location.href = 'javascript:history.back()';
        </script>";
}
