<?php
include "../koneksi.php";
$judul = $_POST['judul'];
$desk = $_POST['desk'];
$tanggal = $_POST['tanggal'];
$hewan = $_POST['hewan'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;
$sql = "INSERT INTO pet_artikel (judul, desk, tanggal, var_foto, id_hewan) VALUES
        ('$judul','$desk','$tanggal','$filename','$hewan')";
$query = mysqli_query($koneksi, $sql);
if ($query) {
        move_uploaded_file($tempname, $folder);
        echo "<script> 
        alert('Done Input');
        document.location.href = '../views/read_petartikel.php';
        </script>";
} else {
        echo "<script> 
        alert('Something Wrong');
        document.location.href = '../views/read_petartikel.php';
        </script>";
}
