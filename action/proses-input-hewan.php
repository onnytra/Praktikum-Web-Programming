<?php
include "../koneksi.php";
$hewan = $_POST['hewan'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;
$sql = "INSERT INTO hewan (hewan, var_foto) VALUES
        ('$hewan','$filename')";
$query = mysqli_query($koneksi, $sql);
if ($query) {
        move_uploaded_file($tempname, $folder);
        echo "<script> 
        alert('Done Input');
        document.location.href = '../views/read_hewan.php';
        </script>";
} else {
        echo "<script> 
        alert('Something Wrong');
        document.location.href = '../views/read_hewan.php';
        </script>";
}
