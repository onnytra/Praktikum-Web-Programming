<?php

include("../koneksi.php");

$id = $_POST['id'];
$petfood = $_POST['petfood'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];

$sql = "UPDATE aksi_restock SET tanggal='$tanggal', jumlah='$jumlah', id_food='$petfood'
WHERE id_restock='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/read_restock.php';
        </script>";
} else {
    echo "<script> 
            alert('Something Wrong');
            document.location.href = 'javascript:history.back()';
        </script>";
}
