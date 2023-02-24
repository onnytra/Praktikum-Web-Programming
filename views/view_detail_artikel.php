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

$artikel = $_GET['id'];
$sql = "SELECT * FROM pet_artikel WHERE id_artikel=$artikel";
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
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <img src="../assets/<?php echo $data["var_foto"] ?>" alt="PetArtikel" width="550px" height="350px">
                <h3><?php echo $data["judul"] ?></h3>
            </div>
        </div>
    </section>
    <div class="m-md-4">
        <p class="fs-5">
            <?php echo $data['desk'] ?>
        </p>
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