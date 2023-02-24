<?php

include("../koneksi.php");

$id = $_POST['id'];
$judul = $_POST['judul'];
$desk = $_POST['desk'];
$tanggal = $_POST['tanggal'];
$hewan = $_POST['hewan'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;

$sql = "UPDATE pet_artikel SET judul='$judul', desk='$desk', tanggal='$tanggal',
    var_foto='$filename', id_hewan='$hewan' WHERE id_artikel='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    move_uploaded_file($tempname, $folder);
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/read_petartikel.php';
        </script>";
} else {
    echo "<script> 
            alert('Something Wrong');
            document.location.href = 'javascript:history.back()';
        </script>";
}
