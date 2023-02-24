<?php
include "../koneksi.php";
$brand = $_POST['brand'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;
$sql = "INSERT INTO brand (brand, contact, email, var_foto) VALUES
        ('$brand','$contact', '$email', '$filename')";
$query = mysqli_query($koneksi, $sql);
if ($query) {
        move_uploaded_file($tempname, $folder);
        echo "<script> 
        alert('Done Input');
        document.location.href = '../views/read_brand.php';
        </script>";
} else {
        echo "<script> 
        alert('Something Wrong');
        document.location.href = '../views/read_brand.php';
        </script>";
}
