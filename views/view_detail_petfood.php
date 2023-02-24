<?php
session_start();
include "../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    echo "<script> 
    alert('Who Are You !');
    document.location.href = 'login.php';
</script>";
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
if ($level != 'user') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}
if (!isset($_GET['id'])) {
    echo "<script> 
    alert('Data Tidak Terkirim, Hubungi Administrator');
    document.location.href = 'view_petfood.php';
    </script>";
}

$food = $_GET['id'];
$sql = "SELECT * FROM pet_food WHERE id_food=$food";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) < 1) {
    echo "<script> 
    alert('Data Tidak Ada');
    document.location.href = 'view_petfood.php';
    </script>";
}
include "header-u.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <div class="clearfix">
        <img src="../assets/<?php echo $data['var_foto'] ?>" class="col-md-6 float-md-end mb-3 ms-md-3" height="500px">
        <h3>
            <?php echo $data['nama_food']?>
        </h3>
        <p>
            <?php echo $data['desk'] ?>
        </p>
        <h4>
        Rp.<?php echo $data['harga']?> ,00
        </h4>
    </div>
</body>
<footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#" class="btn btn-sm btn-outline-secondary">Back to top</a>
            </p>
            <p class="mb-1">Ini Footer &copy;Onny Putra Alamsyah</p>
        </div>
    </footer>

</html>