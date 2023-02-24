<?php
include "../koneksi.php";
$petfood = $_POST['petfood'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$sql = "INSERT INTO aksi_restock (tanggal, jumlah, id_food) VALUES
        ('$tanggal','$jumlah','$petfood')";
$query = mysqli_query($koneksi, $sql);
if ($query) {
        echo "<script> 
        alert('Done Input');
        document.location.href = '../views/read_restock.php';
        </script>";
} else {
        echo "<script> 
        alert('Something Wrong');
        document.location.href = '../views/read_restock.php';
        </script>";
}
