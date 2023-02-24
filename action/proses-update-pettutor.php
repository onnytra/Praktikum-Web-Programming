<?php

include("../koneksi.php");

$id = $_POST['id'];
$judul = $_POST['judul'];
$link = $_POST['link'];
$tanggal = $_POST['tanggal'];
$hewan = $_POST['hewan'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../assets/" . $filename;

$sql = "UPDATE pet_tutor SET judul='$judul', link='$link', tanggal='$tanggal',
    var_foto='$filename', id_hewan='$hewan' WHERE id_tutor='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    move_uploaded_file($tempname, $folder);
    echo "<script> 
            alert('Done Edit');
            document.location.href = '../views/read_pettutor.php';
        </script>";
} else {
    echo "<script> 
            alert('Something Wrong');
            document.location.href = 'javascript:history.back()';
        </script>";
}
