<?php
include "../koneksi.php";
$petfood = $_POST['petfood'];
$desk = $_POST['desk'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];
$hewan = $_POST['hewan'];
$brand = $_POST['brand'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;
$sql = "INSERT INTO pet_food (nama_food, desk, harga, stock, var_foto, id_hewan, id_brand) VALUES
        ('$petfood','$desk','$harga','$stock','$filename', '$hewan', '$brand')";
$query = mysqli_query($koneksi, $sql);
if ($query) {
        move_uploaded_file($tempname, $folder);
        echo "<script> 
        alert('Done Input');
        document.location.href = '../views/read_petfood.php';
        </script>";
} else {
        echo "<script> 
        alert('Something Wrong');
        document.location.href = '../views/read_petfood.php';
        </script>";
}
