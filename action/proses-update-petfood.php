<?php

include("../koneksi.php");

$id = $_POST['id'];
$petfood = $_POST['petfood'];
$desk = $_POST['desk'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];
$hewan = $_POST['hewan'];
$brand = $_POST['brand'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;

$sql = "UPDATE pet_food SET nama_food='$petfood', desk='$desk', harga='$harga', stock='$stock', 
    var_foto='$filename', id_hewan='$hewan', id_brand='$brand' WHERE id_food='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    move_uploaded_file($tempname, $folder);
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/read_petfood.php';
        </script>";
} else {
    echo "<script> 
            alert('Something Wrong');
            document.location.href = 'javascript:history.back()';
        </script>";
}
