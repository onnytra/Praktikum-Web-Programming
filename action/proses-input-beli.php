<?php
include "../koneksi.php";
$tanggal = $_POST['tanggal'];
$petfood = $_POST['petfood'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$user = $_POST['user'];
$total = $jumlah * $harga;
$sql = "INSERT INTO aksi_beli (tanggal, jumlah, total, id_user, id_food) VALUES
        ('$tanggal','$jumlah','$total','$user', '$petfood')";
$query = mysqli_query($koneksi, $sql);
if ($query) {
        echo "<script> 
        alert('Done Input');
        document.location.href = '../views/view_cart.php';
        </script>";
} else {
        echo "<script> 
        alert('Something Wrong');
        document.location.href = '../views/view_petfood.php';
        </script>";
}
?>
