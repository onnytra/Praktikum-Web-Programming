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
if ($level != 'kary') {
    echo "<script> 
            alert('Who Are You !');
            document.location.href = 'login.php';
        </script>";
}

if (!isset($_GET['id'])) {
    echo "<script> 
    alert('Data Tidak Terkirim, Hubungi Administrator');
    document.location.href = 'read_petartikel.php';
    </script>";
}

$artikel = $_GET['id'];
$sql = "SELECT * FROM pet_artikel WHERE id_artikel=$artikel";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) < 1) {
    echo "<script> 
    alert('Data Tidak Ada');
    document.location.href = 'read_petartikel.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Update</title>
</head>

<body>
    <div class="m-md-4">
        <form action="../action/proses-update-petartikel.php" method="post" enctype="multipart/form-data">
            <h3>UPDATE</h3>
            <input type="hidden" name="id" value="<?php echo $data['id_artikel'] ?>">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Judul</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="judul" value="<?php echo $data['judul'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="desk"><?php echo $data['desk'] ?>"</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal" value="<?php echo $data['tanggal'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Hewan</label>
                <select class="form-select" aria-label="Default select example" name="hewan">
                    <?php
                    include "../koneksi.php";
                    $sql = "SELECT * FROM hewan";
                    $query = mysqli_query($koneksi, $sql);
                    while ($data = mysqli_fetch_assoc($query)) { 
                        echo "<option value="."$data[id_hewan]>"."$data[hewan]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Pet Artikel Photo</label>
                <input class="form-control" type="file" id="formFile" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="read_petartikel.php" class="btn btn-secondary me-2"> Cancel </a>
        </form>
    </div>
</body>

</html>